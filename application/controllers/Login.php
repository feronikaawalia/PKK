<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url');
    }
    
    public function index()
    {
        
        if($this->session->userdata('login')==TRUE){
            if($this->session->userdata('level') == "admin"){
                redirect('admin/Dashboard_admin','refresh');
            }
            else{
                redirect('majikan/Dashboard_majikan/index','refresh');
            }
        }
        $this->load->view('v_login');
    }

    public function login(){

        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        
        if ($this->form_validation->run() == TRUE ) {
            $where = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );

            if($this->login_model->login($where)==TRUE){
                if($this->session->userdata('level') == "admin"){
                    redirect('admin/Dashboard_admin','refresh');}

                else{
                    redirect('majikan/Dashboard_majikan/index','refresh');}
            }
            else{
                redirect('login');
        }
    }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('login'),'refresh');            
        }    
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function daftar()
    {
        $this->form_validation->set_rules('nama_user', 'Nama', 'required', array('required' => '%s harus diisi terlebih dahulu'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s harus diisi terlebih dahulu'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi terlebih dahulu'));

		if ($this->form_validation->run() == TRUE ) {
            $this->load->model('login_model');
            $masuk=$this->login_model->daftar();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Sukses menambahkan data');
            } else {
                $this->session->set_flashdata('pesan','Gagal menambahkan data');
            }
            redirect(base_url('login'),'refresh');
        } 
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('login/register'),'refresh');            
        }   
    }

    public function register()
    {
        $this->load->view('v_daftar');
        
    }
}
