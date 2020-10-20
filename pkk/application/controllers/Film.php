<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('film_model');
}
	public function index()
	{
		$data['konten']="v_film";
		$data['data_film']=$this->film_model->get_tb_film();
		$this->load->view('template', $data);
	}
	public function detail($id_film)
	{
		$data_detail = $this->film_model->get_detail($id_film);
		echo json_encode($data_detail);
    }

    public function tambah()
	{
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('year', 'year', 'trim|required');
        $this->form_validation->set_rules('genre', 'genre', 'trim|required');
        $this->form_validation->set_rules('sinopsis', 'sinopsis', 'trim|required');
		$this->form_validation->set_rules('officialsite', 'officialsite', 'trim|required');

		if ($this->form_validation->run() == TRUE) 
		{
			if ($this->film_model->tambah()==true) 
			{
				$this->session->set_flashdata('pesan','berhasil tambah');
			}
			else
			{
				$this->session->set_flashdata('pesan','gagal tambah');
			}
			redirect('Film/index','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('Film/index','refresh');
		}
    }

	public function update()
	{
		$this->form_validation->set_rules('nama_masakan', 'Nama Masakan', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('status_masakan', 'Status Masakan', 'trim|required');

		if ($this->form_validation->run() == TRUE) 
		{
			if ($this->film_model->update()==true) 
			{
				$this->session->set_flashdata('pesan','berhasil ubah');
			}
			else
			{
				$this->session->set_flashdata('pesan','gagal ubah');
			}
			redirect('Masakan/index','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('Masakan/index','refresh');
		}
    }
    
	public function hapus($id_film)
	{
		$hapus = $this->film_model->hapus($id_film);
		if ($hapus == TRUE) {
			$this->session->set_flashdata('pesan','berhasil hapus');
		}
		else
		{
			$this->session->set_flashdata('pesan','gagal hapus');
		}
		redirect('Masakan/index','refresh');
	}

}

/* End of file Masakan.php */
/* Location: ./application/controllers/Masakan.php */
