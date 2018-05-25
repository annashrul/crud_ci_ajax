<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
		$this->load->view('auth/login',array('title' => 'login'));
	}
	public function login(){
		// $username = $this->input->post('username');
	}
	public function register(){
		/*-----------Menangkap Data Dari Form------------------*/
		$input = $this->input->post();
	  $akun_karyawan = array(
	    'username' 	=> $input['username'],
	    'password' 	=> md5($input['password']),
	    'level' 		=> $input['level'],
	    'active' 		=> $input['active']
	  );
	  /*-------Mengambil id users dan mengirimkan ke model-----*/
	  $id_akun = $this->auth_model->tambah_akun_karyawan($akun_karyawan);
	  /*-----------Menangkap Data Dari Form------------------*/
	  $data_karyawan = array(
	    'nama' 			=> $input['nama'],
	    'jenkel' 		=> $input['jenkel'],
	    'tgl_lahir' => $input['tgl'],
	    'alamat' 		=> $input['alamat'],
	    'akun'     	=> $id_akun
	  ); //Memasukan id yang ada di variabel $id_akun
	  $proses = $this->auth_model->tambah_data_karyawan($data_karyawan); //mengirimkan data ke model
	  // redirect('karyawan/input'); //mengembalikan halaman setelah berhasil menginputkan data
	  echo json_encode($proses);
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */