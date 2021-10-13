<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Product extends CI_Model {
        public function t(){
            $this->db->select("*");
            $this->db->from("products");
            $query = $this->db->get();
            return $query;
        }
        public function get_one_product_by_category($category){
            $this->db->select("*");
            $this->db->from("products");
            $this->db->where('category',$category);
            $query = $this->db->get();
            return $query->row();
        }
        public function get_product_by_category($category){
            $this->db->select("*");
            $this->db->from("products");
            $this->db->where('category',$category);
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_product_by_id($id){
            $this->db->select("*");
            $this->db->from("products");
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $query->row();
        }
        public function add_new_product($pname,$des,$date,$uploader,$unit,$street,$state,$price,$qty,$category){
            $this->db->query(
                "INSERT INTO products(product_name,description,created_at,uploader,unit,street,state,price,category,qty) VALUE (\"$pname\",\"$des\",\"$date\",\"$uploader\",\"$unit\",\"$street\",\"$state\",\"$price\",\"$category\",\"$qty\");"
            );
            $last_id = $this->db->insert_id();
            $this->session->set_userdata('current_product_id', $last_id);
        }

        public function upload_product_image($data) {
            //取出用户刚刚上传的product的id
            $current_product_id = $this->session->userdata('current_product_id');

            //$image_filepath = $imageNames;
            $condition = "id =" . "'" . $current_product_id . "'";
            $this->db->set('image_filepath', $data);
            $this->db->where($condition);
            $this->db->update('products');
            return TRUE;
            //$result = $this->db->insert('products', $data);
            //return $result;
        }

        public function get_product(){
            $this->db->select("*");
            $this->db->from("products");
            $query = $this->db->get();
            return $query->result_array();
        }


    }

?>