<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mLogin');

	}

	public function index(){
		$this->load->view('view_ukmki/vLogin');
	}

	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$unameAdmin = array(
			'username' => $username 
		);

		$unameSU = array(
			'username' => $username 
		);

		$whereAdmin = array(
			'username' => $username,
			'password' => md5($password)
		);

		$whereSU = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cekUnameAdmin = $this->mLogin->cekUnameAdmin("admin",$unameAdmin)->num_rows(); 
		$cekAdmin = $this->mLogin->cekAdmin("admin",$whereAdmin)->num_rows();

		$cekUnameSU = $this->mLogin->cekUnameSU("superuser",$unameSU)->num_rows(); 
		$cekSU = $this->mLogin->cekSU("superuser",$whereSU)->num_rows();

		if ($cekUnameAdmin==0 && $cekUnameSU==0) {
			echo "<script>alert('Username not yet registered');
			window.location.href='index';
			</script>"; //window location menunjukkan lokasi current link
		}else if (($cekUnameSU>0) && ($cekSU>0)) { //cek apakah username ada di SU
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'level' => "SU"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("superuser"));
		}else if (($cekUnameAdmin>0) && ($cekAdmin>0)){ //cek apakah username ada di admin
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'level' => "Adm"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
		}else{
			echo "<script>alert('Username atau password salah');
			window.location.href='index';
			</script>"; //window location menunjukkan lokasi current link
		}

		/*if($cek_uname == 0){
 			echo "<script>alert('Username belum tersedia');
			window.location.href='index';
			</script>"; //window location menunjukkan lokasi current link
		}elseif ($cek > 0) {
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
		}else{
			echo "<script>alert('Username atau password salah');
			window.location.href='index';
			</script>"; //window location menunjukkan lokasi current link
		}*/
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}