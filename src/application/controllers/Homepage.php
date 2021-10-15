<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    public function index(){
            $this->load->model('product');
            $result =$this->product->get_product();
            $array = json_decode(json_encode($result), true);
            $data["fruit"] = json_decode(json_encode($this->product->get_one_product_by_category('fruit')), true);
            $data["vegetable"] = json_decode(json_encode($this->product->get_one_product_by_category('vegetable')), true);
            $data["processed_food"] = json_decode(json_encode($this->product->get_one_product_by_category('processed_food')), true);
            $data["snacks"] = json_decode(json_encode($this->product->get_one_product_by_category('snacks')), true);
            $fruit = explode(";", $this->product->get_one_product_by_category('fruit')->image_filepath);
            if (count($fruit) > 1) {
                $data["fruit_path"] = $fruit[1];
            } else {
                $data["fruit_path"] = "aaa.png";
            }
            $vegetable = explode(";", $this->product->get_one_product_by_category('vegetable')->image_filepath);
            if (count($vegetable) > 1) {
                $data["vegetable_path"] = $vegetable[1];
            } else {
                $data["vegetable_path"] = "aaa.png";
            }
            $processed_food = explode(";", $this->product->get_one_product_by_category('processed_food')->image_filepath);
            if (count($processed_food) > 1) {
                $data["processed_food_path"] = $processed_food[1];
            } else {
                $data["processed_food_path"] = "aaa.png";
            }
            $snacks = explode(";", $this->product->get_one_product_by_category('snacks')->image_filepath);
            if (count($snacks) > 1) {
                $data["snacks_path"] = $snacks[1];
            } else {
                $data["snacks_path"] = "aaa.png";
            }
            $this->load->view('template/header');
            $this->load->view('homepage',$data);
            $this->load->view('template/footer');
    }
    public function post_information(){
        $id = $this->input->post('id');
        $this->load->model('product');
        $data["product_name"] = $this->product->get_product_by_id($id)->product_name;
        $data["description"] = $this->product->get_product_by_id($id)->description;
        $path = explode(";", $this->product->get_product_by_id($id)->image_filepath);
        if (count($path) > 1) {
            $data["path"] = $path[1];
        } else {
            $data["path"] = "aaa.png";
        }
        $data["id"] = $this->input->post('id');
        $data["allimage"] = $this->product->get_product_by_id($id)->image_filepath;
        $data["price"] = $this->product->get_product_by_id($id)->price;
        $this->load->view('template/header');
        $this->load->view('product_detail',$data);
        $this->load->view('template/footer');
        if(isset($_SESSION['viewed_products'])){
            $session_arr=$_SESSION['viewed_products'];
            $this->session->unset_userdata("viewed_products");
            array_push($session_arr,$data);
            $this->session->set_userdata('viewed_products',$session_arr);
        }
    }
    public function get_information(){
        $id = $this->input->get('id');
        $this->load->model('product');
        $data["product_name"] = $this->product->get_product_by_id($id)->product_name;
        $data["description"] = $this->product->get_product_by_id($id)->description;
        $path = explode(";", $this->product->get_product_by_id($id)->image_filepath);
        if (count($path) > 1) {
            $data["path"] = $path[1];
        } else {
            $data["path"] = "aaa.png";
        }
        $data["id"] = $id;
        $data["allimage"] = $this->product->get_product_by_id($id)->image_filepath;
        $data["price"] = $this->product->get_product_by_id($id)->price;
        $this->load->view('template/header');
        $this->load->view('product_detail',$data);
        $this->load->view('template/footer');
        if(isset($_SESSION['viewed_products'])){
            $session_arr=$_SESSION['viewed_products'];
            $this->session->unset_userdata("viewed_products");
            array_push($session_arr,$data);
            $this->session->set_userdata('viewed_products',$session_arr);
        }
    }
    function fetch()
    {
        $this->load->model('autocomplete_model');
        echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
    }
    public function test($id){
        $this->load->model('product');
        $imgs = explode(";", $this->product->get_product_by_id($id)->image_filepath);
        if (count($imgs) > 1) {
            $filepath = $imgs[1];
        } else {
            $filepath = "aaa.png";
        }
        echo $filepath;
    }
    
    
}