<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	public function data_admin()
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->where('id_level', 1)->get ('');
		return $query->result();
    }

    public function tambah_admin()
    {
    $data_admin = array('nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_level' => 1,
            );
            
            $sql_masuk=$this->db->insert('user', $data_admin);
            return $sql_masuk;
    }

    public function detail_admin($id_admin='')
	{
		return $this->db->where("id_user",$id_admin)->get('user')->row();
	}
	
	public function update_admin()
	{
		$dt_up_admin = array('nama_user' => $this->input->post('nama_user'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
				);
		return $this->db->where('id_user',
			   $this->input->post('id_user'))
		->update('user', $dt_up_admin);
	}
	
	public function hapus($id_user)
	{
		return $this->db->where('id_user', $id_user)->delete('user');
	}

	public function profil($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->where('id_user', $id_user)->get ('');
		return $query->result();	
	}
	public function detail_profil($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->where('id_user', $id_user)->get ('');
		return $query->row();	
	}

	public function update_profil()
	{
		$dt_up_admin = array('nama_user' => $this->input->post('nama_user'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
				);
		return $this->db->where('id_user',
			   $this->input->post('id_user'))
		->update('user', $dt_up_admin);
	}
}



