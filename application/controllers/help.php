<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 28/03/14
 * Time: 18:51
 */

class Help extends  CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->library('Minify');
        $this->output->cache(15);


    }

    function index()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
            //$this->load->view('includes/second_nav_inner_bar');
            // $this->load->view('includes/finder');
            $this->load->view('help');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            //$this->load->view('includes/second_nav_inner_bar');
            //  $this->load->view('includes/finder');
            $this->load->view('help');
            $this->load->view('includes/footer');
        }
    }

    function contact()
    {
        $data=Array();

        $config['center'] = '37.4419, -122.1419';
        $config['directions'] = TRUE;
        $config['zoom']=5;
        $config['directionsStart'] = '13 rue abelard Lille';
        $config['directionsEnd'] = '13 rue abelard Lille';
        $config['directionsDivID'] = 'directionsDiv';
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();

        if($this->input->server('REQUEST_METHOD') === 'POST' ){
            $this->form_validation->set_rules('nomprenom','Nom & Prenom','trim|required|min_length[2]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('sujet','Sujet','trim|required|min_length[5]|max_length[100]|xss_clean');
            $this->form_validation->set_rules('message','Votre Message','trim|required|min_length[10]|max_length[500]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
            if($this->form_validation->run())
            {
                $this->email->from($this->input->post('email'), $this->input->post('nomprenom'));
                $this->email->to('contact@kukkea.com');
                $this->email->subject($this->input->post('sujet'));
                $this->email->message($this->input->post('message') );
                $this->email->send();
                $data['success']='Nous avons bien recu votre message \n nous vous contacterons dans un delai de 48h';
            }else
            {
                $data['echec']='true';
            }

        }

        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);




            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('contact_us');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('contact_us',$data);
            $this->load->view('includes/footer');
        }
    }

    function legal_mentions()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('legal-mentions');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
            //$this->load->view('includes/finder');
            $this->load->view('legal-mentions');
            $this->load->view('includes/footer');
        }
    }
    function security_recommendations()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
            //$this->load->view('includes/finder');
            $this->load->view('security-recommendations');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('security-recommendations');
            $this->load->view('includes/footer');
        }
    }

    function cgu()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('cgu');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('cgu');
            $this->load->view('includes/footer');
        }
    }

    function about()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('about');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('about');
            $this->load->view('includes/footer');
        }
    }

    function howitworks()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('how-it-works');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('how-it-works');
            $this->load->view('includes/footer');
        }
    }

    function experience()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header');
            //$this->load->view('includes/navbar',$data);
            $this->load->view('includes/menu_page_log',$data);

            //$this->load->view('includes/second_nav_inner_bar');
            //$this->load->view('includes/finder');
            $this->load->view('experience');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            $this->load->view('includes/navbar_view');
            //$this->load->view('includes/second_nav_inner_bar');
         //   $this->load->view('includes/finder');
            $this->load->view('experience');
            $this->load->view('includes/footer');
        }
    }

    function confident()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('confident');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
          //  $this->load->view('includes/finder');
            $this->load->view('confident');
            $this->load->view('includes/footer');
        }
    }

    function questions()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('questions',$data);
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
          //  $this->load->view('includes/finder');
            $this->load->view('questions');
            $this->load->view('includes/footer');
        }
    }

    function regledetransport(){
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
           //$this->load->view('includes/second_nav_inner_bar');
           // $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
          //  $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
    }

    function creercompte()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
            //$this->load->view('includes/second_nav_inner_bar');
            // $this->load->view('includes/finder');
            $this->load->view('creer-compte');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            //$this->load->view('includes/second_nav_inner_bar');
            //  $this->load->view('includes/finder');
            $this->load->view('creer-compte');
            $this->load->view('includes/footer');
        }
    }

    function expediercolis()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
            //$this->load->view('includes/second_nav_inner_bar');
            // $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            //$this->load->view('includes/second_nav_inner_bar');
            //  $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
    }
    function transportercolis()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
            //$this->load->view('includes/second_nav_inner_bar');
            // $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            //$this->load->view('includes/second_nav_inner_bar');
            //  $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
    }
    function motdepasseoublie()
    {
        if($this->session->userdata('login'))
        {
            $email=$this->session->userdata('login');

            $idUser=$this->utilisateur_model->get_id_user_by_email($email);
            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $data['iduser']=encryptor('encrypt', $idUser);

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
            //$this->load->view('includes/second_nav_inner_bar');
            // $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            //$this->load->view('includes/second_nav_inner_bar');
            //  $this->load->view('includes/finder');
            $this->load->view('regle-de-transport');
            $this->load->view('includes/footer');
        }
    }


} 