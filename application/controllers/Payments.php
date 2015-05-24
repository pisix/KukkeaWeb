<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 21/07/14
 * Time: 09:55
 */

class Payments extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('Minify');

    }

    public function do_purchase(){
        $config['business'] 			= 'sylviesylvie56@gmail.com';
        $config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
        $config['return'] 				= site_url().'payments/notify_payment';
        $config['cancel_return'] 		= site_url();
        $config['notify_url'] 			= 'process_payment.php'; //IPN Post
        $config['production'] 			= FALSE; //Its false by default and will use sandbox
        //$config['discount_rate_cart'] 	= 20; //This means 20% discount
        $config["invoice"]				= random_string('numeric',8); //The invoice id

        $this->load->library('paypal',$config);

        #$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);

        $this->paypal->add('Annonce premium',10); 	  //Second item

        $this->paypal->pay();//Proccess the payment
        $data['PREMIUM']=TRUE;
        $this->annonce_model->set_annonce_to_premium($this->uri->segment(3),$data);

    }

    public function notify_payment(){
        $received_data=print_r($this->input->post(),TRUE);
        echo "<pre>".$received_data."</pre>";
       /* $data['PREMIUM']='1';
        $this->annonce_model->set_annonce_to_premium($this->uri->segment(3),array('PREMIUM'=>'1'));*/
        redirect('site');
    }
    public function cancel_paymennt(){
        redirect('site');
    }

} 