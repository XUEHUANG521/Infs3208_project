<?php
// UI Style of pages associated with this controller are referenced from https://codepen.io/armanshojaei/pen/MJmRbW

class Category_fruit extends CI_Controller
{
    public function index(){
        $this->load->model('product');
        $result =$this->product->get_product_by_category("fruit");
        $array = json_decode(json_encode($result), true);
        $data["array"] = $array;
        $this->load->view('template/header');
        $this->load->view('fruit_category',$data);
        $this->load->view('template/footer');
    }

}