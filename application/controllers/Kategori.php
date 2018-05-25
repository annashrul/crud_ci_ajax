<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index(){
		$data = array('title'	=> 'Katgori Berita');
		$this->load->view('kategori_berita',$data);
	}
	public function ambilData(){
		$data = $this->mKategori->getKategori();
		// var_dump($data);die();
		echo json_encode($data);
	}
	public function tambahData(){
		$nama_kategori = $this->input->post('nama_kategori');
		if($nama_kategori == ""){
			$result['pesan'] = "nama kategori harus diisi";
		}else{
			$result['pesan']="";
			$data = array('nama_kategori' => $nama_kategori);
			$this->mKategori->insertKategori($data);
		}
		echo json_encode($result);
	}
	public function ambilId(){
		$id_kategori = $this->input->post('id_kategori');
		$where = array('id_kategori' => $id_kategori);
		$data = $this->mKategori->ambilId($where);
		echo json_encode($data);
	}
	public function updateData(){
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		if($nama_kategori == ""){
			$result['pesan'] = "nama kategori harus diisi";
		}else{
			$result['pesan']="";
			$data = array(
				'id_kategori'	=> $id_kategori,
				'nama_kategori' => $nama_kategori
			);
			$this->mKategori->updateKategori($data);
		}
		// var_dump($result);die();
		echo json_encode($result);
	}
	public function hapusData(){
		$id_kategori = $this->input->post('id_kategori');
		$data = array('id_kategori'	=> $id_kategori);
		$this->mKategori->deleteKategori($data);
	}
	// public function ubahData(){
	// 	$id_kategori = $this->input->post('id_kategori');
	// 	$nama_kategori = $this->input->post('nama_kategori');
	// 	if($nama_kategori == ""){
	// 		$result['pesan'] = "nama Kategori harus diisi";
	// 	}else{
	// 		$result['pesan']="";
	// 		// $where = array('id_kategori' => $id_kategori);
	// 		$data = array(
	// 			'id_kategori'	=> $id_kategori,
	// 			'nama_kategori' => $nama_kategori
	// 		);
	// 		$this->mKategori->updateKategori($data);
	// 	}
	// 	echo json_encode($result);
	// }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */