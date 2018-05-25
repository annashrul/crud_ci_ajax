<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_page extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function listPage(){
		$query = $this->db->get('kategori_berita');
		return $query->result();
	}
	public function tambahData($data){
		$this->db->insert('kategori_berita',$data);
	}
	public function ambilId($where){
		$query = $this->db->get_where('kategori_berita',$where);
		return $query->result();
	}
	public function updateData($data){
		$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
		$this->db->update('kategori_berita',$data);
	}
	public function deleteData($data){
		$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
		$this->db->delete('kategori_berita',$data);
	}
	public function slug(){
		$query = $this->db->query('SELECT * FROM kategori_berita');
		return $query->row();
	}

}

/* End of file M_page.php */
/* Location: ./application/models/M_page.php */