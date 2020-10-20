<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_model extends CI_Model {

	public function data_transaksi()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = transaksi.id_tenaga');
		$this->db->join('user', 'user.id_user = transaksi.id_user');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara');
		$this->db->where('status_transaksi', '');
		$query = $this->db->get ('');
		return $query->result();
	}

	public function bukti_pekerja($id_user)
	{
		$this->db->select('id_transaksi, nama');
		$this->db->from('transaksi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = transaksi.id_tenaga');
		$this->db->join('user', 'user.id_user = transaksi.id_user');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara');
		$this->db->where('transaksi.id_user', $id_user);
		$query = $this->db->get ('');
		return $query->result();
	}

	public function data_riwayat_admin()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = transaksi.id_tenaga');
		$this->db->join('user', 'user.id_user = transaksi.id_user');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara');
		$this->db->where('status_transaksi !=', '');
		$query = $this->db->get ('');
		return $query->result();
	}

	public function terima($id_transaksi, $id_tenaga)
	{	$status = array('status' => 'Terima');
		$this->db->where('id_tenaga', $id_tenaga)->update('tenaga_kerja', $status);
		$terima = array('status_transaksi' => 'Terima');
		return $this->db->where('id_transaksi', $id_transaksi)->update('transaksi', $terima);
	}

	public function tolak($id_transaksi)
	{
		$tolak = array('status_transaksi' => 'Tolak');
		return $this->db->where('id_transaksi', $id_transaksi)->update('transaksi', $tolak);
	}

	public function tambah_transaksi()
	{
		$data_transaksi = array('id_user' => $this->input->post('id_user'),
		'id_tenaga' => $this->input->post('id_tenaga'),
		'status_transaksi' => '',
	);
		$sql_masuk=$this->db->insert('transaksi', $data_transaksi);
		$id_transaksi = $this->db->insert_id();
		return $sql_masuk;
	}

	public function notifikasi($id_user)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = transaksi.id_tenaga');
		$this->db->join('user', 'user.id_user = transaksi.id_user');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara');
		$this->db->where('user.id_user', $id_user);
		$this->db->where('status_transaksi', 'terima');
		$query = $this->db->get ('', 1);
		return $query->row();
	}

	public function upload_bukti()
	{
		$nama_gambar = $_FILES['bukti']['name'];
        if ($nama_gambar != "") {

            $config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = true;
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('bukti')){
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                return false;   
            }
            else{
				$upload_bukti = array('bukti' => $this->upload->data('file_name'),
				'id_transaksi' => $this->input->post('id_transaksi'),
				'bulan' => $this->input->post('bulan'), 
			);
                 return $sql_masuk=$this->db->insert('bukti', $upload_bukti);
            }
        }
	}

}

