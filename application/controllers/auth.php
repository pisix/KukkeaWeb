<?php

class Auth extends CI_controller{

    public $user = "";

    public function __construct() {

        parent::__construct();
        $this->load->library('Minify');

        // Load facebook library and pass associative array which contains appId and secret key
        $this->load->library('facebook', array('appId' => '1399451620382920', 'secret' => '94aedf0b7ba871472e61d7541007c570'));

        // Get user's login information
        $this->user = $this->facebook->getUser();
    }

	function login(){
		if ($this->user) {
			 redirect('auth/profile');
		} else {
	       // Store users facebook login url
	        $data['login_url'] = $this->facebook->getLoginUrl();
	        $data['titre']='Connexion';
	        $this->load->view('includes/header');
	        $this->load->view('includes/navbar_view');
	        $this->load->view('login_view',$data);
	        $this->load->view('includes/footer');
	    }
    }

    function logout(){
        session_destroy(); // destruction de la session facebook
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('logged');
        redirect(site_url());
    }

    /**
    *	THIS VALIDES THE USER LOGIN CREDENTIALS
    **/
    function validate(){

    	// TODO
    	//- When a user is logged using fbk, create him in the database
    	//- then retrieve data to build his profile page
    	//- use the logout url of fbk to build the logout link in this occasion

        if($this->session->userdata('login')|| $this->session->userdata('logged') || $this->user){
            // Facebook User Infos
            $data['user_profile'] = $this->facebook->api('/me/');
            // Get logout url of facebook
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/auth/logout'));
            // Send data to profile page  

            redirect('auth/profile');
        }

       // Store users facebook login url
        $data['login_url'] = $this->facebook->getLoginUrl();

        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('motdepasse','Mot de passe','trim|required|xss_clean');

        if($this->signup_model->check_id($this->input->post('email'), $this->input->post('motdepasse')) &&  $this->signup_model->check_confirm_inscription($this->input->post('email'))){

            $dataUser=$this->signup_model->get_nom_prenom_user_by_email($this->input->post('email'));

            if($dataUser!= null){
                $data = array(
                			'login'=>$this->input->post('email'),
                    		'logged'=>true
                    	);
            }

            $data_u = array(
                			'DERNIERECONNEXION'=>date('Y-m-d H:i:s', now())
        			);
            $this->signup_model->update_last_connexion($this->input->post('email'),$data_u);
            //end logging connexion time

            $this->session->set_userdata($data);
            redirect('signup/membres');
        }
        else{                
            $data['error']='Mauvais identifiants';
            $data['titre']='Connexion';

            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            $this->load->view('login_view',$data);
            $this->load->view('includes/footer');

        }
    }

	/**
	** DISPLAYS THE USER'S PROFILE
	**/
    function profile(){

        if(!$this->user){
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
            log_message('info','On recupere id user succes');

            $data['iduser']=encryptor('encrypt', $idUser);
            log_message('info','cryptage id user');

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
            log_message('info','lon recupere les info de l\'user connecte');

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);
            log_message('info','on set l"array pour affichage à la vue');

            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);
            $data['average_avis']=round($this->avis_model->get_avg_avis($idUser),1);
            $data['nombre_avis']=$this->avis_model->get_number_avis($idUser);
            $data['statut_confirm_by_phone']='true';

            if($this->signup_model->check_confirm_inscription_phone($this->session->userdata('login'))){
                $data['statut_confirm_by_phone']='true';
            }else{
                $data['statut_confirm_by_phone']='false';
            }
            log_message('info','On verifie que son numéro est bien actif');

            $data['toutes_mes_annonces']=$this->annonce_model->get_all_annonce_by_user($id_user_connecte);
            log_message('info','On recupere toutes les annonce');

            $data['toutes_mes_annonces_transport']=$this->annonce_model->get_all_annonce_transport_by_user($id_user_connecte);
            log_message('info','On recupere toutes les annonce de transport');

            $data['toutes_mes_annonces_envoi']=$this->annonce_model->get_all_annonce_envoi_by_user($id_user_connecte);
            log_message('info','On recupere toutes les annonce de transport');

            $data['facebook_login'] = false;
            $data['alertes']='';
            $data['titre']='Zone Reservé au membres';
        }
        else{ // if the user is logged with facebook
            $data['facebook_login'] = true;
            $data['user_profile'] = $this->facebook->api('/me/');
            // Get logout url of facebook
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/auth/logout'));
        }

        $this->load->view('includes/header');
        $this->load->view('includes/menu_page_log',$data);
        $this->load->view('member_view',$data);
        $this->load->view('includes/footer');
    }
}