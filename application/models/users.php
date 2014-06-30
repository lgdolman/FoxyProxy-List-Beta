<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Model {

    public function add_temp_user($key, $password) {
        $data = array('email' => $this -> input -> post('email'), 'password' => md5($password), 'key' => $key);

        $query = $this -> db -> insert('temp_users', $data);

        if ($query) {
            return true;
        } else {
            return false;
        };

    }

    public function is_valid_key($key) {

        $this -> db -> where('key', $key);
        $query = $this -> db -> get('temp_users');

        if ($query -> num_rows() == 1) {

            return true;

        } else {
            return false;
        }
    }

    public function add_user($key) {

        $this -> db -> where('key', $key);
        $temp_user = $this -> db -> get('temp_users');

        if ($temp_user -> num_rows() == 1) {

            $row = $temp_user -> row();

            $data = array('email' => $row -> email, 'password' => $row -> password, );

            $add_user = $this -> db -> insert('users', $data);
        }
        if ($add_user) {
            $this -> db -> where('key', $key);
            $this -> db -> delete('temp_users');
            echo "Account is now unlocked please sign in.";
            $this -> load -> view('login');

        }

    }

}
?>