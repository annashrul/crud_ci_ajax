<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index(){
		$data = array('title' => 'List Barang');
		$this->load->view('barang',$data);
	}
	public function ambil_data_barang(){
		$barang = $this->mBarang->get_kategori_barang();
		echo json_encode($barang);
	}
	public function ambil_id(){
		$id_barang = $this->input->post('id_barang');
		$where = array('id_barang' => $id_barang);
		$barang = $this->mBarang->ambil_id($where);
		echo json_encode($barang);
	}
	public function tambah_data_barang(){
		$nama_barang 	= $this->input->post('nama_barang');
		$harga_barang 	= $this->input->post('harga_barang');
		$satuan_barang 	= $this->input->post('satuan_barang');
		$stok_barang 	= $this->input->post('stok_barang');
		$id_kategori 	= $this->input->post('id_kategori');
		if($nama_barang == "" && $harga_barang == "" && $satuan_barang == "" && $stok_barang == "") {
			$result['pesan'] = "Silahkan Isi Form Yang Sudah Disediakan";
		}elseif($nama_barang == ""){
			$result['pesan'] = "Nama Barang Harus Diisi";
		}elseif($harga_barang == ""){
			$result['pesan'] = "Harga Barang Harus Diisi";
		}elseif($satuan_barang == ""){
			$result['pesan'] = "Satuan Barang Harus Diisi";
		}elseif($stok_barang == ""){
			$result['pesan'] = "Stok Barang Harus Diisi";
		}else{
			$result['pesan'] = "";
			$data = array(
				'nama_barang' 	=> $nama_barang,
				'harga_barang'	=> $harga_barang,
				'satuan_barang'	=> $satuan_barang,
				'stok_barang'	=> $stok_barang,
				'id_kategori'	=> $id_kategori
			);
			$this->mBarang->insert_barang($data);
		}
		echo json_encode($result);
	}
	public function edit_data_barang(){
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga_barang = $this->input->post('harga_barang');
		$satuan_barang = $this->input->post('satuan_barang');
		$stok_barang = $this->input->post('stok_barang');
		$id_kategori = $this->input->post('id_kategori');
		if($nama_barang == "" && $harga_barang == "" && $satuan_barang == "" && $stok_barang == "") {
			$result['pesan'] = "Silahkan Isi Form Yang Sudah Disediakan";
		}elseif($nama_barang == ""){
			$result['pesan'] = "Nama Barang Harus Diisi";
		}elseif($harga_barang == ""){
			$result['pesan'] = "Harga Barang Harus Diisi";
		}elseif($satuan_barang == ""){
			$result['pesan'] = "Satuan Barang Harus Diisi";
		}elseif($stok_barang == ""){
			$result['pesan'] = "Stok Barang Harus Diisi";
		}else{
			$result['pesan'] = "";
			$data = array(
				'id_barang'		=> $id_barang,
				'nama_barang' 	=> $nama_barang,
				'harga_barang'	=> $harga_barang,
				'satuan_barang'	=> $satuan_barang,
				'stok_barang'	=> $stok_barang,
				'id_kategori'	=> $id_kategori
			);
			$this->mBarang->update_barang($data);
		}
		echo json_encode($result);
	}
	public function hapus_data_barang(){
		$id_barang = $this->input->post('id_barang');
		$data = array('id_barang' => $id_barang);
		$barang = $this->mBarang->delete_barang($data);
		echo json_encode($barang);
	}
	public function kategori_barang(){
		$kategori = $this->mBarang->get_kategori_barang();
		echo json_encode($kategori);
	}
	public function kategori_by_barang(){
		$kategori = $this->mKategori->getKategori();
		echo json_encode($kategori);
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */