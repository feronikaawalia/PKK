<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenagakerja_model extends CI_Model {

	public function data_tenaga()
	{
		$this->db->select('*');
		$this->db->from('tenaga_kerja');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara');
		$query = $this->db->get ('');
		return $query->result();
	}

	public function data_tenaga_majikan($opsi)
	{
		$this->db->select('*');
		$this->db->from('verifikasi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = verifikasi.id_tenaga', 'left');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara', 'left');
		$this->db->where('nama_negara', $opsi);
		$this->db->where('status', '');
		$query = $this->db->get ('');
		return $query->result();
	}

	public function data_tenaga_semua() //menampilkan dashboard data yang di tenaga kerja(majikan)
	{
		$this->db->select('*');
		$this->db->from('verifikasi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = verifikasi.id_tenaga');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara');
		$this->db->where('status', '');
		$query = $this->db->get ('');
		return $query->result();
	}

	public function data_negara()
	{
		$this->db->select('*');
		$this->db->from('negara');
		$query = $this->db->get ('');
		return $query->result();
	}
	
	public function tambah_tenaga()
	{
		$data_tenaga_kerja = array('nama' => $this->input->post('nama'),
		'kota_lahir' => $this->input->post('kota_lahir'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		'alamat' => $this->input->post('alamat'),
		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		'nohp' => $this->input->post('nohp'),
		'pendidikan' => $this->input->post('pendidikan'),
		'status_tenaga' => $this->input->post('status_tenaga'),
		'id_negara' => $this->input->post('id_negara'),
		'status' => ''
	);
	$sql_masuk=$this->db->insert('tenaga_kerja', $data_tenaga_kerja);
                return $sql_masuk;
	}

	public function detail_tenaga_kerja($id_tenaga='')
	{
		return $this->db->where("id_tenaga",$id_tenaga)->get('tenaga_kerja')->row();
	}
	
	public function update_tenagakerja()
	{
		$dt_up_tenaga_kerja = array('nama' => $this->input->post('nama'),
		'kota_lahir' => $this->input->post('kota_lahir'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		'alamat' => $this->input->post('alamat'),
		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		'nohp' => $this->input->post('nohp'),
		'pendidikan' => $this->input->post('pendidikan'),
		'status_tenaga' => $this->input->post('status_tenaga'),
		'id_negara' => $this->input->post('id_negara'),
	);
		return $this->db->where('id_tenaga',
			   $this->input->post('id_tenaga'))
		->update('tenaga_kerja', $dt_up_tenaga_kerja);
	}
	
	public function hapus($id_tenaga)
	{
		return $this->db->where('id_tenaga', $id_tenaga)->delete('tenaga_kerja');
	}
	
	public function get_detail($id_tenaga)//menampilkan get detail yang di pop-up tenagakerja(majikan)
	{
		$this->db->select('*');
		$this->db->from('verifikasi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = verifikasi.id_tenaga', 'left');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara', 'left');
		$this->db->join('pelatihan', 'pelatihan.id_tenaga = tenaga_kerja.id_tenaga', 'left');
		$this->db->where('tenaga_kerja.id_tenaga', $id_tenaga);
		$query = $this->db->get ('');
		return $query->row();	
	}

	public function gaji()
	{
		$this->db->select('sum(gaji_admin) - sum(gaji_tki) as gaji');
		$this->db->from('transaksi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = transaksi.id_tenaga', 'left');
		$this->db->join('negara', 'negara.id_negara = tenaga_kerja.id_negara', 'left');
		$query = $this->db->get ('');
		return $query->row();
	}
}

