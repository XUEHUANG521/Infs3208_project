<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{

    public function register(){

        $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $data = array(
            'username'  => $username,
            'email'     => $email,
            'password'  => $enc_password,
            'user_img_path' => '/foodmoji_default_user_icon.jpg'
        );
        $sql = "select * from users where username = '$username' or email = '$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) { //如果数据库里有相同的username或email，就返回false
            return false;
        }
        else{
            $this->db->insert('users', $data); //将$data中的键值对插入数据库
            return true;
        }
    }

    public function login($username_or_email, $password){
        $sql = "SELECT * FROM users where username = '$username_or_email' or email = '$username_or_email'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $user = $query->result();
            //$user: 里面的值长这样：Array ( [0] => stdClass Object ( [id] => 4 [username] => test3
            // [password] => $2y$10$FyVX8dBUGzRSiEdExvkXROeV7ClkM3tKdWVtx/jf44lOa6e3JBx1a [email] => haha@gmail.com
            // [emotion] => [email_verification_key] => 0 [email_vertified] => [date_created] => 2021-09-20 00:36:19 ) )
            //password_verify:系统自带方法，解码数据库存储的密码后与用户输入的密码进行比较
            if(password_verify($password, $user[0]->password)){
                return $user;
            }
        }
        return false;
    }

    //在用户重置密码的时候，检查用户输入的邮箱在数据库里是否存在
    public function check_email($email){
        $sql = "select * from users where email='$email'";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function reset_password($email,$password){
        $sql = "update users set password='$password' where email='$email'";
        $this->db->query($sql);
    }

    public function get_userinfo($username){
        $this->db->where('username',$username);
        $result =$this->db->get('users');
        if($result->num_rows() == 1){
            return $result->result_array();
        }
        else{
            return false;
        }
    }

    public function get_userinfo2($username){
        $this->db->where('username',$username);
        $result =$this->db->get('users');
        if($result->num_rows() == 1){
            return $result->row_array();
        }
        else{
            return false;
        }
    }

    public function update_userinfo($username){
        $sql = "select id from users where username = '$username'";
        $result = $this->db->query($sql);

        //我在本地数据库把id改为主键，自增的了，所以用户如果想要修改username或email,可以通过id确定被修改的数据行
        $id = $result->result_array()[0]['id'];//获得username在数据库中对应的id

        //获得用户想要修改的值，表单中默认是原有的username和email
        $username = $this->input->post('username');
        $email = $this->input->post('email');

        //确定用户想要修改的username或email在数据库中不存在
        $sql = "select * from users where id != '$id' and username = '$username' or id != '$id' and email = '$email'";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0){
            return false;
        }

        //修改数据库中的内容，并将_SESSION中的username更新
        else{
            $sql = "update users set username = '$username', email = '$email' where id = '$id'";
            $this->db->query($sql);
            $_SESSION['username'] = $username;

            return true;
        }
    }

// upload icon
    public function upload_icon($path, $username)
    {
        $condition = "username =" . "'" . $username . "'";
        $this->db->set('user_img_path', $path);
        $this->db->where($condition);
        $this->db->update('users');
    }

    public function get_icon($username)
    {
        $this->db->where('username', $username);
        $data = $this->db->get('users');
        return $data->result_array();
    }

    public function get_address($username){
        $username = $_SESSION['username'];
        $sql = "select id from users where username = '$username'";
        $result = $this->db->query($sql);
        $id = $result->result_array()[0]['id'];
        $this->db->where('userid',$id);
        $result = $this -> db -> get('address');
        if($result->num_rows() > 0){
            return $result -> result_array();
        }
        else{
            return false;
        }
    }

    public function get_address_by_id($id){
        $this->db->select("*");
        $this->db->from("address");
        $this->db->where('address_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_address(){
        $username = $_SESSION['username'];
        $sql = "select id from users where username = '$username'";
        $result = $this->db->query($sql);
        $id = $result->result_array()[0]['id'];

        $line1 = $this->input->post('line1');
        $line2 = $this->input->post('line2');
        $suburb = $this->input->post('suburb');
        $postcode = $this->input->post('postcode');
        $state = $this->input->post('state');
        $receiver = $this->input->post('receiver');
        $phone_number = $this->input->post('phone_number');
        $userid = $id;
        $data = array(
            'userid' => $userid,
            'receiver' => $receiver,
            'phone_number' => $phone_number,
            'state' => $state,
            'suburb' => $suburb,
            'postcode' => $postcode,
            'address1' => $line1,
            'address2' => $line2,
        );
        $sql = "select * from address where userid = '$userid' and receiver = '$receiver' and phone_number = '$phone_number'and state = '$state' and suburb = '$suburb' and postcode = '$postcode' and address1 = '$line1' and address2 = '$line2'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) { //如果数据库里有相同的username或email，就返回false
            return false;
        }
        else{
            $this->db->insert('address', $data); //将$data中的键值对插入数据库
            return true;
        }
    }

    public function update_address($address_id){
        $line1 = $this->input->post('line1');
        $line2 = $this->input->post('line2');
        $suburb = $this->input->post('suburb');
        $postcode = $this->input->post('postcode');
        $state = $this->input->post('state');
        $receiver = $this->input->post('receiver');
        $phone_number = $this->input->post('phone_number');
        $sql = "select * from address where address_id = '$address_id' and receiver = '$receiver' and phone_number = '$phone_number'and state = '$state' and suburb = '$suburb' and postcode = '$postcode' and address1 = '$line1' and address2 = '$line2'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) { //如果数据库里有相同的username或email，就返回false
            return false;
        }
        else{
            $sql = "update address set receiver = '$receiver', 
                   phone_number = '$phone_number',
                   state = '$state',
                   suburb = '$suburb',
                   postcode = '$postcode',
                   address1 = '$line1',
                   address2 = '$line2' where address_id = '$address_id'";
            $this->db->query($sql);
            //将$data中的键值对插入数据库
            return true;
        }
    }

    public function get_items($username){
        $sql = "select id from users where username = '$username'";
        $result = $this->db->query($sql);
        $id = $result->result_array()[0]['id'];//获得username在数据库中对应的id

        $this->db->where('uploader',$id);
        $upload = $this -> db -> get('products');
        $this->db->where('buyer',$id);
        $buy = $this -> db -> get('products');
        if($buy->num_rows() == 0 and $upload->num_rows() == 0){
            return false;
        }
        else{
            return array(
                'uploads' => $upload->result_array(),
                'buys' => $buy->result_array()
            );
        }
    }
}
?>
