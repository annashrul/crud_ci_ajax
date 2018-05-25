<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function insert_transaksi($data){
		$query = $this->db->insert('tbl_transaksi',$data);
		return $query;

	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */