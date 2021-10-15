<br>
<br>
<br>
<br>
<br>
<br>
<?php

class Show_item extends CI_Controller
{
    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        $data['uploads'] = '';//$this->user_model->get_address($_SESSION['username']);
        $data['buys'] = '';
        $this->load->view('template/header');
        if($items = $this->user_model->get_items($_SESSION['username'])){
            $data['uploads'] = $items['uploads'];
            $data['buys'] = $items['buys'];

            $this->load->view('show_items',$data);
        }
        else{
            $this->load->view('show_items',$data);
        }

        $this->load->view('template/footer');
    }
}