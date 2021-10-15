<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class stripeController extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $data[] = "";
        $data['total_price'] = $this->input->post('total_price');
        
        //$this->load->view('template/header');
        $this->load->view('my_stripe', $data);
        $this->load->view('template/footer');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
            
        $this->session->set_flashdata('success', 'Payment made successfully.');

        $this->load->model('cart_model');
        $this->load->model('user_model');
        $this->load->model('product');
        $user_name = $this->session->userdata('username');
        $user_data = $this->user_model->get_userinfo2($user_name);
        $user_id = $user_data['id'];

        // record the purchase
        $product = $this->cart_model->load_product($user_id);
        foreach($product as $row) {
            $this->product->add_buyer($row->product_id, $user_id);
        }
        // delete all the items in shopping cart after successful payment
        $this->cart_model->empty_cart($user_id);
             
        redirect('/my-stripe', 'refresh');
    }
}