<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiMd extends CI_Model
{
    
    public function get_transaksi(){

        // $this->db->select('t.*, b.nama_barang , b.harga');
        // $this->db->from('transaksi t');
        // $this->db->join('barang b', 't.id_barang = b.id_barang');
        return $this->db->get('transaksi')->result();
    } 

    public function get_detail_ById($id){
        $this->db->select('d.*, b.nama_barang , b.harga');
        $this->db->from('transaksi_detail d');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->where('d.id_transaksi', $id);
        return $this->db->get()->result();
    }

    public function get_detailid_ById($id){
        return $this->db->get_where('transaksi_detail', array('id_transaksi'=> $id))->row();
    }

    public function get_transaksi_ById($id){

        return $this->db->get_where('transaksi', array('id_transaksi'=> $id))->row();
    }


    public function add_detail(){
        $this->db->set('id_transaksi', $this->input->post('id_tran'));
        $this->db->set('id_barang', $this->input->post('id_barang'));
        $this->db->set('jumlah', $this->input->post('jumlah'));
        $this->db->set('subtotal', $this->input->post('harga'));
        $this->db->insert('transaksi_detail');
    }


    public function del_detail($id){

        $this->db->delete('transaksi_detail', array('id_detail' => $id));
    }

    public function transaksi_del($id)
    {
        $this->db->delete('transaksi', array('id_transaksi' => $id));
    }

    public function transaksi_selesai_add($id){
      
        $this->db->set('id_transaksi', $id);
        $this->db->set('nama_pembeli', $this->input->post('nama_pembeli'));
        $this->db->set('qty', $this->input->post('jumlahJb'));
        $this->db->set('tgl_transaksi', date('Y-m-d'));
        $this->db->set('total', $this->input->post('totalSub'));
        $this->db->insert('transaksi');

    }


    public function get_laporan_perhari(){
        
        $this->db->select('*');
        $this->db->from('transaksi ');
        $this->db->where('tgl_transaksi', $this->input->post('hari'));
        return $this->db->get('')->result();


    }

    public function laporan_erbulan(){
        // $this->db->select('(SELECT SUM(payments.amount) FROM payments WHERE payments.invoice_id=4) AS amount_paid', FALSE);
        // $query = $this->db->get('mytable');
    }

    public function laporan_pertahun(){
    
    }
 
}