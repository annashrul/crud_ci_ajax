<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$data=array('title' => 'Home');
		$this->load->view('front/home',$data);
	}
	public function get(){
		$kabar = $this->mBarang->get_kategori_barang();
		echo json_encode($kabar);
	}
	public function buy(){
		$data = $this->input->post();
		$data['tanggal_transaksi'] = date("Y-m-d H:i:s");
		$transkasi = $this->mTransaksi->insert_transaksi($data);
		echo json_encode(array("status" => "success"));
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/frontend/Home.php */