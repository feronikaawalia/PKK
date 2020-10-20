<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi_model extends CI_Model {

	public function data_verifikasi()
	{
		$this->db->select('*');
		$this->db->from('verifikasi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = verifikasi.id_tenaga');
		$this->db->join('status', 'status.id_status = verifikasi.id_status');
		$query = $this->db->get ('');
		return $query->result();
	}
	
	public function data_tenaga()
	{
		$this->db->select('id_tenaga');
		$this->db->from('verifikasi');
		$query2 = $this->db->get ('')->result();
		$id = array();
		foreach($query2 as $l){
			$id[] = $l->id_tenaga;
		}
		$this->db->select('*');
		$this->db->from('verifikasi');
		$this->db->where_not_in('tenaga_kerja.id_tenaga', $id);
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = verifikasi.id_tenaga', 'right');
		$this->db->join('status', 'status.id_status = verifikasi.id_status', 'left');
		$query = $this->db->get ('');
		return $query->result();
	}

	public function tambah_verifikasi()
	{
		$config['upload_path'] = './assets/gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 1024;
		$config['overwrite'] = true;
		
		$this->load->library('upload', $config);
		$kk;
		$akta;
		$passport;
		$kesehatan;
		$pas;
		$tabungan;

		if($this->upload->do_upload('kartukeluarga'))
		{
			$kk = $this->upload;	
		};

		if($this->upload->do_upload('aktakelahiran'))
		{
			$akta = $this->upload;	
		};

		if($this->upload->do_upload('passport'))
		{
			$passport = $this->upload;	
		};

		if($this->upload->do_upload('datakesehatan'))
		{
			$kesehatan = $this->upload;	
		};

		if($this->upload->do_upload('pasfoto'))
		{
			$pas = $this->upload;	
		};

		if($this->upload->do_upload('bukutabungan'))
		{
			$tabungan = $this->upload;	
		};

		$data_verifikasi = array('id_tenaga' => $this->input->post('id_tenaga'),
					'kartukeluarga' => $kk->data('file_name'),
					'aktakelahiran' => $akta->data('file_name'),
					'passport' => $passport->data('file_name'),
					'datakesehatan' => $kesehatan->data('file_name'),
					'pasfoto' => $pas->data('file_name'),
					'bukutabungan' => $tabungan->data('file_name'),
					'id_status' => $this->input->post('id_status')
				);
				$sql_masuk=$this->db->insert('verifikasi', $data_verifikasi);
                return $sql_masuk;
	}

	public function hapus($id_verifikasi)
	{
		return $this->db->where('id_verifikasi', $id_verifikasi)->delete('verifikasi');
	}
}

