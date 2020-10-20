<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_majikan extends CI_Controller {
       
    public function index()
    {
        if($this->session->userdata('login')==TRUE){
            $this->load->model('admin/tenagakerja_model');
            $data['tenaga_kerja']=$this->tenagakerja_model->data_tenaga_semua();
            $data['konten'] = "majikan/v_dashboard_majikan";
            $this->load->view('majikan/template_majikan', $data);
        }
        else{
            redirect('login');
        }
    }

    public function negara($opsi)
    {
        if($this->session->userdata('login')==TRUE){
            $this->load->model('admin/tenagakerja_model');
            $data['tenaga_kerja']=$this->tenagakerja_model->data_tenaga_majikan($opsi);
            $data['konten'] = "majikan/v_dashboard_majikan";
            $this->load->view('majikan/template_majikan', $data);
        }
        else{
            redirect('login');
        }
    }
}
