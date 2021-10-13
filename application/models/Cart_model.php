<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Cart_model extends CI_Model {
        public function add_to_cart($data) {
            $product_id = $data['product_id'];
            $query = $this->db->query("SELECT product_name, category, image_filepath, price FROM products WHERE id = $product_id");
            if ($query->num_rows() >= 1) {
                $product_name = $query->row()->product_name;
                $category = $query->row()->category;
                $image_filepath = $query->row()->image_filepath;
                $price = $query->row()->price;
            }
            
            $user_id = $data['user_id'];
            
            $result = $this->db->query(
                "INSERT INTO carts(user_id, product_id, product_name, category, image_filepath, price) VALUE (\"$user_id\", \"$product_id\", \"$product_name\", \"$category\", \"$image_filepath\", \"$price\");"
            );
            //$result = $this->db->insert('carts', $data);
            return $result;
        }

        public function get_cart($data) {
            $condition = "user_id =" . "'" . $data['user_id'] . "' AND " . "product_id =" . "'" . $data['product_id'] . "'";
            $this->db->select('*');
            $this->db->from('carts');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }

        public function update_cart_increase($data) {
            $condition = "user_id =" . "'" . $data['user_id'] . "' AND " . "product_id =" . "'" . $data['product_id'] . "'";
            $this->db->set('qty', 'qty+1', FALSE);
            $this->db->where($condition);
            $this->db->update('carts');
            return true;
        }

        public function load_product($user_id) {
            $query = $this->db->query("SELECT * FROM carts WHERE user_id = $user_id");


            // $query_result[] = ' ';
            // foreach($query->result() as $row) {
            //     $query2 = $this->db->query("SELECT * FROM products WHERE id = $row->product_id");
            //     $query2->result_array();
            //     $query_result[] = $query2;
            // } 
            //return $query2->result();
            return $query->result();
        }

        public function get_total_items($user_id) {
            //$query = $this->db->query("SELECT SUM(qty) AS qty FROM carts WHERE user_id = $user_id");
            $query = $this->db->select_sum("qty")
                    ->from("carts")
                    ->where("user_id", $user_id)
                    ->get();
            
            return $query->result();
        }

        public function get_total_price($user_id) {
            $query = $this->db->query("SELECT price, qty FROM carts WHERE user_id = $user_id");
            $result = $query->result();
            $total_price = 0;
            foreach($result as $row) {
                $total_price += $row->price * $row->qty;
            } 
            return $total_price;
        }
    }
?>