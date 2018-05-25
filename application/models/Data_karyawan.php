<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_karyawan extends CI_Model {

	// $this->db->insert('transaksi_header',$data);
 //  $insert_id=  $this->db->query("select id_transaksi_header from transaksi_header order by id_transaksi_header desc")->row_array();
 //  $this->db->query("update transaksi_details set id_transaksi_header='".$insert_id['id_transaksi_header']."'");

	public function tambah_akun($data){
	  $this->db->insert('users', $data);
	  $id = $this->db->insert_id();
	  if (isset($id)) {
	  	return $id;
	  }else{
	  	return FALSE;
	  }
	  // $retVal = (condition) ? a : b ;
	  // return (isset($id)) ? $id : FALSE;
 	}
 	public function tambah_karyawan($data){
   	$this->db->insert('data_users', $data);
 	}

}

/* End of file Data_karyawan.php */
/* Location: ./application/models/Data_karyawan.php */