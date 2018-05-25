<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}
	public function index(){
		if(isset($_POST['submit'])){
			// echo "<pre>";
			// var_dump($_POST); die();
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if($username != $this->input->post('username')){
				$this->session->set_flashdata('sukses','username anda salah');
			}else{
				$hasil = $this->auth_model->login($username,$password);
				if($hasil > 0){
					$this->session->set_userdata('username',$username);
					redirect('barang');
				}else{
					redirect('login');
				}
			}
			// echo $hasil;
		}else{
			$data = array('title' => 'Login');
			$this->load->view('login',$data);
		}
	}

	public function registrasi(){
		if(isset($_POST['submit'])){
			$input = $this->input->post();
			$data = array(
				'username' 	=> $input['username'],
				'password'	=> $input['password']
			);
			$this->auth_model->registrasi($data);
			$this->session->set_flashdata('sukses','anda berhasil registrasi');
			redirect('login/registrasi');
		}else{
			$data = array('title' => 'Registrasi');
			$this->load->view('registrasi',$data);
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */