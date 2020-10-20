<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/pelatihan_model');
	}

	public function index()
	{
		if($this->session->userdata('login')==TRUE){
			$data['konten']="admin/v_pelatihan";
			$this->load->model('admin/pelatihan_model');
			$data['pelatihan']=$this->pelatihan_model->data_pelatihan();
			$data['tenaga_kerja']=$this->pelatihan_model->data_tenaga();
			$data['nama_tenaga']=$this->pelatihan_model->nama_tenaga();
			$this->load->view('admin/template_admin', $data, FALSE);
			}else{
				redirect('login');
			}
	}

	public function tambah()
	{
        $this->form_validation->set_rules('id_tenaga', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('bahasa', 'Bahasa', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('keterampilan', 'Keterampilan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('nilai_kedisiplinan', 'Nilai Kedisiplinan', 'required|max_length[3]', array('required' => '%s harus diisi terlebih dahulu', 'max_length' => 'Nilai Kedisiplinan dari 0-100'));
		$this->form_validation->set_rules('nilai_praktek', 'Nilai Praktek', 'required|max_length[3]', array('required' => '%s harus diisi terlebih dahulu', 'max_length' => 'Nilai Kedisiplinan dari 0-100' ));
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('id_status', 'Status', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() == TRUE ) {
            $this->load->model('model/pelatihan_model');
			$masuk=$this->pelatihan_model->tambah_pelatihan();
			
            if($masuk==true){
                $this->session->set_flashdata('pesan','Sukses menambahkan data');
            } else {
                $this->session->set_flashdata('pesan','Gagal menghapus data');
            }
            redirect(base_url('admin/Pelatihan'),'refresh');
        } 
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('admin/Pelatihan'),'refresh');            
        }      
	}

	public function get_detail_pelatihan($id_pelatihan='')
    {
        $this->load->model('model/pelatihan_model');
        $data_detail=$this->pelatihan_model->detail_pelatihan($id_pelatihan);
        echo json_encode($data_detail);
	}  
	
	public function update_pelatihan()
	{
		$this->form_validation->set_rules('id_tenaga', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('bahasa', 'Bahasa', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('keterampilan', 'Keterampilan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('nilai_kedisiplinan', 'Nilai Kedisiplinan', 'required|max_length[3]', array('required' => '%s harus diisi terlebih dahulu', 'max_length' => '%s dari 0-100'));
		$this->form_validation->set_rules('nilai_praktek', 'Nilai Praktek', 'required|max_length[3]', array('required' => '%s harus diisi terlebih dahulu', 'max_length' => '%s dari 0-100' ));
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('id_status', 'Status', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() ==  FALSE) {
            $this->session->set_flashdata('pesan',validation_errors());
            redirect(base_url('admin/Pelatihan'),'refresh');            
        } else {
            $this->load->model('model/pelatihan_model');
            $proses_update=$this->pelatihan_model->update_pelatihan();
            if($proses_update){
                $this->session->set_flashdata('pesan','Sukses memperbarui data');
            } else {
                $this->session->set_flashdata('pesan','Gagal memperbarui data');
            }
            redirect(base_url('admin/Pelatihan'),'refresh');            
        } 
    }
    
	public function hapus($id_pelatihan)
	{
		$hapus = $this->pelatihan_model->hapus($id_pelatihan);
		if ($hapus == TRUE) {
			$this->session->set_flashdata('pesan','Sukses menghapus data');
		}
		else
		{
			$this->session->set_flashdata('pesan','Gagal menghapus data');
		}
		redirect('admin/Pelatihan/index','refresh');
	}

}

