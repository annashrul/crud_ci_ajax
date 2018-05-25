<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function tambah_akun_karyawan($data){
		$this->db->insert('data_users',$data);
		$id = $this->db->insert_id();
		if(isset($id)){
			return $id;
		}else{
			return false;
		}
	}
	public function tambah_data_karyawan($data){
   	$this->db->insert('data_users', $data);
 	}
	public function login($username,$password){
		$query = $this->db->get_where('tbl_admin',array('username' => $username,'password' => $password));
		if($query->num_rows() >0){
			return 1;
		}else{
			return 0;
		}
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */