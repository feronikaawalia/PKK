<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelatihan_model extends CI_Model {

    public function data_pelatihan(){
        $this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = pelatihan.id_tenaga');
		$this->db->join('status', 'status.id_status = pelatihan.id_status');
		$query = $this->db->get ('');
        return $query->result();
    }
		
	public function data_tenaga()
	{
		$this->db->select('id_tenaga');
		$this->db->from('pelatihan');
		$query2 = $this->db->get ('')->result();
		$id = array();
		foreach($query2 as $l){
			$id[] = $l->id_tenaga;
		}

		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->where_not_in('tenaga_kerja.id_tenaga', $id);
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = pelatihan.id_tenaga', 'right');
		$this->db->join('status', 'status.id_status = pelatihan.id_status', 'left');
		$query = $this->db->get ('');
		return $query->result();
	}

	public function nama_tenaga()
	{
		$this->db->select('*');
		$this->db->from('tenaga_kerja');
		$query = $this->db->get ('');
        return $query->result();
	}
	
    public function tambah_pelatihan()
	{
		$data_pelatihan = array('id_tenaga' => $this->input->post('id_tenaga'),
					'bahasa' => $this->input->post('bahasa'),
					'keterampilan' => $this->input->post('keterampilan'),
					'nilai_kedisiplinan' => $this->input->post('nilai_kedisiplinan'),
					'nilai_praktek' => $this->input->post('nilai_praktek'),
					'keterangan' => $this->input->post('keterangan'),
					'id_status' => $this->input->post('id_status'),
                );
                
                $sql_masuk=$this->db->insert('pelatihan', $data_pelatihan);
                return $sql_masuk;
		
	}

	public function detail_pelatihan($id_pelatihan='')
	{
		return $this->db->where("id_pelatihan",$id_pelatihan)->get('pelatihan')->row();
	}

	public function update_pelatihan()
	{
		$dt_up_pelatihan = array('id_tenaga' => $this->input->post('id_tenaga'),
					'bahasa' => $this->input->post('bahasa'),
					'keterampilan' => $this->input->post('keterampilan'),
					'nilai_kedisiplinan' => $this->input->post('nilai_kedisiplinan'),
					'nilai_praktek' => $this->input->post('nilai_praktek'),
					'keterangan' => $this->input->post('keterangan'),
					'id_status' => $this->input->post('id_status'),
				);
				
		return $this->db->where('id_pelatihan',
			   $this->input->post('id_pelatihan'))
		->update('pelatihan', $dt_up_pelatihan);
	}

	public function hapus($id_pelatihan)
	{
		return $this->db->where('id_pelatihan', $id_pelatihan)->delete('pelatihan');
	}
}

