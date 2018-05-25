<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_page','m');
	}
	public function index(){
		$data = array('title' => 'CRUD AJAX');
		$this->load->view('home',$data);
	}
	public function ambilData(){
		$data = $this->m->listPage();
		echo json_encode($data);
	}
	public function tambahData(){
		$nama_kategori_berita=$this->input->post('nama_kategori_berita');
		if($nama_kategori_berita==''){
			$result['pesan']='Nama Kategori Berita Harus Diisi';
		}else{
			$result['pesan']='';
			$data = array(
				'nama_kategori_berita' => $nama_kategori_berita
			);
			$this->m->tambahData($data);
		}
		echo json_encode($result);
	}
	public function ambilId(){
		$id_kategori_berita = $this->input->post('id_kategori_berita');
		$where = array('id_kategori_berita' => $id_kategori_berita);
		$kategori_berita = $this->m->ambilId($where);
		echo json_encode($kategori_berita);
	}
	public function updateData(){
		$id_kategori_berita=$this->input->post('id_kategori_berita');
		$nama_kategori_berita=$this->input->post('nama_kategori_berita');
		if($nama_kategori_berita==''){
			$result['pesan']='Nama Kategori Berita Harus Diisi';
		}else{
			$result['pesan']='';
			// $where = array('id_kategori_berita' => $id_kategori_berita);
			$data = array(
				'id_kategori_berita'	=> $id_kategori_berita,
				'nama_kategori_berita' => $nama_kategori_berita
			);
			$this->m->updateData($data);
		}
		echo json_encode($result);
	}
	public function deleteData(){
		$id_kategori_berita = $this->input->post('id_kategori_berita');
		$data = array('id_kategori_berita' => $id_kategori_berita);
		$this->m->deleteData($data);
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */