<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('session');
		$this->load->library('encryption');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("customer",$where)->num_rows();		
		
		if($cek > 0){
			$data_session = array(
				'name' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			redirect(base_url());

		}else{
			echo "<h1> Username/Password salah<br>Coba Lagi</h1>";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());}
}

?>