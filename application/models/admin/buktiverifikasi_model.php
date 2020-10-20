<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buktiverifikasi_model extends CI_Model {

    public function data_buktiverifikasi(){
        $this->db->select('*');
        $this->db->from('bukti');
        $this->db->join('transaksi', 'transaksi.id_transaksi=bukti.id_transaksi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = transaksi.id_tenaga');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('status_bukti', '');
		$query = $this->db->get ('');
        return $query->result();
    }
    
    public function konfirmasi($id_bukti)
	{	
        $status = array('status_bukti' => 'Terima');
		return $this->db->where('id_bukti', $id_bukti)->update('bukti', $status);
    }
    
    public function tolakkonfirmasi($id_bukti)
	{	
        $status = array('status_bukti' => 'Tolak');
		return $this->db->where('id_bukti', $id_bukti)->update('bukti', $status);
    }

    public function buktiriwayat($id_user)
    {
        $this->db->select('*');
        $this->db->from('bukti');
        $this->db->join('transaksi', 'transaksi.id_transaksi=bukti.id_transaksi');
		$this->db->join('tenaga_kerja', 'tenaga_kerja.id_tenaga = transaksi.id_tenaga');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('user.id_user', $id_user);
		$query = $this->db->get ('');
        return $query->result();
    }
    
}

