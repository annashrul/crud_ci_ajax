<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Multi_barang_model extends CI_Model {
	public function listBarang(){
		$query = $this->db->get('barang');
		return $query->result();
	}
	function remove_checked_barang() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('msg');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_barang', $delete[$i]);
				$this->db->delete('barang');
			}
		}
	}
}