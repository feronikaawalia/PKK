<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

    public function login($where)
    {
        $query = $this->db->join('level', 'level.id_level = user.id_level')->where($where)->get('user');
        if($this->db->affected_rows()>0){
            $data_login = $query->row();
            $data_session = array(
                'username' => $data_login->username,
                'id_user' => $data_login->id_user,
                'login' => TRUE,
                'level' => $data_login->level
            );
            $this->session->set_userdata($data_session);
            return TRUE;
        } 
        else{
            return FALSE;
        }
    }

    public function daftar()
    {
        $data_admin = array('nama_user' => $this->input->post('nama_user'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'id_level' => 2,
    );
    
    $sql_masuk=$this->db->insert('user', $data_admin);
    return $sql_masuk;
    }
}


