<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMd extends CI_Model
{
    public function add_barang(){
        $id_sc = $this->input->post('id_sc');
        $id_brand = $this->input->post('id_brand');
        $nm_sc = $this->input->post('nm_sc');
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $tanggal = $this->input->post('tanggal');

        $this->db->set('id_barang', $id_sc);
        $this->db->set('id_brand', $id_brand);
        $this->db->set('nama_barang', $nm_sc);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('harga', $harga);
        $this->db->set('tgl_masuk', $tanggal);
        $this->db->set('kode_barang', $this->input->post('kd_sc'));

        $this->db->insert('barang');
    }

    public function add_stok(){
        $stok_lama = $this->input->post('stok_lama');
        $stok_baru = $this->input->post('stok_baru');
        $stok = $stok_lama + $stok_baru ;
        $this->db->set('jumlah', $stok);
        $this->db->where('id_barang', $this->input->post('id'));
        $this->db->update('barang');

    }
    public function get_barang(){

        $this->db->select('b.*, k.nama_brand');
        $this->db->from('barang b');
        $this->db->join('brand k', 'b.id_brand = k.id_brand');
        return $this->db->get()->result();
    } 

    // public function get_laporan_barang(){
    //     return $this->db->get('barang')->result();
    // }

    public function get_Countstok(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('jumlah <=',  7);
        return $this->db->count_all_results();
    }

    public function get_stok(){

      //  $this->db->where('name !=', $name);
       // $this->db->where('id <', $id); // Produces: WHERE name != 'Joe' AND id < 45

        $this->db->select('b.*, k.nama_brand');
        $this->db->from('barang b');
        $this->db->join('brand k', 'b.id_brand = k.id_brand');
        $this->db->where('jumlah <=',  7);
        return $this->db->get()->result();
    } 

    public function update_barang(){
        $this->db->set('id_brand', $this->input->post('id_brand'));
        $this->db->set('nama_barang', $this->input->post('nm_sc'));
        $this->db->set('harga', $this->input->post('harga'));
        $this->db->set('jumlah', $this->input->post('jumlah'));
        $this->db->set('tgl_masuk', $this->input->post('tanggal'));
        $this->db->set('kode_barang', $this->input->post('kd_sc'));
        $this->db->where('id_barang', $this->input->post('id_sc'));
        $this->db->update('barang');


    }

    public function del_barang($id){

        $this->db->delete('barang', array('id_barang' => $id));
    }


    public function get_barang_ById($id){

        return $this->db->get_where('barang', array('id_barang'=> $id))->row();
    }

    
    public function get_barang_ByIdBrand($id){

        return $this->db->get_where('barang', array('id_brand'=> $id))->result();
    }




}