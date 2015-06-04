<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

    public $user = "";

    private $client_google;
    private $client_google_id;
    private $client_google_secret;
    private $redirect_google_uri;
    private $simple_google_api_key;

    public function __construct() {
        parent::__construct();
        $this->load->library('Minify');

        // Load facebook library and pass associative array which contains appId and secret key
        $this->load->library('facebook', array('appId' => '1399451620382920', 'secret' => '94aedf0b7ba871472e61d7541007c570'));

        // Get user's login information
        $this->user = $this->facebook->getUser();
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar_view');
        $this->load->view('signup_view');
        $this->load->view('includes/footer');
    }

    public function pro()
    {
        $data['pays']= $this->pays_model->read();
        $this->load->view('signup_pro',$data);
    }

    public function adduser(){
        if($this->session->userdata('login')|| $this->session->userdata('logged')){
            redirect('signup/membres');
        }
        // validation des champs du formulaire
        $this->form_validation->set_rules('civilite','Civilite','trim|required|max_length[50]|xss_clean');
        // $this->form_validation->set_rules('pseudo','Pseudo','trim|required|min_length[3]|max_length[50]|xss_clean|callback_check_pseudo');
        $this->form_validation->set_rules('nom','Nom','trim|required|min_length[3]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('prenom','Prenom','trim|required|min_length[3]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('g-recaptcha-response','Recaptcha','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|callback_check_email');
        $this->form_validation->set_rules('motdepasse','Mot de passe','trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('motdepasse2','Mot de passe','trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('telephone','Téléphone','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('indicatiftelephonique','Indicatif téléphonique','trim|required|numeric|xss_clean');
        // $this->form_validation->set_rules('pays','Pays de résidence','trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('villederesidence','Ville de résidence','trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('codepostal','Code postal','trim|min_length[5]|numeric|xss_clean');
        $this->form_validation->set_rules('adresse','Code postal','trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('agree','Condition d\'utilisation','trim|xss_clean');
        $this->form_validation->set_rules('date','Date de naissance','trim|xss_clean|callback_validate_age');
        //   $this->form_validation->set_rules('paysorigine','Pays d\'origine','trim|required|min_length[3]|xss_clean');
        //  $this->form_validation->set_rules('villeorigine','Ville d\'origine','trim|required|min_length[3]|xss_clean');
        //  $this->form_validation->set_rules('quartierorigine','Quartier d\'origine','trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('photo','Photo','');
        //Configuration de propriétés des images uploader
        $config['upload_path'] ='./images/';
        $config['allowed_types']='gif|jpg|jpeg|png';
        $config['max_size']='100000';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        //Creation de l'utilisateur
        if($this->input->server('REQUEST_METHOD') === 'POST'){
                if($this->form_validation->run()){
                    /*$g_recaptcha_response=trim($this->input->post('g-recaptcha-response'));
                    log_message('info',"g-recaptcha-response: ".$g_recaptcha_response);
                    if($this->getResponse($g_recaptcha_response)){*/
                        $data['test']='form_validation';
                        $villederesidence=$this->input->post('villederesidence');
                        $paysderesidence='';
                        if (strpos($this->input->post('villederesidence'),',') !== false) {
                            $villeresidenceInfo = explode(",", $this->input->post('villederesidence'), 2);
                            $villederesidence = $villeresidenceInfo[0];
                            $paysderesidence=$villeresidenceInfo[1];
                        }
                        log_message('info',"Numero de téléphone ".ltrim($this->input->post('indicatiftelephonique'),'0').ltrim($this->input->post('telephone'), '0'));
                        $dataUser=array(
                            'CIVILITEUSER'=>$this->input->post('civilite'),
                            'PSEUDOUSER'=>$this->input->post('pseudo'),
                            'NOMUSER'=>$this->input->post('nom'),
                            'PRENOMUSER'=>$this->input->post('prenom'),
                            'MOTDEPASSEUSER'=>md5($this->input->post('motdepasse')),
                            'EMAILUSER'=>$this->input->post('email'),
                            'VILLEUSER'=>$villederesidence,
                            'PAYSUSER'=>$paysderesidence,
                            'ADRESSEUSER'=>$this->input->post('adresse'),
                            'CODEPOSTALUSER'=>$this->input->post('codepostal'),
                            'VILLEORIGUSER'=>$this->input->post('villeorigine'),
                            'PAYSORIGUSER'=>$this->input->post('paysorigine'),
                            'QUARTIERORIGUSER'=>$this->input->post('quartierorigine'),
                            'TELUSER'=>ltrim($this->input->post('indicatiftelephonique'),'0').ltrim($this->input->post('telephone'), '0'),
                            'DATENAISSANCEUSER'=>date('Y-m-d',strtotime($this->input->post('date'))),
                            'DATEINSCRIPTION'=>date('Y-m-d H:i:s', now()),
                            'DIFFUSIONPARTENAIRE'=>$this->input->post('agreepartenaire'),
                            'TYPE_UTILISATEUR'=>'PART',
                            'VISUNUMEROTEL'=>'1',
                        );
                        $data['test']='les photo now';
                        //Traitement photo/image uploader par l'utilisateur
                        try
                        {
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
                                try{
                                    //Inscription de l'utilisateur
                                    $this->utilisateur_model->adduser($dataUser,$dataP);
                                    //Generation d'un chaine de caractere pour le lien d'activation du compte par mail
                                    $confirm_inscription_by_mail= random_string('alnum', 12);
                                    //Generation d'une serie de chiffre pour l'activation par courrier
                                    //$code_confirm_inscription_by_courrier = str_pad(rand(0, 9999), 6, '0', STR_PAD_LEFT);
                                    /* $code_confirm_inscription_by_courrier = substr(number_format(time() * rand(),0,'',''),0,6);
                                     $dataconfirmcourier['codeactivation']=$code_confirm_inscription_by_courrier;
                                     $dataconfirmcourier['nom']=$this->input->post('nom');
                                     $dataconfirmcourier['prenom']=$this->input->post('prenom');
                                     $dataconfirmcourier['adresse']=$this->input->post('adresse');
                                     $dataconfirmcourier['ville']=$this->input->post('ville');
                                     $dataconfirmcourier['civilite']=$this->input->post('civilite');
                                     $dataconfirmcourier['codepostale']=$this->input->post('codepostal');
                                     $datestring = "%d  %m %Y";
                                     $dataconfirmcourier['date']=mdate($datestring, time());
                                     $html = $this->load->view('courrier', $dataconfirmcourier, true);
                                     pdf_create($html, $this->input->post('nom').'_'.$this->input->post('prenom'), false);*/
                                    //Insertion des  chaine de caracteres genere dans  les champ 'CONFIRMINSCRIPTION' et 'CONFIRINSCRIPTIONCOURIER de la table utilisateur
                                    $data = array(
                                        'CONFIRMINSCRIPTIONEMAIL' => $confirm_inscription_by_mail,
                                        'CONFIRMINSCRIPTIONCOURRIER'=>''
                                    );
                                    $this->utilisateur_model->set_confirm_inscription($this->input->post('email'),$data);
                                    //Envoi de l'email pour confirmation compte
                                    $data_mail['nom']=$this->input->post("nom");
                                    $data_mail['prenom']=$this->input->post("prenom");
                                    $data_mail['confirm_inscription_by_mail']=$confirm_inscription_by_mail;
                                    $data_mail['email']=$this->input->post("email");
                                    $data_mail['motdepasse']=$this->input->post("motdepasse");
                                    $this->send_mail('support@kukkea.com',$this->input->post('email'),'Activation compte sur kukkea.com',$this->load->view('email/activate_account_email',$data_mail,true));
                                    $data['success']='Inscription réussie!.';
                                    $data['titre']='Inscription';
                                    $this->load->view('includes/header',$data);
                                    $this->load->view('includes/navbar_view',$data);
                                    $this->load->view('signup_view',$data);
                                    $this->load->view('includes/footer');
                                }catch(mysqli_sql_exception $e)
                                {
                                    log_message('info','L\'erreur ' +$e+ ' est survenue');
                                    $this->session->set_flashdata('erreurdatabase', 'Une erreur est survenue lors de votre inscription');
                                    redirect('signup');
                                }
                            }else
                            {
                                $data['titre']='Inscription';
                                $data['error']='probleme de photo';
                                $data['error_upload']=$this->upload->display_errors('','');
                                /*$data['pays']= $this->pays_model->read();*/
                                $this->load->view('includes/header',$data);
                                $this->load->view('includes/navbar_view',$data);
                                $this->load->view('signup_view',$data);
                                $this->load->view('includes/footer');
                            }
                        }
                        catch (Exception $e){
                            log_message('info','L\'erreur ' +$e+ ' est survenue');
                            $this->session->set_flashdata('erreurinscription', 'Une erreur est survenue lors de votre inscription');
                            redirect('signup');
                        }
                    }
                  /* else
                        {
                            $data['erreurcaptcha']='Nous ne parvenons pas à verifier votre identité. Assurez-vous d\'avoir coché le captcha en fin de formulaire';
                            $this->load->view('includes/header',$data);
                            $this->load->view('includes/navbar_view',$data);
                            $this->load->view('signup_view',$data);
                            $this->load->view('includes/footer');
                        }
                }*/
                else
                {
                    $data['titre']='Inscription';
                    $data['error_upload']=$this->upload->display_errors('','');
                    /*$data['pays']= $this->pays_model->read();*/
                    $data['error']='Verifier les champs du formulaire';
                    $this->load->view('includes/header',$data);
                    $this->load->view('includes/navbar_view',$data);
                    $this->load->view('signup_view',$data);
                    $this->load->view('includes/footer');
            }
        }
        else{
            /*$data['pays']= $this->pays_model->read();*/
            $this->load->view('includes/header');
            $this->load->view('includes/navbar_view');
            $this->load->view('signup_view');
            $this->load->view('includes/footer');
        }
    }

    public function adduser_pro()

    {
        /* if($this->session->userdata('nomuser')|| $this->session->userdata('logged') )
         {
             redirect('signup/membres');
         }*/

        // validation des champs du formulaire

        $this->form_validation->set_rules('civilite','Civilite','trim|required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('societe','Societe','trim|required|min_length[3]|is_unique[utilisateur.PSEUDOUSER]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('siren','Numéro SIREN','trim|required|min_length[9]|is_unique[utilisateur.SIREN]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('nom','Nom','trim|required|min_length[3]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('prenom','Prénom','trim|required|min_length[3]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|callback_check_email');
        $this->form_validation->set_rules('motdepasse','Mot de passe','trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('telephone','Téléphone','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('pays','Pays','trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('ville','Ville','trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('codepostal','Code postal','trim|required|min_length[5]|numeric|xss_clean');
        $this->form_validation->set_rules('logo','Logo','');
        $this->form_validation->set_rules('captcha', "Captcha", 'required');


        /* Get the user's entered captcha value from the form */
        $userCaptcha = set_value('captcha');

        /* Get the actual captcha value that we stored in the session (see below) */
        $word = $this->session->userdata('captchaWord');

        $config['upload_path'] ='./images/';
        $config['allowed_types']='gif|jpg|jpeg|png';
        $config['max_size']='100000';
        $config['encrypt_name']=true;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);



        //Creation de l'utilisateur pro

        if($this->form_validation->run() OR $this->upload->do_upload('photo'))
        {
            if($this->check_email())
            {

                $data['test']='form_validation';
                $dataUserPro=array(
                    'CIVILITEUSER'=>$this->input->post('civilite'),
                    'PSEUDOUSER'=>$this->input->post('societe'),
                    'SIREN'=>$this->input->post('siren'),
                    'NOMUSER'=>$this->input->post('nom'),
                    'PRENOMUSER'=>$this->input->post('prenom'),
                    'MOTDEPASSEUSER'=>md5($this->input->post('motdepasse')),
                    'EMAILUSER'=>$this->input->post('email'),
                    'VILLEUSER'=>$this->input->post('ville'),
                    'PAYSUSER'=>$this->input->post('pays'),
                    'ADRESSEUSER'=>$this->input->post('adresse'),
                    'CODEPOSTALUSER'=>$this->input->post('codepostal'),
                    'TELUSER'=>$this->input->post('telephone'),
                    'DATEINSCRIPTION'=>date('Y-m-d H:i:s', now()),
                    'TYPE_UTILISATEUR'=>'PRO'
                );

                if($this->upload->do_upload('logo'))
                {
                    $logo_data=$this->upload->data();
                    $config=array(
                        'image_library'=>'GD2',
                        'source_image'=>$logo_data['full_path'],
                        'new_image'=>'./images/thumbs/',
                        'create_thumb'=>true,
                        'thumb_marker'=>'',
                        'maintain_ratio'=>false,
                        'width'=>150,
                        'height'=>150
                    );

                    $this->load->library('image_lib',$config);

                    $this->image_lib->resize();

                    $logo_name=$logo_data['file_name'];
                    $dataL=array(
                        'CHEMINPHOTO'=>$logo_name,
                    );


                    $this->utilisateur_model->adduser_pro($dataUserPro,$dataL);

                    $this->email->from('kukkea@kukkea.com', 'Kukkea.com');
                    $this->email->to($this->input->post('email'));

                    $this->email->subject('Inscription');
                    $this->email->message('<h4>Bienvenue!</h4>
                            <p>Vous êtes maintenant membre du site, <br/>
                            Votre login est : <b>'.$this->input->post('email').'
                            Votre mot de passe est : <b>'.$this->input->post('motdepasse').'</b></p>');

                    $this->email->send();

                    $data['success']='Inscription réussie';
                    $data['titre']='Inscription';
                    $data['pays']= $this->pays_model->read();
                    $this->load->view('signup_pro',$data);
                }
                else
                {

                    $data['pays']= $this->pays_model->read();
                    $data['error']='Erreur photo';
                    $data['error_upload']=$this->upload->display_errors('','');
                    $this->load->view('signup_pro',$data);

                }

            }
            else
            {
                $data['titre']='Inscription';
                $data['error_upload']=$this->upload->display_errors('','');
                $data['error']='Soit votre Adresse mail déjà utilisée soit votre pseudo est déjà pris';
                $data['pays']= $this->pays_model->read();
                $this->load->view('signup_pro',$data);

            }


        }
        else
        {
            $data['titre']='Inscription';
            $data['pays']= $this->pays_model->read();
            $data['error']='Verifier les champs du formulaire';
            $this->load->view('signup_pro',$data);

        }
    }

    function google()
    {
        $this->client_google = new Google_Client();
        $this->client_google->setApplicationName("Kukkea");
        $this->client_google->setClientId($this->client_google_id);
        $this->client_google->setClientSecret($this->client_google_secret);
        $this->client_google->setRedirectUri($this->redirect_google_uri);
        $this->client_google->setDeveloperKey($this->simple_google_api_key);
        $this->client_google->setAccessType('online');
        $this->client_google->addScope("https://www.googleapis.com/auth/plus.login");

        // Add Access Token to Session
        if (isset($_GET['code'])) {
            echo "dans le getcode";
            $this->client_google->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client_google->getAccessToken();
            header('Location: ' . filter_var($this->redirect_google_uri, FILTER_SANITIZE_URL));
            echo "sort du getcode";
        }

        // Set Access Token to make Request
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client_google->setAccessToken($_SESSION['access_token']);
        }

        // Get User Data from Google and store them in $data
        if ($this->client_google->getAccessToken()) {
            echo $this->client_google->getAccessToken();
            $objOAuthService = new Google_Service_Oauth2($this->client_google);

            $userData = $objOAuthService->userinfo->get();
            $email =$objOAuthService->userinfo->get()->email;
            print($email);
            echo $email;
            $data['userData'] = $userData;
            //$_SESSION['access_token'] = $client->getAccessToken();
        }
    }


    //fonction de callback pour checker l'email

    function check_email()
    {
        if($this->input->post('email'))
        {
            $this->db->select('NUMUSER');
            $this->db->from('utilisateur');
            $this->db->where('EMAILUSER',$this->input->post('email'));
            if($this->db->count_all_results()>0)
            {
                $this->form_validation->set_message('check_email','Cet email est déjà utilisé');
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    function check_pseudo()
    {
        if($this->input->post('pseudo'))
        {
            $this->db->select('NUMUSER');
            $this->db->from('utilisateur');
            $this->db->where('PSEUDOUSER',$this->input->post('pseudo'));
            if($this->db->count_all_results()>0)
            {
                $this->form_validation->set_message('check_pseudo','Ce pseudo est déjà utilisé');
                return false;
            }
            else
            {
                return true;
            }
        }
    }


    /* function check_email_pro()
     {
         if($this->input->post('email'))
         {
             $this->db->select('NUMUSERPRO');
             $this->db->from('utilisateur');
             $this->db->where('EMAILUSERPRO',$this->input->post('email'));
             if($this->db->count_all_results()>0)
             {
                 $this->form_validation->set_message('check_email','Cet email est déjà utilisé');
                 return false;
             }
             else
             {
                 return true;
             }
         }
     }*/


    # the callback method that does the 'merge'

    public function check_photo_error($str)
    {
        #unused $str

        if(isset($data['error_upload']))
        {
            $this->form_validation->set_message('check_photo_error', $data['error_upload']);
            return FALSE;
        }
        return TRUE;
    }

    // Captcha validation callback used in form validation
    public function captcha_validate($code) {
        // user considered human if they previously solved the Captcha...
        $isHuman = $this->botdetectcaptcha->IsSolved;
        if (!$isHuman) {
            // ...or if they solved the current Captcha
            $isHuman = $this->botdetectcaptcha->Validate($code);
        }

        // set error if Captcha validation failed
        if (!$isHuman) {
            $this->form_validation->set_message('captcha_validate', 'Please retype
        the characters from the image correctly.');
        }

        return $isHuman;
    }

    function confirmation()
    {
        $email=$this->session->userdata('login');
        $idUser=$this->utilisateur_model->get_id_user_by_email($email);
        $data['number_annonce']=$this->annonce_model->get_number_annonce_user_by_id($idUser);
        $data['user_info']=$this->utilisateur_model->get_user_info_by_id($idUser);
        $data['iduser']=encryptor('encrypt', $idUser);

        if($this->signup_model->check_confirm_inscription_phone($email)){
            $data['statut_confirm_by_phone']='true';
        }else{
            $data['statut_confirm_by_phone']='false';
        }

        $this->load->view('includes/header');
        $this->load->view('includes/navbar_view',$data);
        $this->load->view('code_confirmation',$data);
        $this->load->view('includes/footer');
    }

    public function send_mail($from,$to,$subject, $message)
    {

        $this->email->from($from, 'Kukkea');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }


    function send_sms_membre($numero_telephone,$numuser)
    {
        //Code verification num tel
        $code = rand(1000, 9999); // random 4 digit code

        $this->data = array(
            'VERIFNUMTEL'=>$code
        );

        $where=$this->db->where('NUMUSER', encryptor('decrypt',$numuser));


        $where->update('utilisateur',$this->data);

        // set response format: xml or json, default json
        $this->nexmo->set_format('json');


        $from = 'KUKKEA';
        $to = $numero_telephone;
        $message = array(
            'text'=>'Votre code de vérification sur Kukkea est: ' . $code,
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo json_encode(array('response' => $response));

    }


    function getResponse($str)
    {
        try
        {
            $secret_key="6LdzrwQTAAAAAMy1gocBI97PNfEL9R71X1PAygGX";
            $ip_user=$this->input->ip_address();
            $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$str."&remoteip=".$ip_user;
            $user_agent= $this->agent->browser().' '.$this->agent->version();

            log_message("info","User agent ".$user_agent);
            log_message("info","User ip address  ".$ip_user);
            log_message("info","Url Captcha  ".$url);



            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERAGENT,$user_agent);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $data = curl_exec($ch);
            curl_close($ch);
            $status= json_decode($data,true);
            log_message("info","Recaptcha ".$status['success']);

            if($status['success'])
            {
                log_message("info","Recaptcha ".$status['success']);
                return true;
            }
            else
            {
                log_message("info","Recaptcha Failed".$status['success']);
                $this->session->set_flashdata('captchaerror', 'Nous ne parvenons pas à verifier votre identité. Reprennez le processus d\'inscriptipn et assurez-vous d\'avoir coché le captcha en fin de formulaire. Merci!');
                redirect('signup');
                //return false;
            }
        }
        catch(Google_Exception $ge)
        {
            log_message("info","l'erreur ".$ge." est survenue");
            $this->session->set_flashdata('erreurcaptcha', 'Une erreur est survenue durant la verification de votre identité. \n Veuillez reprendre le processus d\'inscription en vous assurant que vous couchez bien le captcha en fin de formulaire');
            redirect('signup');

        }

    }

    public function validate_age($birthday)
    {
        $age = 18;
        // $birthday can be UNIX_TIMESTAMP or just a string-date.
        if(is_string($birthday)) {
            $birthday = strtotime($birthday);
        }

        // check
        // 31536000 is the number of seconds in a 365 days year.
        if(time() - $birthday < $age * 31536000)  {
            return false;
        }

        return true;
    }

}
