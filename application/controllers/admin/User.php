<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('admin/user_model');
}

	public function index()
	{
        if($this->session->userdata('login')==TRUE){
            $data['konten']="admin/v_admin";
            $this->load->model('admin/user_model');
            $data['admin']=$this->user_model->data_admin();
            $this->load->view('admin/template_admin', $data, FALSE);
			}else{
				redirect('login');
            }
	}

	public function tambah()
	{
        $this->form_validation->set_rules('nama_user', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() == TRUE ) {
            $this->load->model('admin/user_model');
            $masuk=$this->user_model->tambah_admin();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Sukses menambahkan data');
            } else {
                $this->session->set_flashdata('pesan','Gagal menambahkan data');
            }
            redirect(base_url('admin/User'),'refresh');
        } 
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('admin/User'),'refresh');            
        }      
    }
    
    public function get_detail_admin($id_admin='')
    {
        $this->load->model('admin/user_model');
        $data_detail=$this->user_model->detail_admin($id_admin);
        echo json_encode($data_detail);
	}  
	
	public function update_admin()
	{
        $this->form_validation->set_rules('nama_user', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() ==  FALSE) {
            $this->session->set_flashdata('pesan',validation_errors());
            redirect(base_url('admin/User'),'refresh');            
        } else {
            $this->load->model('admin/user_model');
            $proses_update=$this->user_model->update_admin();
            if($proses_update){
                $this->session->set_flashdata('pesan','Sukses memperbarui data');
            } else {
                $this->session->set_flashdata('pesan','Gagal memperbarui data');
            }
            redirect(base_url('admin/User'),'refresh');            
        } 
    }
    

	public function hapus($id_user)
	{
		$hapus = $this->user_model->hapus($id_user);
		if ($hapus == TRUE) {
			$this->session->set_flashdata('pesan','Sukses menghapus data');
		}
		else
		{
			$this->session->set_flashdata('pesan','Gagal menghapus data');
		}
		redirect('admin/User/index','refresh');
    }
    
    public function profil($id_user)

    {
        $this->load->model('admin/user_model');
        $data['konten']="majikan/v_profil";
        $data['profil']=$this->user_model->profil($id_user);
        $this->load->view('majikan/template_majikan', $data);
    }

    public function get_detail_profil($id_user)

    {
        $this->load->model('admin/user_model');
        $data_detail=$this->user_model->detail_profil($id_user);
        echo json_encode($data_detail);
        
    }

    public function update_profil()
	{
        $this->form_validation->set_rules('nama_user', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() ==  FALSE) {
            $this->session->set_flashdata('pesan',validation_errors());
            redirect(base_url('admin/profil'),'refresh');            
        } else {
            $this->load->model('admin/user_model');
            $proses_update=$this->user_model->update_admin();
            if($proses_update){
                $this->session->set_flashdata('pesan','Sukses memperbarui data');
            } else {
                $this->session->set_flashdata('pesan','Gagal memperbarui data');
            }
            redirect(base_url('admin/profil'),'refresh');            
        } 
    }

}