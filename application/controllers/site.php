<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 28/03/14
 * Time: 18:51
 */

class Site extends  CI_Controller {

    function __construct(){

        parent::__construct();
      //  $this->lang->load('form', $this->config->item('language'));
        $this->load->library('Minify');

    }



    function allannonce()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->annonce_model->get_all_annonce()));

    }
    function index()
    {

       /* $config = array();
        $config["base_url"] = base_url() . "site/index";
        $config["total_rows"] = $this->annonce_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"]=10;

        $this->pagination->initialize($config);



        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["rows"] = $this->annonce_model->
            fetch_annonce($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();





        /*$id_user_annonce=$this->annonce_model->get_id_user_by_annonce($this->uri->segment(3));
        $data['avis']=$this->avis_model->get_last_avis($id_user_annonce);
        $data['average_avis']=round($this->avis_model->get_avg_avis($id_user_annonce),1);
        $data['nombre_avis']=$this->avis_model->get_number_avis($id_user_annonce);*/



        $data['heading']='Mes annonces';
       // $data['rows']= $this->annonce_model->get_all_annonce();
      //  $data['rowsProfessionnel']=$this->annonce_model->get_all_annonce_professionnel();
        $data['rowsParticulier']=$this->annonce_model->get_all_annonce_particulier();
        $data['number_annonce_particulier']=$this->annonce_model->get_number_annonce_particulier();
     //   $data['number_annonce_professionnel']=$this->annonce_model->get_number_annonce_professionnel();
      //  $data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();
        $data['number_all_annonce']=$this->annonce_model->get_number_all_annonce();
        $data['nombre_utilisateurs']=$this->utilisateur_model->get_number_user();


        if($this->session->userdata('login'))
        {
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $data['iduser']=encryptor('encrypt', $idUser);

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);


            /*if($this->signup_model->check_confirm_inscription_courrier($email)){
                $data['statut_confirm_by_courrier']='true';
            }else{
                $data['statut_confirm_by_courrier']='false';
            }*/

            $data['user_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            $data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);


            /*$email=$this->session->userdata('login');

            if($this->signup_model->check_confirm_inscription_courrier($email)){
                $data['statut_confirm_by_courrier']='true';
            }else{
                $data['statut_confirm_by_courrier']='false';
            }*/


            $this->load->view('includes/header');
            $this->load->view('includes/nav_inner_bar_log',$data);
          //  $this->load->view('includes/second_nav_inner_bar',$data);
            $this->load->view('includes/finder');
            $this->load->view('accueil',$data);
            $this->load->view('includes/footer');




        }
        else{
            $this->load->view('includes/header');
            $this->load->view('includes/nav_inner_bar');
           //$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('includes/finder');
            $this->load->view('accueil',$data);
            $this->load->view('includes/footer');
        }





   }



} 