<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Multiple_insert extends CI_Controller {
	
	public function index(){
		$this->load->model('multi_barang_model');
		$data['barang'] = $this->multi_barang_model->listBarang();
		$this->load->view('v_barang',$data);
	}
	public function tambah(){
		//$validation = array(
			//array('field' => 'nama_barang[]','rules' => 'required')
		//);
		//$this->form_validation->set_rules($validation);
		$valid = $this->form_validation;
		$valid->set_rules('nama_barang[]','Nama Barang','required');
		$valid->set_rules('stok[]','Stok Barang','required');
		if($valid->run() == true){
			$nama_barang = $this->input->post('nama_barang[]');
			$stok_barang = $this->input->post('stok[]');
		
			$value = array();
			for($i=0;$i<count($nama_barang);$i++){
				$value[$i] = array(
					'nama_barang' => $nama_barang[$i],
					'stok'	=> $stok_barang[$i]
				);
			}
			//foreach($nama_barang as $key){
			//	$value[] = array(
			//		'nama_barang' => $key
			//	);
			//}
			$query = $this->db->insert_batch('barang',$value);
			//echo gettype($query);
			$this->session->set_flashdata('sukses','data berhasil ditambahkan');
			redirect('multiple_insert');
		}
		$this->load->view('multiple_insert');
	}
	
	public function edit(){
		$valid = $this->form_validation;
		$valid->set_rules('nama_barang[]','Nama Barang','required');
		$valid->set_rules('stok[]','Stok Barang','required');
		if($valid->run() == true){
			$id_barang = $this->input->post('id_barang');
			$result = array();
			foreach($id_barang AS $key => $val){
			 $result[] = array(
			  "id_barang" => $id_barang[$key],
			  "nama_barang"  => $_POST['nama_barang'][$key],
			  "stok"  => $_POST['stok'][$key]
			 );
			}
			$this->db->update_batch('barang', $result, 'id_barang');
		}else{
			$this->load->view('multiple_update');
		}
	}
	
	public function delete_multiple() {
		$this->load->model('multi_barang_model');
		$this->multi_barang_model->remove_checked_barang();
		$this->session->set_flashdata('sukses','data berhasil dihapus');
		redirect('multiple_insert');
	}
}