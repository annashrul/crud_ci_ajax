<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function get_barang(){
		
		$query = $this->db->get('tbl_barang');
		return $query->result();
	}
	public function insert_barang($data){
		$this->db->insert('tbl_barang',$data);
	}
	public function ambil_id($where){
		$query = $this->db->get_where('tbl_barang',$where);
		return $query->result();
	}
	public function update_barang($data){
		$this->db->where('id_barang',$data['id_barang']);
		$this->db->update('tbl_barang',$data);
	}
	public function delete_barang($data){
		$this->db->where('id_barang',$data['id_barang']);
		$this->db->delete('tbl_barang',$data);
	}
	public function get_kategori_barang(){
		$this->db->select("tbl_barang.*, tbl_kategori.nama_kategori");
		$this->db->from("tbl_barang");
		$this->db->join("tbl_kategori","tbl_kategori.id_kategori = tbl_barang.id_kategori","LEFT");
		$this->db->order_by("id_barang","DESC");
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */