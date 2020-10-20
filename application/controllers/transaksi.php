<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {
       
    public function index()
    {
        
        if($this->session->userdata('login')==TRUE){
            $this->load->model('transaksi_model');
            $data['data_transaksi']=$this->transaksi_model->data_transaksi();
            $data['konten'] = "admin/v_transaksi";
            $this->load->view('admin/template_admin', $data);
			}else{
				redirect('login');
            }            
    }

    public function terima($id_transaksi, $id_tenaga)
    {
        $this->load->model('transaksi_model');
        $masuk=$this->transaksi_model->terima($id_transaksi, $id_tenaga);
            if($masuk==true){
                $this->session->set_flashdata('pesan','Berhasil diterima');
            } else {
                $this->session->set_flashdata('pesan','Gagal diterima');
            }
            redirect(base_url('transaksi'),'refresh');
    }

    public function tolak($id_transaksi)
    {
        $this->load->model('transaksi_model');
        $masuk=$this->transaksi_model->tolak($id_transaksi);
            if($masuk==true){
                $this->session->set_flashdata('pesan','Berhasil ditolak');
            } else {
                $this->session->set_flashdata('pesan','Gagal ditolak');
            }
            redirect(base_url('transaksi'),'refresh');
    }

    public function riwayat_admin()
    {
        $this->load->model('transaksi_model');
		$data['data_riwayat']=$this->transaksi_model->data_riwayat_admin();
        $data['konten'] = "admin/v_riwayat_admin";
        $this->load->view('admin/template_admin', $data);
    }

    public function tambah()
    {
        $this->load->model('transaksi_model');
            $masuk=$this->transaksi_model->tambah_transaksi();
            if($masuk==true){
                $this->session->set_flashdata('pesan','Transaksi berhasil! Silahkan menunggu konfirmasi oleh Admin');
            } else {
                $this->session->set_flashdata('pesan','Transaksi gagal ditambahkan');
            }
            redirect(base_url('majikan/dashboard_majikan/index'),'refresh');
    }

    public function bukti()
    {
        $this->load->model('transaksi_model');
        $data['konten'] = "admin/v_bukti";
        $id_user = $this->session->userdata('id_user');
        $data['pekerja'] = $this->transaksi_model->bukti_pekerja($id_user);
        $this->load->view('majikan/template_majikan', $data);                
    }

    public function upload_bukti()
    {
        $this->load->model('transaksi_model');
        $masuk=$this->transaksi_model->upload_bukti();
        if($masuk==true){
            $this->session->set_flashdata('pesan','Transaksi sukses ditambahkan, silahkan menunggu transaksi dikonfirmasi di "Riwayat Bukti"');
        } else {
            $this->session->set_flashdata('pesan','Transaksi gagal ditambahkan');
        }
        redirect(base_url('transaksi/bukti'),'refresh');   
    }

    public function buktiverifikasi()
    {
        $this->load->model('admin/buktiverifikasi_model');
        $data['buktiverifikasi']=$this->buktiverifikasi_model->data_buktiverifikasi();
        $data['konten'] = "admin/v_verifikasibukti";
        $this->load->view('admin/template_admin', $data);    

    }

    public function konfirmasi($id_bukti)
    {
        $this->load->model('admin/buktiverifikasi_model');
        $masuk=$this->buktiverifikasi_model->konfirmasi($id_bukti);
            if($masuk==true){
                $this->session->set_flashdata('pesan','Berhasil dikonfirmasi');
            } else {
                $this->session->set_flashdata('pesan','Gagal dikonfirmasi');
            }
            redirect(base_url('transaksi/buktiverifikasi'),'refresh');
    }

    public function tolakkonfirmasi($id_bukti)
    {
        $this->load->model('admin/buktiverifikasi_model');
        $masuk=$this->buktiverifikasi_model->tolakkonfirmasi($id_bukti);
            if($masuk==true){
                $this->session->set_flashdata('pesan','Berhasil dikonfirmasi');
            } else {
                $this->session->set_flashdata('pesan','Gagal dikonfirmasi');
            }
            redirect(base_url('transaksi/buktiverifikasi'),'refresh');
    }


    public function riwayatbukti()
    {
        $id_user = $this->session->userdata('id_user');
        $this->load->model('admin/buktiverifikasi_model');
        $data['data_riwayat']=$this->buktiverifikasi_model->buktiriwayat($id_user);
        $data['konten'] = "majikan/v_riwayat_majikan";
        $this->load->view('majikan/template_majikan', $data); 
    }

    public function notifikasi_majikan()
    {
        $id_user = $this->session->userdata('id_user');
        $this->load->model('transaksi_model');
        $data_detail=$this->transaksi_model->notifikasi($id_user);
        echo json_encode($data_detail);
    }
}
