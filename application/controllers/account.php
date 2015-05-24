<?php
class Account extends CI_Controller {
    private $data;
    private $idUser;
    private  $statut_confirm_by_phone;

    function __construct(){

        parent::__construct();
        $this->load->library('Minify');

        $this->idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
        $this->data = array(
            'iduser'=>encryptor('encrypt', $this->idUser),
            'id_user_connecte' => encryptor('encrypt',$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'))),
            'number_annonce_user_connecte' => $this->annonce_model->get_number_annonce_user_by_id($this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'))),
            'user_connecte_info' => $this->utilisateur_model->get_user_info_by_id($this->utilisateur_model->get_id_user_by_email($this->session->userdata('login')))

       );
    }

    function editprofil()
    {

        if($this->session->userdata('login'))
        {
            $this->form_validation->set_rules('nom','Nom','trim|required|xss_clean');
            $this->form_validation->set_rules('date','Date','trim|required|xss_clean');
            $this->form_validation->set_rules('prenom','Prénom','trim|required|xss_clean');
            $this->form_validation->set_rules('telephone','Téléphone','trim|required|xss_clean');
            $this->form_validation->set_rules('pays','Pays','trim|required|min_length[3]|xss_clean');
            $this->form_validation->set_rules('ville','Ville','trim|required|xss_clean');
            $this->form_validation->set_rules('codepostal','Code postal','trim|xss_clean');
            $this->form_validation->set_rules('adresse','Code postal','trim|xss_clean');
            $this->form_validation->set_rules('photo','Photo','trim|xss_clean');

            /*if($this->signup_model->check_confirm_inscription_courrier($this->session->userdata('login'))){
                $this->data['statut_confirm_by_courrier']='true';
            }else{
                $this->data['statut_confirm_by_courrier']='false';
            }*/


            if($this->input->server('REQUEST_METHOD') === 'POST' ){
                //Configuration de propriétés des images uploader
                $config['upload_path'] ='./images/';
                $config['allowed_types']='gif|jpg|jpeg|png|JPG|PNG';
                $config['max_size']='100000';
                $config['encrypt_name']=true;

                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->form_validation->run())
                {
                    $numuser=encryptor('decrypt',$this->input->post('iduser'));
                    $dataUser=array(
                        'NOMUSER'=>$this->input->post('nom'),
                        'PRENOMUSER'=>$this->input->post('prenom'),
                        'DATENAISSANCEUSER'=>date("Y-m-d", strtotime($this->input->post('date'))),
                        'TELUSER'=>$this->input->post('telephone'),
                        'PAYSUSER'=>$this->input->post('pays'),
                        'VILLEUSER'=>$this->input->post('ville'),
                        'CODEPOSTALUSER'=>$this->input->post('codepostal'),
                        'VISUNUMEROTEL'=>$this->input->post('visunumerotel'),
                    );


                    log_message('info','Nouveau numéro de : '.$numuser .' => '.$this->input->post('telephone'));
                    log_message('info','Ancien numéro de : '.$numuser .' => '.$this->utilisateur_model->get_phone_user($numuser));

                    //Si changement de numéro de téléphone on verifie que le nouveau numéro est accésible
                    if($this->utilisateur_model->get_phone_user($numuser) !=ltrim($this->input->post('telephone'), '0'))
                    {
                        //Code verification num tel
                        $code = rand(1000, 9999); // random 4 digit code
                        $dataUser = array(
                            'TELUSER'=>$this->input->post('telephone'),
                            'VERIFNUMTEL'=>$code
                        );
                        $this->send_sms($code,$this->input->post('telephone'));
                    }

                    if($this->upload->do_upload('photo'))
                    {
                        $photo_data=$this->upload->data();
                        $config=array(
                            'image_library'=>'GD2',
                            'source_image'=>$photo_data['full_path'],
                            'new_image'=>'./images/thumbs/',
                            'create_thumb'=>true,
                            'thumb_marker'=>'',
                            'maintain_ratio'=>false,
                            'width'=>150,
                            'height'=>150
                        );
                        $this->load->library('image_lib',$config);
                        $this->image_lib->resize();
                        $photo_name=$photo_data['file_name'];
                        $dataP=array(
                            'CHEMINPHOTO'=>$photo_name,
                        );

                        $myfile = $this->photo_model->get_nom_photo($this->session->userdata('login'));
                        $idPhoto=$this->photo_model->get_id_photo($myfile);


                        /*Suppression de l'ancien fichier dans le repertoire*/
                        if(file_exists('images/thumbs/'.$myfile))
                        {
                            unlink('images/thumbs/'.$myfile);
                        }
                       /*fin suppréssion*/



                        /*Update  photo*/
                         $this->photo_model->update_photo($idPhoto,$dataP);
                        /*End update*/


                        $this->utilisateur_model->update_user($numuser,$dataUser);
                        /*$this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($numuser);
                        $this->data['iduser']=$numuser;
                        $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($numuser);
                        $this->data['success_editprofil']='Mise à jour réussi';
                        $this->load->view('includes/header');
                        $this->load->view('includes/navbar',$this->data);
                        /*$this->load->view('includes/second_nav_inner_bar');
                        $this->load->view('includes/finder');
                        $this->load->view('editprofil',$this->data);
                        $this->load->view('includes/footer');*/
                        $this->session->set_flashdata('profilmisajour', 'Votre profil a été mis à jour avec succès');
                        redirect('signup/membres');
                    }
                    else
                    {

                        $this->utilisateur_model->update_user($numuser,$dataUser);
                        /*$this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($numuser);
                        $this->data['iduser']=$numuser;
                        $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($numuser);
                        $this->data['success_editprofil']='Mise à jour réussi';
                        $this->load->view('includes/header');
                        $this->load->view('includes/navbar',$this->data);
                        /*$this->load->view('includes/second_nav_inner_bar');
                        $this->load->view('includes/finder');
                        $this->load->view('editprofil',$this->data);
                        $this->load->view('includes/footer');*/
                        $this->session->set_flashdata('profilmisajour', 'Votre profil a été mis à jour avec succès');
                        redirect('signup/membres');

                    }



                    /*else
                    {
                        $this->utilisateur_model->update_user($numuser,$dataUser);
                        $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($numuser);
                        $this->data['iduser']=$numuser;
                        $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($numuser);
                        $this->data['success_editprofil']='Mise à jour réussi';
                        $this->load->view('includes/header');
                        $this->load->view('includes/navbar',$this->data);
                        $this->load->view('editprofil',$this->data);
                        $this->load->view('includes/footer');
                    }*/
                }else
                {
                    $this->data['error_editprofil']="Echec lors de la mise à jour";


                   /* $id_user_connecte=$this->input->post('iduser');

                    $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

                    $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);*/

                    $this->load->view('includes/header');
                    $this->load->view('includes/menu_page_log',$this->data);
                   //$this->load->view('includes/second_nav_inner_bar');
                    $this->load->view('includes/finder');
                    $this->load->view('editprofil',$this->data);
                    $this->load->view('includes/footer');

                }
            }else
            {
               /* $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id(encryptor('decrypt',$this->uri->segment(3)));
                $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id(encryptor('decrypt',$this->uri->segment(3)));*/
               // $this->data['iduser']=$this->uri->segment(3);
                $this->load->view('includes/header');
                $this->load->view('includes/menu_page_log',$this->data);
                /*$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('includes/finder');*/
                $this->load->view('editprofil',$this->data);
                $this->load->view('includes/footer');
            }

        }else
        {

            redirect('signup/membres');
        }


    }

    function changepassword()
    {
        $this->form_validation->set_rules('opassword','Old Password','required|trim|xss_clean|callback_change');
        $this->form_validation->set_rules('npassword','New Password','required|trim|xss_clean');
        $this->form_validation->set_rules('cpassword','Confirm Password','required|trim|xss_clean');
        if($this->session->userdata('login'))
        {

            if(!$this->form_validation->run())
            {

                $numuser=$this->input->post('iduser');
               /* $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($numuser);
                $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($numuser);
                $this->data['iduser']=$numuser;*/

                $this->data['error_changepassword']="Echec lors de la mise à jour";

                $this->load->view('includes/header');
                $this->load->view('includes/navbar',$this->data);
                $this->load->view('editprofil',$this->data);
            }else
            {
                /*$numuser=$this->annonce_model->get_id_user_by_email($this->session->userdata('login'));
                $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($numuser);
                $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($numuser);
                $this->data['iduser']=$numuser;
                $this->data['success_changepassword']=" Mot de passe mis à jour!";
                $this->load->view('includes/header');
                $this->load->view('includes/navbar',$this->data);
                $this->load->view('editprofil',$this->data);*/
                $this->session->set_flashdata('motdepasseajour', 'Votre mot de passe a été mis à jour avec succès');
                redirect('signup/membres');
            }
        }
        else{
            redirect('signup/membres');
        }


    }
    public function change() // we will load models here to check with database
    {

        $sql = $this->db->select("*")->from("utilisateur")->where("utilisateur.EMAILUSER",$this->session->userdata('login'))->get();


        foreach ($sql->result() as $my_info) {

            $db_password = $my_info->MOTDEPASSEUSER;
            $db_id = $my_info->NUMUSER;


        }

        if(md5($this->input->post("opassword")) == $db_password){
        echo 'dans if';

        $fixed_pw = md5($this->input->post("npassword"));
        $update = $this->db->query("Update utilisateur SET MOTDEPASSEUSER='$fixed_pw' WHERE NUMUSER=$db_id")or die(mysql_error());

        $this->form_validation->set_message('change','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Mot de passe mis à jour!</strong></div>');
            echo "password updated";
        return true;

        }else
        $this->form_validation->set_message('change','<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Merci d\'indiquer votre mot de passe actuel.</strong> </div>');

        return false;
    }

    public function forgotpassword()
    {

        if($this->input->server('REQUEST_METHOD') === 'POST' ){

            $this->form_validation->set_rules('email','Email','trim|required|xss_clean|callback_check_email');
            $email=$this->input->post('email');
            if($this->form_validation->run())
            {
                $this->load->helper('string');
                $rs= random_string('alnum', 12);

                $this->data = array(
                    'RS' => $rs
                );

                $this->utilisateur_model->set_rs($email,$this->data);



                //Envoie de mail
                $this->data['rs']=$rs;
                $this->send_mail('support@kukkea.com',$email,'Recuperer votre mot de passe oublié',$this->load->view('email/forgot_password',$this->data,true));

                $this->data['success_email']="True";
                $this->data['mail_user']=$email;
                $this->load->view('includes/header');
                $this->load->view('includes/menu_page_no_log');
               //$this->load->view('includes/second_nav_inner_bar');
               // $this->load->view('includes/finder');

                $this->load->view('forgotpassword',$this->data);
                $this->load->view('includes/footer');

            }else
            {
                $this->data['error_email']="l'adresse email <b>".$email."</b> n'existe pas";
                $this->load->view('includes/header');
                $this->load->view('includes/menu_page_no_log');
               //$this->load->view('includes/second_nav_inner_bar');
                //$this->load->view('includes/finder');
                $this->load->view('forgotpassword',$this->data);
                $this->load->view('includes/footer');
            }



        }else{

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_no_log');
           //$this->load->view('includes/second_nav_inner_bar');
            //$this->load->view('includes/finder');
            $this->load->view('forgotpassword');
            $this->load->view('includes/footer');
        }
    }

    function check_email()
    {
        if($this->input->post('email'))
        {
            $this->db->select('NUMUSER');
            $this->db->from('utilisateur');
            $this->db->where('EMAILUSER',$this->input->post('email'));
            if($this->db->count_all_results()>0)
            {
                $this->form_validation->set_message('check_email','Utilisateur existant');
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_password($rs=FALSE)
    {
        $rs=$this->uri->segment(3);
        if($this->input->server('REQUEST_METHOD') === 'POST' ){

            $this->form_validation->set_rules('npassword', 'Password', 'trim|required|min_length[6]|max_length[20]|xss_clean');
            $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE)
            {
                $this->data['error_get_password']="Erreur recupération mot de passe";
                $this->load->view('includes/header');
                $this->load->view('includes/menu_page_no_log');
               //$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('gp_form',$this->data);
                $this->load->view('includes/footer');

            }
            else
            {
                $query=$this->db->get_where('utilisateur', array('RS' => $rs), 1);

                if ($query->num_rows() == 0)
                {
                    show_error('Désolé!! action invalide');
                }
                else
                {
                    $this->data = array(
                        'MOTDEPASSEUSER' =>md5($this->input->post('npassword')),
                        'RS' => ''
                    );

                    $where=$this->db->where('RS', $rs);

                    $where->update('utilisateur',$this->data);

                    $this->data['success_get_password']="Congratulations!";
                    $this->load->view('includes/header');
                    $this->load->view('includes/menu_page_no_log');
                   //$this->load->view('includes/second_nav_inner_bar');
                    $this->load->view('gp_form',$this->data);
                    $this->load->view('includes/footer');
                }

            }
        }else
        {
            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_no_log');
           //$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('gp_form');
            $this->load->view('includes/footer');

        }


    }

    function activate()
    {
        $this->load->library("security");
        $confirm_inscription= $this->security->xss_clean($this->uri->segment(3));;
       // show_error($confirm_inscription);
        $query=$this->db->get_where('utilisateur', array('CONFIRMINSCRIPTIONEMAIL' => $confirm_inscription), 1);

        if ($query->num_rows() == 0)
        {
            //show_error('Sorry!!! Invalid Request!');
           // $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
            //$this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
           // $this->data['iduser']=encryptor('encrypt', $idUser);


           // $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($idUser);
            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_no_log');
          //  $this->load->view('includes/second_nav_inner_bar',$this->data);
            $this->load->view('includes/finder');
            $this->load->view('404',$this->data);
            $this->load->view('includes/footer');
        }
        else
        {
            //Code verification num tel
            $code = rand(1000, 9999); // random 4 digit code

            $this->data = array(
                'CONFIRMINSCRIPTIONEMAIL' => '',
                'VERIFNUMTEL'=>$code
            );


            $where=$this->db->where('CONFIRMINSCRIPTIONEMAIL', $confirm_inscription);


            $where->update('utilisateur',$this->data);

            $telephone='';
            foreach($query->result() as $row)
            {
                $email=$row->EMAILUSER;
                $this->data_mail['nom']=$row->NOMUSER;
                $this->data_mail['prenom']=$row->PRENOMUSER;
                $this->data_mail['email']=$row->EMAILUSER;
               $telephone=$row->TELUSER;

            }



            $datasession=array('login'=>$this->data_mail['email'],
                    'logged'=>true);

            //Variable de log
            $data_u=array(
                'DERNIERECONNEXION'=>date('Y-m-d H:i:s', now())
            );
            $this->signup_model->update_last_connexion($this->data_mail['email'],$data_u);
            //end logging connexion time

            //Envoi email confirmation inscription
            $this->send_mail('support@kukkea.com',$email,'Bienvenue sur Kukkea',$this->load->view('email/success_register',$this->data_mail,true));

            //Envoi du sms avec code activation numero de telephone
            $this->send_sms($code,$telephone);

            //We connect automatically user
            $this->session->set_userdata($datasession);

            $this->session->set_flashdata('bienvenue', 'Inscription Terminée');
            redirect('signup/membres');

            /*$this->data['success_confirm_inscription']="Congratulations!";
            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_no_log');
           //$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('confirm_inscription',$this->data);
            $this->load->view('includes/footer');*/
        }

    }

    //Function pour l'activation du compte par code envoyer via le courrier
    function activatecode()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST' )
        {
            $this->form_validation->set_rules('codeconfirmation','Code activation','trim|required|xss_clean|callback_check_code');

            if($this->form_validation->run())
            {
                $confirm_inscription_code=$this->input->post('codeconfirmation');
                $query=$this->db->get_where('utilisateur', array('CONFIRMINSCRIPTIONCOURRIER' => $confirm_inscription_code), 1);

                if ($query->num_rows() == 0)
                {
                    $this->data['code_error']="Ce code de confirmation est erroné";
                    $this->load->view('includes/header');
                    $this->load->view('includes/menu_page_no_log');
                    //$this->load->view('includes/second_nav_inner_bar');
                    $this->data['echec_confirm_inscription_courrier']="Ce code de confirmation est erroné";
                    $this->form_validation->set_message('codeconfirmation','Ce code de confirmation est erroné');
                    $this->load->view('code_confirmation',$this->data);
                    $this->load->view('includes/footer');
                }
                else
                {
                    $this->data = array(
                        'CONFIRMINSCRIPTIONCOURRIER' => ''
                    );

                    $where=$this->db->where('CONFIRMINSCRIPTIONCOURRIER', $confirm_inscription_code);

                    $where->update('utilisateur',$this->data);
                    $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
                    $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
                    $this->data['iduser']=encryptor('encrypt', $idUser);

                    $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


                    echo "Congratulations!";
                    $this->data['success_confirm_inscription_courrier']="Congratulations!";
                    $this->load->view('includes/header');
                    $this->load->view('includes/menu_page_no_log',$this->data);
                   //$this->load->view('includes/second_nav_inner_bar');
                    $this->load->view('confirm_final_inscription',$this->data);
                    $this->load->view('includes/footer');
                }
            }
            else
            {
                $this->load->view('includes/header');
                $this->load->view('includes/menu_page_no_log');
                //$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('code_confirmation');
                $this->load->view('includes/footer');
            }
        }else
        {
            if($this->signup_model->check_confirm_inscription_courrier($this->session->userdata('login'))){
                $this->data['statut_confirm_by_courrier']='true';
            }else{
                $this->data['statut_confirm_by_courrier']='false';
            }
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
            $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $this->data['iduser']=encryptor('encrypt', $idUser);

            $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_no_log',$this->data);
            //$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('code_confirmation',$this->data);
            $this->load->view('includes/footer');
        }
    }



    function activatecodetelephonique()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST' )
        {
            $this->form_validation->set_rules('codetelephonique','Code activation','trim|min_length[4]|max_length[4]|required|xss_clean|integer');

            if($this->form_validation->run())
            {

                $codetelephone=$this->input->post('codetelephonique');
                $emailuser=$this->session->userdata('login');

                $query=$this->db->query("SELECT NUMUSER from utilisateur WHERE VERIFNUMTEL=".$codetelephone." AND EMAILUSER ='".$emailuser."'");

                $this->output->enable_profiler(TRUE);
                print_r($query);


                if($query->num_rows()<=0)
                {
                    $this->session->set_flashdata('telephoneko1', 'Le code que vous avez reneigné n\'est pas celui que nous vous avons envoyé');
                    redirect('signup/membres');
                }
                else
                {
                    $this->data = array(
                        'VERIFNUMTEL' => ''
                    );
                    $this->db->where('VERIFNUMTEL', $this->input->post('codetelephonique'));
                    $this->db->where('EMAILUSER', $this->session->userdata('login'));
                    $this->db->update('utilisateur',$this->data);
                    $this->session->set_flashdata('telephoneok', 'Votre numéro de télephone est certifié');
                    redirect('signup/membres');
                }


            }
            else
            {
                /*
                $this->load->view('includes/header');
                $this->load->view('includes/menu_page_no_log');
                //$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('code_confirmation');
                $this->load->view('includes/footer');
                */
                $this->session->set_flashdata('telephoneko2', 'Le code doit avoir 4 caractères numériques ex:1234');
                redirect('signup/membres');
            }

        }
        else
        {
            redirect('signup/membres');
        }

    }




    function check_code()
    {
        if($this->input->post('codeconfirmation'))
        {
            $this->db->select('NUMUSER');
            $this->db->from('utilisateur');
            $this->db->where('CONFIRMINSCRIPTIONCOURRIER',$this->input->post('codeconfirmation'));
            if($this->db->count_all_results()<0)
            {
                $this->form_validation->set_message('check_code','Ce code de confirmation est erroné');
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    function check_code_telephone()
    {
        $codetelephone=$this->input->post('codetelephonique');
        $emailuser=$this->session->userdata('login');

        if($codetelephone)
        {
            $query=$this->db->query("SELECT NUMUSER from utilisateur WHERE VERIFNUMTEL=".$codetelephone." AND EMAILUSER ='".$emailuser."'");


            if($query->num_rows()<0)
            {
                $this->form_validation->set_message('check_code','Ce code de confirmation est erroné');
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    function profil()
    {



        $id_user_profil=encryptor('decrypt',$this->uri->segment(3));

        $this->data['user_profil_info']=$this->utilisateur_model->get_user_info_by_id($id_user_profil);

        $this->data['number_annonce_user_profil']=$this->annonce_model->get_number_annonce_user_by_id($id_user_profil);
        $this->data['statut_confirm_by_phone']=$this->signup_model->check_confirm_inscription_phone($id_user_profil);


        $this->data['avis']=$this->avis_model->get_all_avis($id_user_profil);
        $this->data['average_avis']=round($this->avis_model->get_avg_avis($id_user_profil),1);
        $this->data['nombre_avis']=$this->avis_model->get_number_avis($id_user_profil);
        $this->data['age_user_profil']=getAge($this->utilisateur_model->get_user_birthday($id_user_profil));
        $this->data['experience']=$this->utilisateur_model->get_experience($id_user_profil);






        if($this->session->userdata('login'))
        {
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
            //$this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $this->data['iduser']=encryptor('encrypt', $idUser);
            //$this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            /*if($this->signup_model->check_confirm_inscription_courrier($this->session->userdata('login'))){
                $this->data['statut_confirm_by_courrier']='true';
            }else{
                $this->data['statut_confirm_by_courrier']='false';
            }*/
            $this->load->view('includes/header',$this->data);
            $this->load->view('includes/menu_page_log',$this->data);
          //  $this->load->view('includes/second_nav_inner_bar',$this->data);
           // $this->load->view('includes/finder');
            $this->load->view('profil',$this->data);
            $this->load->view('includes/footer');


        }
        else
        {

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_no_log',$this->data);
          //  $this->load->view('includes/second_nav_inner_bar',$this->data);
           // $this->load->view('includes/finder');
            $this->load->view('profil',$this->data);
            $this->load->view('includes/footer');

        }

    }
    public function send_mail($from,$to,$subject, $message)
    {

        $this->email->from($from, 'Kukkea');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }


    function send_sms($code,$numero_telephone)
    {
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        $from = 'KUKKEA';
        $to = $numero_telephone;
        $message = array(
            'text'=>'Votre code de vérification sur Kukkea est: ' . $code,
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        /*echo "<h1>Text Message</h1>";
        //$this->nexmo->d_print($response);
        echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";

        //some error checking
        $data = json_decode($response, true);
        echo $data;
        if($this->nexmo->get_http_status()!='200'){
            throw new Exception('Unknown API Response');
        }
        foreach($data['messages'] as $message){
            if(0 != $message['status']){
                throw new Exception('API Error: ' . $message['error-text']);
            }
        }*/
    }

    function generatecode()
    {
        $telephone=encryptor('decrypt',$this->input->get('tel'));
        $user=encryptor('decrypt',$this->input->get('user'));

        $code = rand(1000, 9999); // random 4 digit code
        $data = array(
            'VERIFNUMTEL'=>$code
        );
        $this->utilisateur_model->update_user($user,$data);

        $this->send_sms($code,$telephone);

        $this->session->set_flashdata('regenerationok', 'Vous venez de recevoir un nouveau code suite à votre demande.');
        redirect('signup/membres');

    }

}