<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCtr extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model("AdminMd");
		$this->load->model("MesinMd");
		$this->load->model("BarangMd");
		$this->load->model("TransaksiMd");
		$this->load->library('form_validation');
		$this->load->library('session');
		

		if( ! $this->session->userdata('email')){
			redirect('auth');
		}
	}
	
	public function index()
	{


		$data["count_barang"] = $this->AdminMd->get_barangCount(); //ambil data dari Models 
		$data["count_transaksi"] = $this->AdminMd->get_transaksiCount(); //ambil data dari Models 
		$data["count_admin"] = $this->AdminMd->get_adminCount(); //ambil data dari Models 
		$this->load->view('beranda',$data);

	}

	public function pilih_barang(){

		$id_brand = $this->input->post('id_brand');
		$barang = $this->BarangMd->get_barang_ByIdBrand($id_brand);
		$data = "<option value=''> -Pilih Barang- </option>";

		foreach($barang as $br){
			$data .= "<option harga='" . $br->harga . "' value='" . $br->id_barang . "'>" . $br->kode_barang . " - " . $br->nama_barang . "</option>"; 
		}

		echo $data;
	}


	//  Khusus Untuk View =======================================================================================
	
	public function admin_view()
	{
		$data["dt_admin"] = $this->AdminMd->getAll(); //ambil data dari Models 
		$this->load->view('output/admin', $data); // Kirim data ke View

	}

	public function barang_view()
	{
		$data["dt_barang"] = $this->BarangMd->get_barang(); //ambil data dari Models 
		$data["dt_stok"] = $this->BarangMd->get_Countstok(); //ambil data dari Models 
		$this->load->view('output/barang',$data); // Kirim data ke View

	}

	public function stok_view()
	{
		$data["dt_stok"] = $this->BarangMd->get_stok(); //ambil data dari Models 
		$this->load->view('output/stok',$data); // Kirim data ke View

	}

	public function mesin_view()
	{
		$data["dt_mesin"] = $this->MesinMd->getAll(); //ambil data dari Models 
		$this->load->view('output/jenis-mesin', $data); // Kirim data ke View

	}

	public function transaksi_view()
	{
		$data['dt_transaksi'] =$this->TransaksiMd->get_transaksi();
		$this->load->view('output/transaksi',$data);

	}

	public function transaksi_tambah_view()
	{
		$data["dt_mesin"] = $this->MesinMd->getAll();
		$data["dt_barang"]= $this->BarangMd->get_barang();
		$this->load->view('output/transaksi_tambah',$data);
	}

	public function transaksi_tambah_view2($id)
	{
		$data["dt_mesin"] = $this->MesinMd->getAll();
		$data["dt_barang"]= $this->BarangMd->get_barang();
		$data["dt_detail"]= $this->TransaksiMd->get_detail_ById($id);
		// var_dump($data["dt_detail"]);exit;
		$data["dt_id"]= $this->TransaksiMd->get_detailid_ById($id);
		$this->load->view('output/transaksi_tambah2',$data);
	}

	public function detail_view($id)
	{
		$data['dt_detail'] = $this->TransaksiMd->get_detail_ById($id);
		$data['dt_transaksi'] =$this->TransaksiMd->get_transaksi_ById($id);
		$this->load->view('output/detail', $data);

	}

	public function laporan_transaksi_view(){
		$this->load->view('output/laporan-penjualan');
	}

	public function laporan_barang(){
		$data['lap_barang'] = $this->BarangMd->get_barang();
		$this->load->view('output/laporan-barang', $data);
	}



	public function perhari(){
		$data['perhari'] = $this->TransaksiMd->get_laporan_perhari();
		$data['tgl'] = $this->input->post('hari');

		$this->load->view('output/perhari', $data);
	}


	public function perbulan(){
		$data['perbulan'] = $this->TransaksiMd->get_laporan_perbulan();
		$data['bulan'] = $this->input->post('bulan');
		$this->load->view('output/perbulan', $data);

	}


	public function pertahun(){
		$data['pertahun'] = $this->TransaksiMd->get_laporan_pertahun();
		$data['thn'] = $this->input->post('tahun');

		$this->load->view('output/pertahun', $data);
	}




	// Khusus Untuk Input =======================================================================================

	public function admin_add()
	{
		$this->load->view('input/add-admin');

	}

	public function barang_add()
	{
		$data["dt_mesin"] = $this->MesinMd->getAll(); //ambil data dari Models 
		// var_dump($data['dt_admin']);die;
		$this->load->view('input/add-barang', $data);

	}

	public function mesin_add()
	{
		$this->load->view('input/add-jenis-mesin');

	}

	public function transaksi_add()
	{
		$this->load->view('input/add-transaksi');

	}


	//  Untuk Save
	public function admin_save(){
		$add_admin = $this->AdminMd;
        $validation = $this->form_validation;
        $validation->set_rules($add_admin->rules());

        if ($validation->run()) {
            $add_admin->save();
            $this->session->set_flashdata('success', '<h6><i>Data Berhasil disimpan</i></h6>');
        }

		redirect(site_url('HomeCtr/admin_view'));
	}


	public function mesin_save(){
		
    	$this->MesinMd->save();
    	$this->session->set_flashdata('success', '<h6><i>Data Berhasil disimpan</i></h6>');
    
		redirect(site_url('HomeCtr/mesin_view'));
	}

	public function detail_save(){
		$this->form_validation->set_rules('total', 'Total  Kosong', 'required');

		$idtrans = $this->input->post('id_tran');
		if($this->form_validation->run() == false){
			$this->transaksi_tambah_view2($idtrans); 
		}else{
		$this->TransaksiMd->add_detail();
		$this->session->set_flashdata('success', '<h6><i>Data Berhasil disimpan, Pilih untuk Menambah</i></h6>');
		redirect('HomeCtr/transaksi_tambah_view2/'.$idtrans);
		}
	}


	public function barang_save()
	{
		$this->form_validation->set_rules('nm_sc', 'Nama suku cadang', 'required');

		if($this->form_validation->run() == false){
			$this->barang_add();
		}else{
			$this->BarangMd->add_barang();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			redirect('HomeCtr/barang_view');
		}
	}

	public function transaksi_selesai($id=null){
		$this->TransaksiMd->transaksi_selesai_add($id);
		$this->session->set_flashdata('success','Transaksi Berhasil Ditambahkan');
		redirect('HomeCtr/transaksi_view');
	}

	public function stok_save(){
		$data = $this->BarangMd->add_stok();
		$this->session->set_flashdata('success', 'Stok Berhasil Tambahkan');
			redirect('HomeCtr/barang_view');
	}

	// Untuk Delete =======================================================================================
	public function admin_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->AdminMd->delete($id)) {
            redirect(site_url('HomeCtr/admin_view'));
		}
	}

	public function mesin_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->MesinMd->delete($id)) {
            redirect(site_url('HomeCtr/mesin_view'));
		}
	}

	public function barang_del($id=null)
	{
		$this->BarangMd->del_barang($id);
		// $this->session->set_flashdata('warning','Data Berhasil Dihapus');
		$this->barang_view();

	}

	public function detail_del($id, $idtr)
	{
		$this->TransaksiMd->del_detail($id);
		$this->transaksi_tambah_view2($idtr);

	}

	public function transaksi_del($id=null)
	{
		$this->TransaksiMd->transaksi_del($id);
		$this->session->set_flashdata('delete','Transaksi Berhasil Dihapus');
		$this->transaksi_view();
	}



	// Untuk Edit
	public function admin_edd($id)
	{
		$data["up_admin"] = $this->AdminMd->getById($id); //ambil data dari Models 
		$this->load->view('update/upd-admin', $data); // Kirim data ke View
	
	}

	public function barang_edd($id)
	{
		$data["dt_mesin"] = $this->MesinMd->getAll(); 
		$data["up_barang"] = $this->BarangMd->get_barang_ById($id); //ambil data dari Models 
		$this->load->view('update/upd-barang', $data); // Kirim data ke View
	
	}


	// Untuk Edit  =======================================================================================
	public function mesin_edd($id)
	{
		$data["up_mesin"] = $this->MesinMd->getById($id); //ambil data dari Models 
		$this->load->view('update/upd-mesin', $data); // Kirim data ke View
	
	}



	// Untuk Update
	public function admin_update(){   
        $up_admin = $this->AdminMd;
        $validation = $this->form_validation;
        $validation->set_rules($up_admin->rules());

        if ($validation->run()) {
         $data =   $up_admin->update();
            $this->session->set_flashdata('success', 'Berhasil diupdate');
        }

		redirect(site_url('HomeCtr/admin_view'));
	}

	public function mesin_update(){   
       
		$this->MesinMd->update();
		$this->session->set_flashdata('success', 'Berhasil diupdate');

		redirect(site_url('HomeCtr/mesin_view'));
	}


	public function barang_update(){
		$this->BarangMd->update_barang();
		$this->session->set_flashdata('success','Berhasil Diupdate');
		redirect('HomeCtr/barang_view');

	}






}
