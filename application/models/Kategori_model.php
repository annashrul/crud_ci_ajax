<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function getKategori(){
		$query = $this->db->get('tbl_kategori');
		return $query->result();
	}
	public function insertKategori($data){
		$this->db->insert('tbl_kategori',$data);
	}
	public function ambilId($where){
		$query = $this->db->get_where('tbl_kategori',$where);
		return $query->result();
	}
	public function updateData($data){
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->update('tbl_kategori',$data);
	}
	public function deleteKategori($data){
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->delete('tbl_kategori',$data);
	}

	// public function updateData($data){
	// 	$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
	// 	$this->db->update('kategori_berita',$data);
	// }
}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */