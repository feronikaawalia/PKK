<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film_model extends CI_Model {

	public function get_tb_film()
	{
		return $this->db->get('Film')->result();
	}
	public function get_detail($id_film)
	{
		return $this->db->where('id_film', $id_film)->get('film')->row();
    }
    
    public function tambah()
	{
		$config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '100000000';
		$config['max_width']  = '1024000000';
		$config['max_height']  = '7680000000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('pesan', $this->upload->display_errors());
		}
		else
		{
			$data = array('tittle' => $this->input->post('nama_masakan'),
					'year' => $this->input->post('harga'),
                    'genre' => $this->input->post('status_masakan'),
                    'sinopsis' => $this->input->post('harga'),
					'officialsite' => $this->input->post('status_masakan'),
					'photo' => $this->upload->data('file_name')
				);

			return $this->db->insert('film', $data);
		}
	}

	public function update()
	{
		$nama_gambar=$_FILES['gambar']['name'];
		if ($nama_gambar!="") 
		{
			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000000';
			$config['max_width']  = '1024000000';
			$config['max_height']  = '7680000000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar'))
			{
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
			}
			else
			{
				$data = array('nama_masakan' => $this->input->post('nama_masakan'),
					'harga' => $this->input->post('harga'),
					'status_masakan' => $this->input->post('status_masakan') ,
					'gambar' => $this->upload->data('file_name')
				);
				return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan',$data);
			}
		}
		else
		{
			$data = array('nama_masakan' => $this->input->post('nama_masakan'),
					'harga' => $this->input->post('harga'),
					'status_masakan' => $this->input->post('status_masakan')
				);
				return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan',$data);
		}
		
	}
	
	public function hapus($id_masakan)
	{
		return $this->db->where('id_masakan', $id_masakan)->delete('masakan');
	}

}

/* End of file Masakan_model.php */
/* Location: ./application/models/Masakan_model.php */