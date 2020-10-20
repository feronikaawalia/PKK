<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {
       
    public function index()
    {
        if($this->session->userdata('login')==TRUE){
        $this->load->model('admin/tenagakerja_model');
        $data['gaji'] = $this->tenagakerja_model->gaji();
        $data['konten'] = "admin/v_dashboard_admin";
        
        $this->load->view('admin/template_admin', $data);
        }else{
            redirect('login');
        }
    }
}
