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
        $this->load->library('Minify');
    }

    function allannonce(){
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->annonce_model->get_all_annonce()));
    }

    function index(){

        $data['nombre_utilisateurs']=$this->utilisateur_model->get_number_user();

        $this->load->view('includes/header');
        $this->load->view('includes/nav_inner_bar');
        $this->load->view('includes/finder');
        $this->load->view('accueil',$data);
        $this->load->view('includes/footer');
   }
} 