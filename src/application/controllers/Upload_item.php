<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_item extends CI_Controller {
    public function index() {

        $this->load->helper('url');

        $data['error']= "";
        $data['username_or_email'] = "";
        $data['password'] = "";
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('template/header');
            $this->load->view('login', $data);
            $this->load->view('template/footer');
        } else {
            //$this->load->view('template/header');
            $this->load->view('product_upload');
            $this->load->view('template/footer');
        }
        
    }
    public function test(){
        $this->load->model('product');
        $result = $this->product->t();
        //$array = json_decode(json_encode($result), true);
        foreach ($result as $arr) {
            print_r($arr);
        }
        
    }
    public function upload(){
        $this->load->model('product');
        //todo 等user的数据库出来传入参数应为user id
        $this->load->model('user_model');
        $user_name = $this->session->userdata('username');
        $user_data = $this->user_model->get_userinfo2($user_name);
        $uploader = $user_data['id'];
        $pname = $this->input->post("pname");
        $des = $this->input->post("des");
        $unit = $this->input->post("unit");
        $street = $this->input->post("street");
        $price = $this->input->post("price");
        $state = $this->input->post("state");
        $qty = $this->input->post("qty");
        $category = $this->input->post("category");
        $format = 'Y-m-d H:i:s';
        $date = date($format);
        $this->product->add_new_product($pname,$des,$date,$uploader,$unit,$street,$state,$price,$qty,$category);

        //提交文字信息后，自动跳转到提交图片信息界面
        //$data1['image_path'] = "";
        $this->load->view('template/upload_image_header');
        $this->load->view('product_upload_image');
        $this->load->view('template/footer');

    }

    public function upload_product_image() {
        $this->load->model('product');

        $uploadImgData = array(); 
        $imageNames = '';
        $imageCount = count($_FILES['image_name']['name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $_FILES['file']['name'] = $_FILES['image_name']['name'][$i];
            $_FILES['file']['type'] = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size'] = $_FILES['image_name']['size'][$i];

            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "jpg|png|jpeg",
                // //'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "7680",
                'max_width' => "10240"
            );
    
    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $uploadImgData[$i]['image_name'] = $_FILES['file']['name'];
                $imageNames = $imageNames.";".$uploadImgData[$i]['image_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());//获取错误信息
                print_r($error);//打印错误信息
                echo $this->upload->display_errors();
            }
        }
        
        echo json_encode($uploadImgData);

        //$data = array('image_filepath' => $imageNames);
        $this->product->upload_product_image($imageNames);

        // $data1['image_path'] = $imageNames;
        // $this->load->view('template/header');
        // $this->load->view('product_upload_image', $data1);
        // $this->load->view('template/footer');

    }
}

