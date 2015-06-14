<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 28/04/14
 * Time: 10:13
 */

class annonce extends  CI_Controller {
    private  $statut_confirm_by_phone;
    private $data;

    function __construct($email=null,$id=null){

        parent::__construct();
        $this->load->library('Minify');
         //$this->output->cache(15);


    }

    function index(){
        $this->data['titre']='Liste des annonces';

        if($this->session->userdata('login'))
        {

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['iduser']=encryptor('encrypt', $id_user_connecte);
            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);

            $this->load->view('includes/header');
            $this->load->view('includes/navbar',$this->data);
            $this->load->view('find_annonce',$this->data);
        }
        else
        {
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view',$this->data);
            $this->load->view('find_annonce',$this->data);
        }



    }

    function newannonce()
    {


        if($this->session->userdata('login')|| $this->session->userdata('logged') )
        {

            $config['zoom'] = 'auto';
            $config['places'] = TRUE;
            $config['placesAutocompleteInputID'] = 'villedepart';
            $config['map_name'] = 'map_one';
            $this->googlemaps->initialize($config);
            $this->data['map_one'] = $this->googlemaps->create_map();


            $config['zoom'] = 'auto';
            $config['places'] = TRUE;
            $config['placesAutocompleteInputID'] = 'villearrivee';
            $config['map_name'] = 'map_two';
            $this->googlemaps->initialize($config);
            $this->data['map_two']= $this->googlemaps->create_map();


            /*$config2['places'] = TRUE;
            $config2['placesAutocompleteInputID'] = 'villedepart';
            $this->googlemaps->initialize($config2);
            $this->data['map2'] = $this->googlemaps->create_map();*/

            //redirect('signup/membres');
           // $this->data['pays']= $this->pays_model->read();

            $email=$this->session->userdata('login');


            $this->data['statut_confirm_by_phone']=$this->statut_confirm_by_phone;

            $this->data['countries'] = $this->pays_model->get_pays();
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['iduser']=encryptor('encrypt', $idUser);

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);
           /* $this->data['avis']=$this->avis_model->get_last_avis($idUser);
            $this->data['average_avis']=round($this->avis_model->get_avg_avis($idUser),1);
            $this->data['nombre_avis']=$this->avis_model->get_number_avis($idUser);*/

            $this->load->view('includes/header',$this->data);
            $this->load->view('includes/menu_page_log',$this->data);
              $this->load->view('annonce',$this->data);
            $this->load->view('includes/footer');

        }
        else{
            redirect('signup/login');
        }
       /* $this->data['titre']='Déposer une annonce';
        $this->load->view('annonce',$this->data);*/
    }


    /*****LIKE WEBSERVICE***/
    /*
    function get_ville_arrivee($country){
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($this->ville_model->get_ville_arrivee($country));
    }

    function get_ville_depart(){
        $country=$_GET['country_id'];
        log_message('debug', "les paysss ==>");
        foreach($this->ville_model->get_ville_depart($country) as $ville){
            log_message('debug',json_encode($ville));

        }
        //$this->output->set_content_type('application/json');
       // header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($this->ville_model->get_ville_depart($country));
    }*/

    /***** END To DELETE****/
    function get_ville_arrivee($country){
        $result=$this->ville_model->get_ville_arrivee($country);
        $HTML="";
            foreach($result as $NUMVILLEARRIVEE=>$NOMVILLEARRIVEE)
            {
                   $HTML.="<option value='".$NUMVILLEARRIVEE."'>".$NOMVILLEARRIVEE."</option>";
            }
        log_message('debug',$HTML);
       // header('Content-Type: text/html; charset=utf-8');
        echo $HTML;
    }

    function get_ville_depart($country){

        $result=$this->ville_model->get_ville_depart(trim($country));
        $HTML="";
        if($result->num_rows() > 0){

            foreach($result->result() as $list)
            {
                $HTML.="<option value='".$list->NUMVILLEDEPART."'>".$list->NOMVILLEDEPART."</option>";
            }
            log_message('debug',$HTML);
            echo trim($HTML);

        }else
        {
               echo trim($HTML);
        }

    }



    function addannonce()
    {

        /*$this->form_validation->set_rules('paysdepart','Pays de départ','trim|required|xss_clean');
        $this->form_validation->set_rules('paysarrivee','Pays d\'arrivée','trim|required|xss_clean');*/
        $this->form_validation->set_rules('villedepart','Ville de départ','trim|xss_clean');
        $this->form_validation->set_rules('villearrivee','Ville d\'arrivée','trim|xss_clean');
     /*   $this->form_validation->set_rules('villearriveesaisi','Ville d\'arrivée','trim|xss_clean');
        $this->form_validation->set_rules('villedepartsaisi','Ville de départ','trim|xss_clean');*/
        $this->form_validation->set_rules('titreannonce','Titre de l\'annonce','trim|xss_clean');
        $this->form_validation->set_rules('texteannonce','Texte de l\'annonce','trim|xss_clean');
        $this->form_validation->set_rules('prix','Prix','trim|xss_clean');
        $this->form_validation->set_rules('datedebutannonce','Date de debut','trim|xss_clean');
        $this->form_validation->set_rules('poids','Poids','trim|required|xss_clean');
        $email=$this->session->userdata('login');

        $this->data['statut_confirm_by_phone']=$this->statut_confirm_by_phone;


        // $this->form_validation->set_rules('datefinannonce','Date de fin','trim|xss_clean');

        if($this->form_validation->run())
        {
           /*Interdiction de renseigner une email ou un numéro de téléphone dans le corps du message*/
            if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $this->input->post('titreannonce')))
            {
                $this->data['error_titre'] = "Le titre ne doit pas contenir d'adresse email ou de numéro de téléphone";
                $this->data['countries'] = $this->pays_model->get_pays();
                $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['iduser']=encryptor('encrypt', $idUser);

                $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

                $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);

                $this->load->view('includes/header',$this->data);
                $this->load->view('includes/navbar',$this->data);
                /*$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('includes/finder');*/
                $this->load->view('annonce',$this->data);
                $this->load->view('includes/footer');

            }
            else if(preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $this->input->post('texteannonce')))
            {
                $this->data['error_annonce'] = "Le contenu de l'annonce ne doit pas contenir d'adresse email ou de numéro de télphone";
                $this->data['countries'] = $this->pays_model->get_pays();
                $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['iduser']=encryptor('encrypt', $idUser);

                $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

                $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);

                $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($idUser);
                $this->load->view('includes/header',$this->data);
                $this->load->view('includes/navbar',$this->data);
                /*$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('includes/finder');*/
                $this->load->view('annonce',$this->data);
                $this->load->view('includes/footer');


            }
            else
            {

                $villearriveeInfo = explode(",", $this->input->post('villearrivee'), 2);
                $villearrivee = $villearriveeInfo[0];
                $paysarrivee=$villearriveeInfo[1];

                $villedepartInfo = explode(",", $this->input->post('villedepart'), 2);
                $villedepart = $villedepartInfo[0];
                $paysdepart=$villedepartInfo[1];




                $dataAnnonce=array(
                    'NOMVILLEARRIVEE'=>$villearrivee,
                    'NOMVILLEDEPART'=>$villedepart,
                    'NOMPAYSARRIVEE'=>$paysarrivee,
                    'NOMPAYSDEPART'=>$paysdepart,
                    'NUMUSER'=>$this->input->post('id_user'),
                    'TITREANNONCE'=>$this->input->post('titreannonce'),
                    'CONTENUANNONCE'=>$this->input->post('texteannonce'),
                    'DATEAJOUTANNONCE'=>date('Y-m-d H:i:s', now()),
                    'PRIX'=>$this->input->post('prix'),
                    'POIDS'=>$this->input->post('poids'),
                    'DATEDEBUTANNONCE'=>date('Y-m-d',strtotime($this->input->post('datedebutannonce'))),
                    'DATEFINANNONCE'=>date('Y-m-d',strtotime($this->input->post('datefinannonce'))),
                    'TYPE_ANNONCE'=>$this->input->post('typeannonce')
                );
                $this->annonce_model->addannonce($dataAnnonce);

                $this->data['success']='Annonce Ajoutée avec succès.';
                /*$this->data['countries'] = $this->pays_model->get_pays();
                $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
                $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
                $this->data['iduser']=encryptor('encrypt', $idUser);

                $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($idUser);*/

                $this->session->set_flashdata('ajoutannonce', 'Votre annonce a été publiée avec succès');
                redirect('signup/membres');

            }
        }
        else
        {
            $this->data['error']='Echec lors de l\'ajout de l\'annonce';
            $this->data['countries'] = $this->pays_model->get_pays();
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['iduser']=encryptor('encrypt', $idUser);

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);

            $this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($idUser);

            $this->load->view('includes/header',$this->data);
            $this->load->view('includes/navbar',$this->data);
            /*$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('includes/finder');*/
            $this->load->view('annonce',$this->data);
            $this->load->view('includes/footer');


        }


    }

    function find_annonce()
    {
       /* if(!$this->session->userdata('login') || !$this->session->userdata('logged'))
        {
            redirect('signup/membres');
        } else
        {*/
           // $email=$this->session->userdata('login');
          //  $idUser=$this->utilisateur_model->get_id_user_by_email($email);
          //  $this->data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
            $this->data['titre']='Liste des annonces';
            $this->load->view('my_annonces',$this->data);
        //}
    }

    function envoi()
    {

        $total_row=$this->annonce_model-> get_number_annonce_envoi_by_type_user();

       // $config['page_query_string'] = TRUE;
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
       // $this->data['per_page']=$config["per_page"];
        $config["base_url"] = base_url() . "annonce/envoi";
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['next_link'] = "<span class='glyphicon glyphicon-arrow-right'>";
        $config['prev_link'] = "<span class='glyphicon glyphicon-arrow-left'>";
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $offset = $page==0? 0: ($page-1)*$config["per_page"];

        //$this->data['all_annonce_envoi']=$this->annonce_model->get_all_annonce_envoi();
        $this->data['all_annonce_envoi']=$this->annonce_model->fetch_annonce_envoi($config["per_page"], $offset);
        $this->data['limit']=$config["per_page"];
        $this->data['start']=$offset;
        $this->data['links'] = $this->pagination->create_links();




        // $this->data['number_annonce_envoi_by_type_user']=$this->annonce_model-> get_number_annonce_envoi_by_type_user();
       /* $this->data['number_annonce_envoi_by_type_user_pro']=$this->annonce_model-> get_number_annonce_envoi_by_type_user_pro();*/
       // $this->data['all_annonce_envoi_by_type_user']=$this->annonce_model->get_all_annonce_envoi_by_type_user();
        /*$this->data['all_annonce_envoi_by_type_user_pro']=$this->annonce_model->get_all_annonce_envoi_by_type_user_pro();*/
        $this->data['total_number_annonce_envoi']=$total_row ;
        //$this->data['number_annonce_envoi']=$this->annonce_model->get_number_annonce_envoi();
        $this->data['titre']='Liste des annonces';


        if($this->session->userdata('login'))
        {
            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $id_user_annonce=$this->annonce_model->get_id_user_by_annonce(encryptor('decrypt',$this->uri->segment(3)));
            // $this->data['user_annonce_info']=$this->utilisateur_model->get_user_info_by_id($id_user_annonce);
            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            /*$this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($id_user_annonce);*/

            $this->data['number_annonce_user_annonce']=$this->annonce_model->get_number_annonce_user_by_id($id_user_annonce);
            $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);
            $this->data['iduser']=$id_user_connecte;


            $this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();
            $this->data['statut_confirm_by_phone']=$this->statut_confirm_by_phone;

            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$this->data);
            $this->load->view('envoi',$this->data);
            $this->load->view('includes/footer');
        }
        else
        {
            /*$this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();*/
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view',$this->data);
            $this->load->view('envoi',$this->data);
            $this->load->view('includes/footer');
        }

    }

    function transport()
    {
        $total_row=$this->annonce_model->get_number_annonce_transport();

        // $config['page_query_string'] = TRUE;
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
        // $this->data['per_page']=$config["per_page"];
        $config["base_url"] = base_url() . "annonce/transport";
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['next_link'] = "<span class='glyphicon glyphicon-arrow-right'>";
        $config['prev_link'] = "<span class='glyphicon glyphicon-arrow-left'>";
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $offset = $page==0? 0: ($page-1)*$config["per_page"];

        //$this->data['all_annonce_envoi']=$this->annonce_model->get_all_annonce_envoi();
        $this->data['all_annonce_transport']=$this->annonce_model->fetch_annonce_transport($config["per_page"], $offset);

        $this->data['limit']=$config["per_page"];
        $this->data['start']=$offset;
        $this->data['links'] = $this->pagination->create_links();

        /*$this->data['all_annonce_transport']=$this->annonce_model->get_all_annonce_transport();*/
        //$this->data['number_annonce_transport_by_type_user']=$this->annonce_model-> get_number_annonce_transport_by_type_user();
       // $this->data['number_annonce_transport_by_type_user_pro']=$this->annonce_model-> get_number_annonce_transport_by_type_user_pro();
       // $this->data['all_annonce_transport_by_type_user']=$this->annonce_model->get_all_annonce_transport_by_type_user();
       // $this->data['all_annonce_transport_by_type_user_pro']=$this->annonce_model->get_all_annonce_transport_by_type_user_pro();
        $this->data['total_number_annonce_transport']=$total_row;

      //  $this->data['number_annonce_transport']=$this->annonce_model->get_number_annonce_transport();
        $this->data['titre']='Liste des annonces';
        if($this->session->userdata('login'))
        {
            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $id_user_annonce=$this->annonce_model->get_id_user_by_annonce(encryptor('decrypt',$this->uri->segment(3)));
            // $this->data['user_annonce_info']=$this->utilisateur_model->get_user_info_by_id($id_user_annonce);
            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            /*$this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($id_user_annonce);*/


            $this->data['number_annonce_user_annonce']=$this->annonce_model->get_number_annonce_user_by_id($id_user_annonce);
            $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);


            /*$this->data['avis']=$this->avis_model->get_last_avis($id_user_annonce);
            $this->data['average_avis']=round($this->avis_model->get_avg_avis($id_user_annonce),1);
            $this->data['nombre_avis']=$this->avis_model->get_number_avis($id_user_annonce);*/
            $this->data['age_user_annonce']=getAge($this->utilisateur_model->get_user_birthday($id_user_annonce));
            $id_user=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user);

            $this->data['iduser']=encryptor('encrypt',$id_user_connecte);
           /* $this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();*/
            $this->data['statut_confirm_by_phone']=$this->statut_confirm_by_phone;


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$this->data);
            $this->load->view('transport',$this->data);
            $this->load->view('includes/footer');

        }
        else
        {
            $this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view',$this->data);
            $this->load->view('transport',$this->data);
            $this->load->view('includes/footer');

        }

    }

    function showannonce()
    {
        $data =Array();
        if($this->uri->segment(3))
        {
            $idannonce=encryptor('decrypt',$this->uri->segment(3));
            $this->data['rows']=$this->annonce_model->get_annonce_by_id($idannonce);


            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $id_user_annonce=$this->annonce_model->get_id_user_by_annonce(encryptor('decrypt',$this->uri->segment(3)));
            $this->data['user_annonce_info']=$this->utilisateur_model->get_user_info_by_id($id_user_annonce);
            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            /*$this->data['user_info']=$this->utilisateur_model->get_user_info_by_id($id_user_annonce);*/


            $this->data['avis']=$this->avis_model->get_last_avis($id_user_annonce);
            $this->data['average_avis']=round($this->avis_model->get_avg_avis($id_user_annonce),1);
            $this->data['nombre_avis']=$this->avis_model->get_number_avis($id_user_annonce);
            $this->data['age_user_annonce']=getAge($this->utilisateur_model->get_user_birthday($id_user_annonce));
            $this->data['experience']=$this->utilisateur_model->get_experience($id_user_annonce);



            /*$config['directions'] = TRUE;
            foreach($this->data['rows'] as $r)
            {
                $config['directionsStart'] = $r->NOMVILLEDEPART;
                $config['directionsEnd'] = $r->NOMVILLEARRIVEE;

            }

           // $config['directionsDivID'] = 'directionsDiv';
            $this->googlemaps->initialize($config);
            $this->data['map'] = $this->googlemaps->create_map();
            */


            if($this->session->userdata('login'))
            {
                $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));
                $this->data['number_annonce_user_annonce']=$this->annonce_model->get_number_annonce_user_by_id($id_user_annonce);
                $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);

                $this->data['iduser']=encryptor('encrypt',$id_user_connecte);
                $this->data['statut_confirm_by_phone']=$this->signup_model->check_confirm_inscription_phone($id_user_annonce);
                $this->data['number_avis_by_user_for_annonce']=$this->avis_model->get_number_avis_by_user_for_annonce($id_user_connecte,$idannonce);


                $this->load->view('includes/header',$this->data);
                $this->load->view('includes/menu_page_log',$this->data);
              //  $this->load->view('includes/second_nav_inner_bar',$this->data);
                $this->load->view('detail_annonce',$this->data);
                $this->load->view('includes/footer');


            }
            else
            {
               $this->data['number_annonce_user_annonce']=$this->annonce_model->get_number_annonce_user_by_id($id_user_annonce);
                $email=$this->annonce_model->get_email_user_by_annonce(encryptor('decrypt',$this->uri->segment(3)));
                $this->data['statut_confirm_by_phone']=$this->signup_model->check_confirm_inscription_phone($id_user_annonce);
                $this->data['number_avis_by_user_for_annonce']=$this->avis_model->get_number_avis_by_user_for_annonce($id_user_connecte,$idannonce);


                $this->load->view('includes/header',$this->data);
                $this->load->view('includes/navbar_view',$this->data);
              //  $this->load->view('includes/second_nav_inner_bar',$this->data);
                $this->load->view('detail_annonce',$this->data);
                $this->load->view('includes/footer');


            }


        }

        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('iduserannonce','id user','trim|xss_clean');
            $this->form_validation->set_rules('numannonce','id user','trim|xss_clean');
            $this->form_validation->set_rules('emailuseravis','Email user','trim|min_length[3]|xss_clean');
            $this->form_validation->set_rules('contenu','Contenu','trim|xss_clean');
            $this->form_validation->set_rules('note','Note');

            if($this->form_validation->run())
            {
                $iduserdonnantavis=$this->utilisateur_model->get_id_user_by_email($this->input->post('emailuseravis'));
                $data_avis=array(
                    'NUMUSER'=>$this->input->post('iduserannonce'),
                    'NUMANNONCE'=>$this->input->post('numannonce'),
                    'NUMUSERDONNANTAVIS'=>$iduserdonnantavis,
                    'CONTENU'=>$this->input->post('contenu'),
                    'DATEAJOUTAVIS'=>date('Y-m-d H:i:s', now()),
                    'NOTE'=>$this->input->post('note')
                );

                $this->avis_model->add_avis($data_avis);
                $this->session->set_flashdata('avisprisencompte', 'Votre Avis sur cette utilisateur a été pris en compte');
                redirect('annonce/showannonce/'.encryptor('encrypt',$this->input->post('numannonce')));

            }


        }


    }

    function search()
    {


       if($this->input->server('REQUEST_METHOD') === 'GET' && $this->session->userdata('login'))
        {
            //  $this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['iduser']=encryptor('encrypt', $idUser);

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$this->data);
          //  $this->load->view('includes/second_nav_inner_bar',$this->data);
            //$this->load->view('includes/finder',$this->data);
            $this->load->view('result_find',$this->data);

            $this->load->view('includes/footer');
        }
        else if($this->input->server('REQUEST_METHOD') === 'GET' && !$this->session->userdata('login'))
        {
            //$this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('result_find',$this->data);

          //  $this->load->view('includes/finder');
            $this->load->view('includes/footer');
        }
        else if($this->input->server('REQUEST_METHOD') === 'POST' && $this->session->userdata('login'))
        {
            $this->form_validation->set_rules('typecolis','Categorie','trim|xss_clean');
            $this->form_validation->set_rules('villedepartsearch','Ville de départ','trim|min_length[3]|xss_clean');
            $this->form_validation->set_rules('villearriveesearch','Ville d\'arrivée','trim|xss_clean');
            $this->form_validation->set_rules('date','Date','trim|xss_clean');

            if($this->form_validation->run())
            {
                $this->data['result_find']="Resultat Recherche";

                    //$this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();
                $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['iduser']=encryptor('encrypt', $idUser);

                $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

                $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);


                $categorie=$this->input->post('typecolis');
                $villearrivee=$this->input->post('villearriveesearch');
                $villedepart=$this->input->post('villedepartsearch');
                $paysarrivee='';
                $paysdepart='';


                if (strpos($this->input->post('villearriveesearch'),',') !== false) {
                        $villearriveeInfo = explode(",", $this->input->post('villearriveesearch'), 2);
                        $villearrivee = $villearriveeInfo[0];
                        $paysarrivee=$villearriveeInfo[1];
                }

                if (strpos($this->input->post('villedepartsearch'),',') !== false) {
                        $villedepartInfo = explode(",", $this->input->post('villedepartsearch'), 2);
                        $villedepart = $villedepartInfo[0];
                        $paysdepart=$villedepartInfo[1];
                }


                   /* $villedepart=$this->input->post('villedepartsearch');
                    $villearrivee=$this->input->post('villearriveesearch');*/
                     $datestart=$this->input->post('date');
                    $this->data['villedepartsearch']=$villedepart;
                    $this->data['villearriveesearch']=$villearrivee;

                    /*set data with value for alert form*/
                    $this->data['villedepartalerte']=$this->input->post('villedepartsearch');
                    $this->data['villearriveealerte']=$this->input->post('villearriveesearch');
                    $this->data['categorie']=$this->input->post('typecolis');
                    $this->data['datedepart']=$this->input->post('datesearch');


                    /*end set*/
                    $this->data['result_find']=$this->annonce_model->find_by_ville_depart_and_ville_arrivee($villedepart,$villearrivee,$categorie,$datestart);
                   // $this->data['result_find_pro']=$this->annonce_model->find_by_ville_depart_and_ville_arrivee_pro($villedepart,$villearrivee,$categorie,$datestart);
                    $this->data['result_find_user']=$this->annonce_model->find_by_ville_depart_and_ville_arrivee_user($villedepart,$villearrivee,$categorie,$datestart);

                $this->data['statut_confirm_by_phone']=$this->statut_confirm_by_phone;

                $this->load->view('includes/header',$this->data);
                    $this->load->view('includes/menu_page_log',$this->data);
                  //  $this->load->view('includes/second_nav_inner_bar',$this->data);
                    $this->load->view('result_find',$this->data);
                    $this->load->view('includes/footer');

                }
        }
        else if($this->input->server('REQUEST_METHOD') === 'POST' && !$this->session->userdata('login'))
        {
            $categorie=$this->input->post('typecolis');
            /*$villedepart=$this->input->post('villedepartsearch');
            $villearrivee=$this->input->post('villearriveesearch');*/
            $datestart=$this->input->post('date');

            $villearrivee=$this->input->post('villearriveesearch');
            $villedepart=$this->input->post('villedepartsearch');
            $paysarrivee='';
            $paysdepart='';


            if (strpos($this->input->post('villearriveesearch'),',') !== false) {

                $villearriveeInfo = explode(",", $this->input->post('villearriveesearch'), 2);
               $villearrivee = $villearriveeInfo[0];
               $paysarrivee=$villearriveeInfo[1];
            }

            if (strpos($this->input->post('villedepartsearch'),',') !== false) {
                $villedepartInfo = explode(",", $this->input->post('villedepartsearch'), 2);
               $villedepart = $villedepartInfo[0];
               $paysdepart=$villedepartInfo[1];
             /*  $this->data['all_annonce_premium']=$this->annonce_model->get_all_annonce_premium();*/
            }

            /*Set data for not found annonce*/
            $this->data['villedepartsearch']=$villedepart;
            $this->data['villearriveesearch']=$villearrivee;
            /*set data with value for sending to alert form*/
            $this->data['villedepartalerte']=$this->input->post('villedepartsearch');
            $this->data['villearriveealerte']=$this->input->post('villearriveesearch');
            $this->data['categorie']=$this->input->post('typecolis');
            $this->data['datedepart']=$this->input->post('date');

            /*end set*/


            $this->data['result_find']=$this->annonce_model->find_by_ville_depart_and_ville_arrivee($villedepart,$villearrivee,$categorie,$datestart);
           // $this->data['result_find_pro']=$this->annonce_model->find_by_ville_depart_and_ville_arrivee_pro($villedepart,$villearrivee,$categorie,$datestart);
            $this->data['result_find_user']=$this->annonce_model->find_by_ville_depart_and_ville_arrivee_user($villedepart,$villearrivee,$categorie,$datestart);

            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
           //$this->load->view('includes/second_nav_inner_bar');
            $this->load->view('result_find',$this->data);
            $this->load->view('includes/footer');

        }
       /* else
        {
            $this->data['error']="";
            $this->load->view('result_find',$this->data);
        }*/

    }
    function envoyeremail()
    {


        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('nom','Nom','trim|required|min_length[3]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|');
            $this->form_validation->set_rules('message','Message','trim|required|xss_clean');

            if($this->form_validation->run())
            {


                $data_mail['titreannonce']=$this->input->post('titreannonce');
                $data_mail['email']=$this->input->post('email');
                $data_mail['telephone']=$this->input->post('telephone');
                $data_mail['message']=$this->input->post('message');

                $this->send_mail('support@kukkea.com',$this->input->post('emailuser'),'Message au sujet de votre annonce:'.$this->input->post('titreannonce').' sur Kukkea',$this->load->view('email/envoyer_annonce_by_email',$data_mail,true));

                $this->data['rows']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));
                $this->data['success']='Message envoyé avec succès!.';
                if($this->session->userdata('login'))
                {
                    $email=$this->session->userdata('login');

                    $idUser=$this->utilisateur_model->get_id_user_by_email($email);
                    $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
                    $this->data['rows']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));


                    $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);
                    $this->data['iduser']=encryptor('encrypt', $idUser);

                    $this->load->view('includes/header');
                    $this->load->view('includes/menu_page_log',$this->data);
                   //$this->load->view('includes/second_nav_inner_bar');
                    $this->load->view('envoyeremail',$this->data);
                    $this->load->view('includes/footer');
                }
                else{
                    $this->data['rows']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));

                    $this->load->view('includes/header');
                    $this->load->view('includes/navbar_view');
                   //$this->load->view('includes/second_nav_inner_bar');
                    $this->load->view('envoyeremail',$this->data);
                    $this->load->view('includes/footer');
                }
            }else{

                if($this->session->userdata('login'))
                {
                    $email=$this->session->userdata('login');

                    $idUser=$this->utilisateur_model->get_id_user_by_email($email);
                    $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
                    $this->data['rows']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));


                    $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);
                    $this->data['iduser']=encryptor('encrypt', $idUser);

                    $this->load->view('includes/header');
                    $this->load->view('includes/menu_page_log',$this->data);
                    //$this->load->view('includes/second_nav_inner_bar');
                    $this->load->view('envoyeremail',$this->data);
                    $this->load->view('includes/footer');
                }
                else{
                    $this->data['rows']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));

                    $this->load->view('includes/header');
                    $this->load->view('includes/navbar_view');
                    //$this->load->view('includes/second_nav_inner_bar');
                    $this->load->view('envoyeremail',$this->data);
                    $this->load->view('includes/footer');
                }
            }
        }else
        {
            if($this->session->userdata('login'))
            {
                $email=$this->session->userdata('login');
                $this->data['rows']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));

                $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['iduser']=encryptor('encrypt', $idUser);

                $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));


                $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);

                $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($idUser);
                $this->load->view('includes/header');
                $this->load->view('includes/menu_page_log',$this->data);
               //$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('envoyeremail',$this->data);
                $this->load->view('includes/footer');
            }
            else{
                $this->data['rows']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));
                $this->load->view('includes/header');
                $this->load->view('includes/navbar_view');
               //$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('envoyeremail',$this->data);
                $this->load->view('includes/footer');
            }

        }


    }


    function editannonce($id_annonce)
    {
        if(!$this->session->userdata('login') || !$this->session->userdata('logged'))
        {
            redirect('signup/login');
        }
        else
        {
            $this->data['countries'] = $this->pays_model->get_pays();
            $this->data['annonce_edit']=$this->annonce_model->get_annonce_by_id(encryptor('decrypt',$this->uri->segment(3)));
            $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['iduser']=encryptor('encrypt', $idUser);

            $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

            $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

            $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);

            $this->data['avis']=$this->avis_model->get_last_avis( $idUser);
            $this->data['average_avis']=round($this->avis_model->get_avg_avis( $idUser),1);
            $this->data['nombre_avis']=$this->avis_model->get_number_avis( $idUser);


            $this->load->view('includes/header');
            $this->load->view('includes/menu_page_log',$this->data);
            $this->load->view('editannonce',$this->data);
            $this->load->view('includes/footer');
            $this->output->enable_profiler(TRUE);



        }
    }

    function deleteannonce($id_annonce)
    {
        $this->annonce_model->deleteannonce($this->uri->segment(3));
        $this->session->set_flashdata('messagedelete', 'Votre annonce a été supprimée');
        redirect('signup/membres');
    }

    function updateannonce()
    {
        $this->form_validation->set_rules('titreannonce','Titre de l\'annonce','trim|xss_clean');
        $this->form_validation->set_rules('texteannonce','Texte de l\'annonce','trim|xss_clean');
        $this->form_validation->set_rules('prix','Prix','trim|xss_clean');
        $this->form_validation->set_rules('datedebutannonce','Date de debut','trim|xss_clean');
        $this->form_validation->set_rules('datefinannonce','Date de fin','trim|xss_clean');
        $this->form_validation->set_rules('poids','Poids','trim|xss_clean');

        if($this->form_validation->run())
        {
            $numannonce=encryptor('decrypt',$this->input->post('numannonce'));
            $dataAnnonce=array(
                'TITREANNONCE'=>$this->input->post('titreannonce'),
                'CONTENUANNONCE'=>$this->input->post('texteannonce'),
                'PRIX'=>$this->input->post('prix'),
                'DATEDEBUTANNONCE'=>date('Y-m-d',strtotime($this->input->post('datedebutannonce'))),
                'DATEFINANNONCE'=>date('Y-m-d',strtotime($this->input->post('datefinannonce'))),
                'POIDS'=>$this->input->post('poids'),
                'TYPE_ANNONCE'=>$this->input->post('typeannonce')
            );
            $this->annonce_model->update_annonce($numannonce,$dataAnnonce);
            $this->session->set_flashdata('annoncemisajour', 'Votre annonce a été mise à jour et publiée avec succès');
            redirect('signup/membres');
        }

    }

    function send_annonce_to_friend()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST' ){

            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('emailfriend', 'Email Ami(e)', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE)
            {

            }elseif($this->session->userdata('login'))
            {
                $annonce=$this->annonce_model->get_annonce_by_id($this->input->post('idannonce'));
                $email=$this->input->post('email');
                $emailFriend=$this->input->post('emailfriend');
                $this->email->from('contact@tsmov.com', 'Tsmov.com');
                $this->email->to($emailFriend);

                $this->email->subject('Une annonce pour vous sur kukkea.com');
                $this->email->message('Bonjour,<br/>
                                        J\'ai trouvé une annonce qui devrait vous intéresser sur kukkea.com.<br/>
                                        Voici le lien vers l\'annonce:<br/>'.base_url().'annonce/showannonce/'.$this->input->post('idannonce').'<br/>'. $emailFriend);

                $this->email->send();

                $idUser=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['iduser']=encryptor('encrypt', $idUser);

                $id_user_connecte=$this->utilisateur_model->get_id_user_by_email($this->session->userdata('login'));

                $this->data['user_connecte_info']=$this->utilisateur_model->get_user_info_by_id($id_user_connecte);

                $this->data['number_annonce_user_connecte']=$this->annonce_model->get_number_annonce_user_by_id($id_user_connecte);


                $this->data['idannonce']=$this->input->post('idannonce');

                $this->load->view('includes/header');
                $this->load->view('includes/navbar',$this->data);
               //$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('send_email',$this->data);
                $this->load->view('includes/footer');
            }else
            {
                $annonce=$this->annonce_model->get_annonce_by_id($this->input->post('idannonce'));
                $email=$this->input->post('email');
                $emailFriend=$this->input->post('emailfriend');
                $this->email->from('contact@kukkea.com', 'kukkea.com');
                $this->email->to($emailFriend);

                $this->email->subject('Une annonce pour vous sur kukkea.com');
                $this->email->message('Bonjour,<br/>
                                        J\'ai trouvé une annonce qui devrait vous intéresser sur kukkea.com.<br/>
                                        Voici le lien vers l\'annonce:<br/>'.base_url().'annonce/showannonce/'.$this->input->post('idannonce').'<br/>'. $emailFriend);

                $this->email->send();

                $this->data['idannonce']=$this->input->post('idannonce');


               /* $this->load->view('includes/header');
                $this->load->view('includes/navbar_view');
               //$this->load->view('includes/second_nav_inner_bar');
                $this->load->view('send_email',$this->data);
                $this->load->view('includes/footer');*/

                $this->session->set_flashdata('annonceenvoye', 'L\'annonce a été envoyé à '.$emailFriend);
                redirect(base_url().'annonce/showannonce/'.encryptor('encrypt',$this->input->post('idannonce')));
            }
        }
    }

    function premium()
    {
       redirect('Payments/do_purchase/'.encryptor('decrypt',$this->uri->segment(3)));
    }

    function create_alert()
    {
        $this->form_validation->set_rules('typecolis','Type de la transaction','trim|xss_clean');
        $this->form_validation->set_rules('villedepartalerte','Ville départ alerte','trim|xss_clean');
        $this->form_validation->set_rules('villearriveealerte','Ville arrivé alerte ','trim|xss_clean');
        $this->form_validation->set_rules('date','Date','trim|xss_clean');
        $this->form_validation->set_rules('emailalerte','Email alerte','trim|xss_clean');
        if($this->form_validation->run())
        {
            $dataAlerte=array(
                'VILLEDEPART'=>$this->input->post('villedepartalerte'),
                'VILLEARRIVEE'=>$this->input->post('villearriveealerte'),
                'DATEDEPART'=>date('Y-m-d',strtotime($this->input->post('date'))),
                'EMAIL'=>$this->input->post('emailalerte'),
                'TYPECOLIS'=>$this->input->post('typecolis'),
                'DATE'=>date('Y-m-d H:i:s', now()),
            );
            //Ajouter alerte
            try
            {
                $this->annonce_model->add_alert($dataAlerte);
            }
            catch (mysqli_sql_exception $my)
            {
                $this->session->set_flashdata('erreurbdd', 'Votre alerte n\'a pas pu etre correctement crée! Veuillez recommencer');
                redirect('annonce/search');

            }
            $this->session->set_flashdata('alertsuccess', 'Votre alerte a été créee  avec succès. Vous recevrez une notification par mail en cas de correspondance');
            redirect('annonce/search');
        }
        else
        {

        }
    }
/*
    function matching()
    {
        $villedepart=$this->input->post('villedepart');
        $villearrivee=$this->input->post('villearrivee');
        $date=$this->input->post('date');
        $type=$this->input->post('type');

        $paysdepart=$this->pays_model->get_nom_pays_by_id_ville($villedepart);
        $paysarrivee=$this->pays_model->get_nom_pays_by_id_ville($villearrivee);
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->annonce_model->get_matching_annonce($paysdepart,$paysarrivee,$villedepart,$villearrivee,$date,$type)));
    }

    function show_matching($data1)
    {
        $this->data['result_match']=json_decode($data1);
        $this->load->view('matching',$data,true);
    }
*/



    public function send_mail($from,$to,$subject, $message)
    {
        $this->email->from($from, 'Kukkea');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }


}
