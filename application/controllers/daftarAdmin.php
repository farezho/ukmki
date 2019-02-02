<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DaftarAdmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mDaftarAdmin');
		$this->load->helper('email');
	}

	public function index(){
		$this->load->view('view_ukmki/vDaftarAdmin');
	}

	public function aksi_daftar(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		$re_pass = $this->input->post('re-password');
		$re_pass = md5($re_pass);
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');

		/*echo "$username<br/>";
		echo "$password<br/>";
		echo "$re_pass<br/>";
		echo "$nama<br/>";
		echo "$email<br/>";
		echo "$no_hp<br/>";
		echo "$alamat<br/>";*/

		$where = array(
			'username' => $username
		);

		$cek_username = $this->mDaftarAdmin->cek_username("admin",$where)->num_rows();
		if ($cek_username > 0) {
			echo "<script>alert('Username sudah tersedia');
			window.location.href='index';
			</script>";
		}else if (strcmp($password, $re_pass) != 0) {
			echo "<script>alert('Password dan Re-type Password tidak sama');
			window.location.href='index';
			</script>";
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<script>alert('Email yang dimasukkan tidak valid');
			window.location.href='index';
			</script>";
		}else{
			$data = array(
				'nama_lengkap' => $nama,
				'username' => $username,
				'password' => $password,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
				'email' => $email 
			);

			$insert = $this->mDaftarAdmin->insert_admin($data,"admin");
			echo "<script>alert('Add Admin Success');
			window.location.href='index';
			</script>";
		}
	}
}