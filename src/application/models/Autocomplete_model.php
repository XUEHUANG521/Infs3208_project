<?php

//referenced from https://www.webslesson.info/2018/07/autocomplete-search-box-using-typeahead-in-codeigniter.html
class Autocomplete_model extends CI_Model
{
    function fetch_data($query)
    {
        $this->db->like('product_name', $query);
        $query = $this->db->get('products');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $product_name = $row["product_name"];
                $description = $row["description"];
                $product_id = $row["id"];
                $url_str = "index.php/homepage/get_information?id=" . $product_id;
                $actual_url = base_url($url_str);
                $output[] = array(
                    'id' => $product_id,
                    'name' => $row["product_name"],
                    'image' => $row["image_filepath"],
                    'actual_url' => $actual_url
                );
            }
            echo json_encode($output);
        }
    }
}

?>
