<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_karyawan');
	}
	public function index()
	{
		$this->load->view('form-input');
	}
	public function proses_input(){
	  /*-----------Menangkap Data Dari Form------------------*/
	  $akun_karyawan = array(
	    'username' 	=> $this->input->post('username'),
	    'password' 	=> md5($this->input->post('password')),
	    'level' 		=> $this->input->post('level'),
	    'active' 		=> $this->input->post('active')
	  );
	  /*-------Mengambil id users dan mengirimkan ke model-----*/
	  $id_akun = $this->data_karyawan->tambah_akun($akun_karyawan);
	  /*-----------Menangkap Data Dari Form------------------*/
	  $data_karyawan = array(
	    'nama' 			=> $this->input->post('nama'),
	    'jenkel' 		=> $this->input->post('jenkel'),
	    'tgl_lahir' => $this->input->post('tgl'),
	    'alamat' 		=> $this->input->post('alamat'),
	    'akun'     	=> $id_akun
	  ); //Memasukan id yang ada di variabel $id_akun
	  $proses = $this->data_karyawan->tambah_karyawan($data_karyawan); //mengirimkan data ke model
	  redirect('karyawan/input'); //mengembalikan halaman setelah berhasil menginputkan data
 	}

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */