<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    public function index() {
        $data['error']= "";
        $data['username_or_email'] = "";
        $data['password'] = "";
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('template/header');
            $this->load->view('login', $data);
            $this->load->view('template/footer');
        } else {
            $this->load->model('cart_model');
            $this->load->model('user_model');
            $user_name = $this->session->userdata('username');
            $user_data = $this->user_model->get_userinfo2($user_name);
            $user_id = $user_data['id'];
            $data['product'] = $this->cart_model->load_product($user_id);
            $data['item_qty'] = $this->cart_model->get_total_items($user_id);
            $data['total_price'] = $this->cart_model->get_total_price($user_id);
            $this->load->view('template/header');
            $this->load->view('shopping_cart', $data);
            //$this->load->view('template/footer');
        }
    }

    public function increase_qty() {
        $this->load->model('cart_model');
        $this->load->model('user_model');
        $user_name = $this->session->userdata('username');
        $user_data = $this->user_model->get_userinfo2($user_name);
    }

    public function add_to_cart() {
        $data['error']= "";
        $data['username_or_email'] = "";
        $data['password'] = "";
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('template/header');
            $this->load->view('login', $data);
            $this->load->view('template/footer');
        } else {
            $this->load->model('cart_model');
            $this->load->model('user_model');
            $user_name = $this->session->userdata('username');
            $user_data = $this->user_model->get_userinfo2($user_name);
            $product_id = $this->input->post('product_id');
            $cart_data = array(
                'user_id' => $user_data['id'],
                //'user_id' => $user_data[0]['id'],
                'product_id' => $product_id
            );

        
            if (!$this->cart_model->get_cart($cart_data)) {
                $this->cart_model->add_to_cart($cart_data);
            } else {
                $this->cart_model->update_cart_increase($cart_data);
            }
            redirect('cart');
        }
    }

    
}
?>