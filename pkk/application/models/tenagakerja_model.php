<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenagakerja_model extends CI_Model {

	public function get_tb_tenaga_kerja()
	{
		$data_tenaga_kerja= $this->db->get('tenaga_kerja')->result();
		return $data_tenaga_kerja;
	}
	public function get_detail($id_tenaga)
	{
		return $this->db->where('id_tenaga', $id_tenaga)->get('tenaga_kerja')->row();
    }
    
    public function masuk_db()
	{
		
		$data_tenaga_kerja = array('nama' => $this->input->post('nama'),
					'ttl' => $this->input->post('ttl'),
					'alamat' => $this->input->post('alamat'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'nohp' => $this->input->post('nohp'),
					'pendidikan' => $this->input->post('pendidikan'),
                    'tgl_daftar' => $this->input->post('tgl_daftar'),
					'status' => $this->input->post('status'),
					'ktp' => $this->input->post('ktp'),
					'id_negara' => $this->input->post('id_negara'),
					'id_verifikasi' => $this->input->post('id_verifikasi'),
                    'id_pelatihan' => $this->input->post('id_pelatihan')
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
					'ttl' => $this->input->post('ttl'),
					'alamat' => $this->input->post('alamat'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'nohp' => $this->input->post('nohp'),
					'pendidikan' => $this->input->post('pendidikan'),
					'tgl_daftar' => $this->input->post('tgl_daftar'),
					'status' => $this->input->post('status'),
					'ktp' => $this->input->post('ktp'),
					'id_negara' => $this->input->post('id_negara'),
					'id_verifikasi' => $this->input->post('id_verifikasi'),
					'id_pelatihan' => $this->input->post('id_pelatihan')
				);
		return $this->db->where('id_tenaga',
			   $this->input->post('id_tenaga'))
		->update('tenaga_kerja', $dt_up_tenaga_kerja);
	}
	
	public function hapus($id_tenaga)
	{
		return $this->db->where('id_tenaga', $id_tenaga)->delete('tenaga_kerja');
	}

}

