<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('admin/verifikasi_model');
}

	public function index()
	{
		if($this->session->userdata('login')==TRUE){
			$data['konten']="admin/v_verifikasi";
			$data['verifikasi']=$this->verifikasi_model->data_verifikasi();
			$data['tenaga_kerja']=$this->verifikasi_model->data_tenaga();
			$this->load->view('admin/template_admin', $data, FALSE);
			}else{
				redirect('login');
			}
	}

	public function tambah()
	{
		// $this->form_validation->set_rules('kartukeluarga', 'Kartu keluarga', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		// $this->form_validation->set_rules('aktakelahiran', 'Akta kelahiran', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		// $this->form_validation->set_rules('passport', 'Passport', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		// $this->form_validation->set_rules('datakesehatan', 'Data Kesehatan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		// $this->form_validation->set_rules('pasfoto', 'PAS Foto', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		// $this->form_validation->set_rules('bukutabungan', 'Buku Tabungan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		// $this->form_validation->set_rules('id_status', 'Status', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		// if ($this->form_validation->run() == TRUE ) {
            $this->load->model('admin/verifikasi_model');
            $masuk=$this->verifikasi_model->tambah_verifikasi();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Data sukses ditambahkan');
            } else {
                $this->session->set_flashdata('pesan','Data gagal ditambahkan');
            }
			redirect(base_url('admin/Verifikasi'),'refresh');  
		// } 
        // else {
        //     $this->session->set_flashdata('pesan', validation_errors());
        //     redirect(base_url('admin/Verifikasi'),'refresh');        
        // } 
	}

	public function hapus($id_verifikasi)
	{
		$hapus = $this->verifikasi_model->hapus($id_verifikasi);
		if ($hapus == TRUE) {
			$this->session->set_flashdata('pesan','Berhasil hapus data');
		}
		else
		{
			$this->session->set_flashdata('pesan','Gagal hapus data');
		}
		redirect('admin/verifikasi/index','refresh');
	}
}

 