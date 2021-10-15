<?php
defined('BASEPATH') or exit('No direct script access allowed');

//referenced from https://www.webslesson.info/2018/07/autocomplete-search-box-using-typeahead-in-codeigniter.html
class Autocomplete extends CI_Controller
{

    function index()
    {
        $this->load->view('autocomplete_view');
        $this->load->view('template/footer');
    }

    function fetch()
    {
        $this->load->model('autocomplete_model');
        echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
    }
}

?>
