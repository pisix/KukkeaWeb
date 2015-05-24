<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 26/07/14
 * Time: 13:30
 */
class Erreur404 extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Minify');


    }

    public function index()
    {
        $this->output->set_status_header('404');
        $data['content'] = 'error_404'; // View name

        if($this->session->userdata('login'))
        {

            $email=$this->session->userdata('login');

            /*if($this->signup_model->check_confirm_inscription_courrier($email)){
                $data['statut_confirm_by_courrier']='true';
            }else{
                $data['statut_confirm_by_courrier']='false';
            }*/
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $data['iduser']=encryptor('encrypt', $idUser);

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);
            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$data);
          //  $this->load->view('includes/second_nav_inner_bar',$data);
            $this->load->view('404',$data);
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_no_log');
           //$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('404',$data);
            $this->load->view('includes/footer');
        }


    }

}