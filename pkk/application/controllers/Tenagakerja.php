<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenagakerja extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('tenagakerja_model');
}
	public function index()
	{
		$data['konten']="v_tenagakerja";
		$this->load->model('tenagakerja_model');
		$data['data_tenaga_kerja']=$this->tenagakerja_model->get_tb_tenaga_kerja();
		$this->load->view('template', $data, FALSE);
	}
	public function detail($id_tenaga='')
	{
		$this->load->model('tenagakerja_model');
		$data_detail = $this->tenaga_kerja_model->get_detail($id_tenaga);
		echo json_encode($data_detail);
    }

    public function tambah()
	{
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('ttl', 'ttl', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nohp', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('tgl_daftar', 'tgl_daftar', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
        $this->form_validation->set_rules('id_negara', 'id_negara', 'trim|required');
		$this->form_validation->set_rules('id_verifikasi', 'id_verifikasi', 'trim|required');
        $this->form_validation->set_rules('id_pelatihan', 'id_pelatihan', 'trim|required');


		if ($this->form_validation->run() == TRUE ) {
            $this->load->model('tenagakerja_model','tm');
            $masuk=$this->tm->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan','sukses masuk');
            } else {
                $this->session->set_flashdata('pesan','gagal masuk');
            }
            redirect(base_url('index.php/Tenagakerja'),'refresh');
        } 
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/Tenagakerja'),'refresh');            
        }      
	}

	public function get_detail_tenaga_kerja($id_tenaga='')
    {
        $this->load->model('tenagakerja_model');
        $data_detail=$this->tenagakerja_model->detail_tenaga_kerja($id_tenaga);
        echo json_encode($data_detail);
    }  
	public function update_tenagakerja()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('ttl', 'ttl', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nohp', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('tgl_daftar', 'tgl_daftar', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
        $this->form_validation->set_rules('id_negara', 'id_negara', 'trim|required');
		$this->form_validation->set_rules('id_verifikasi', 'id_verifikasi', 'trim|required');
        $this->form_validation->set_rules('id_pelatihan', 'id_pelatihan', 'trim|required');

		if ($this->form_validation->run() ==  FALSE) {
            $this->session->set_flashdata('pesan',validation_errors());
            redirect(base_url('index.php/Tenagakerja'),'refresh');            
        } else {
            $this->load->model('tenagakerja_model');
            $proses_update=$this->tenagakerja_model->update_tenagakerja();
            if($proses_update){
                $this->session->set_flashdata('pesan','Sukses update');
            } else {
                $this->session->set_flashdata('pesan','Gagal update');
            }
            redirect(base_url('index.php/Tenagakerja'),'refresh');            
        } 
    }
    
	public function hapus($id_tenaga)
	{
		$hapus = $this->tenagakerja_model->hapus($id_tenaga);
		if ($hapus == TRUE) {
			$this->session->set_flashdata('pesan','Berhasil hapus data');
		}
		else
		{
			$this->session->set_flashdata('pesan','Gagal hapus data');
		}
		redirect('Tenagakerja/index','refresh');
	}

}

