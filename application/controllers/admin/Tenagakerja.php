<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenagakerja extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('admin/tenagakerja_model');
}

	public function index()
	{
		if($this->session->userdata('login')==TRUE){
			$data['konten']="admin/v_tenagakerja";
			$this->load->model('admin/tenagakerja_model');
			$data['tenaga_kerja']=$this->tenagakerja_model->data_tenaga();
			$data['negara']=$this->tenagakerja_model->data_negara();
			$this->load->view('admin/template_admin', $data, FALSE);
			}else{
				redirect('login');
			}
	}

    public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('kota_lahir', 'Kota Lahir', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('nohp', 'No HP', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('status_tenaga', 'Status Tenaga', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        $this->form_validation->set_rules('id_negara', 'Negara', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() == TRUE ) {
            $this->load->model('admin/tenagakerja_model');
            $masuk=$this->tenagakerja_model->tambah_tenaga();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Data sukses ditambahkan');
            } else {
                $this->session->set_flashdata('pesan','Data gagal ditambahkan');
            }
            redirect(base_url('admin/Tenagakerja'),'refresh');
        } 
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('admin/Tenagakerja'),'refresh');            
        }      
	}

	public function get_detail_tenaga_kerja($id_tenaga='')
    {
        $this->load->model('admin/tenagakerja_model');
        $data_detail=$this->tenagakerja_model->detail_tenaga_kerja($id_tenaga);
        echo json_encode($data_detail);
	}  
	
	public function update_tenagakerja()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('kota_lahir', 'Kota Lahir', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('nohp', 'No HP', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('status_tenaga', 'Status Tenaga', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        $this->form_validation->set_rules('id_negara', 'Negara', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() ==  FALSE) {
            $this->session->set_flashdata('pesan',validation_errors());
            redirect(base_url('admin/Tenagakerja'),'refresh');            
        } else {
            $this->load->model('admin/tenagakerja_model');
            $proses_update=$this->tenagakerja_model->update_tenagakerja();
            if($proses_update){
                $this->session->set_flashdata('pesan','Data sukses diperbarui');
            } else {
                $this->session->set_flashdata('pesan','Data gagal diperbarui');
            }
            redirect(base_url('admin/Tenagakerja'),'refresh');            
        } 
    }
    
	public function hapus($id_tenaga)
	{
		$hapus = $this->tenagakerja_model->hapus($id_tenaga);
		if ($hapus == TRUE) {
			$this->session->set_flashdata('pesan','Sukses menghapus data');
		}
		else
		{
			$this->session->set_flashdata('pesan','Gagal menghapus data');
		}
		redirect('admin/Tenagakerja/index','refresh');
	}

	public function get_detail($id_tenaga='') //menampilkan get detail yang di pop-up tenagakerja(majikan)
    {
        $this->load->model('admin/tenagakerja_model');
        $data_detail=$this->tenagakerja_model->get_detail($id_tenaga);
        echo json_encode($data_detail);
	}  
}

