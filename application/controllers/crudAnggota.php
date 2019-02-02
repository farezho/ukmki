<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CrudAnggota extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mCrudAnggota');
		$this->load->helper('email');
		$this->load->helper('url');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function addAnggota(){
		$this->load->view('view_ukmki/vAddAnggota');
	}

	public function aksi_addAnggota($level){
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nim = $this->input->post('nim');
		$fakultas = $this->input->post('fakultas');
		$alamat = $this->input->post('address');
		$no_hp = $this->input->post('no_hp');
		$amanah = $this->input->post('amanah');
		$status_kdr = $this->input->post('status_kdr');
		$status_mentoring = $this->input->post('status_mentoring');
		if ($status_mentoring == 1) {
			$nama_mentor = $this->input->post('nama_mentor');
		}else{
			$nama_mentor = "-";
		}

		$where = array(
			'nim' => $nim
		);

		$cek_nim = $this->mCrudAnggota->cek_nim("anggota",$where)->num_rows();
		if ($cek_nim > 0) {
			if ($level == "SU") {
				echo "<script type='text/javascript'>alert('NIM sudah terdaftar!');window.location.replace('http://localhost/ukmki/superuser'); </script>";
			}else{
				echo "<script type='text/javascript'>alert('NIM sudah terdaftar!');
				window.location.replace('http://localhost/ukmki/admin');
				</script>";
			}
		}else{
			$data = array(
				'nama_lengkap' => $nama_lengkap,
				'nim' => $nim,
				'kode_fakultas' => $fakultas,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
				'kode_amanah' => $amanah,
				'kode_kdr' => $status_kdr,
				'kode_exc' => $status_mentoring,
				'nama_mentor' => $nama_mentor 
			);

			$insert = $this->mCrudAnggota->insert_anggota($data,"anggota");
			
			echo "<script type='text/javascript'>alert('Add Member Success!');window.location.replace('http://localhost/ukmki/crudAnggota/lihatAnggota/$level') ; </script>";
		}
	}

	public function lihatAnggota($level){
		$data['anggota'] = $this->mCrudAnggota->tampil_dataAnggota()->result();
		$data['anggota'] = $this->mCrudAnggota->getAllDesc();
		if ($level == "SU") {
			$this->load->view('view_ukmki/vHeader',$data);
			$this->load->view('view_ukmki/vSidebarSU',$data);
			$this->load->view('view_ukmki/vLihatAnggotaSU',$data);
			$this->load->view('view_ukmki/vFooter',$data);
		}else{
			$this->load->view('view_ukmki/vHeader',$data);
			$this->load->view('view_ukmki/vSidebarAdmin',$data);
			$this->load->view('view_ukmki/vLihatAnggota',$data);
			$this->load->view('view_ukmki/vFooter',$data);
		}
	}

	function editAnggota($nim){
		$where = $nim;
		$data['anggota'] = $this->mCrudAnggota->getAnggota($where);
		$this->load->view('view_ukmki/vEditAnggota',$data);
	}

	function aksi_editAnggota($level){
		$nim = $this->input->post('nim');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$fakultas = $this->input->post('fakultas');
		$alamat = $this->input->post('address');
		$no_hp = $this->input->post('no_hp');
		$amanah = $this->input->post('amanah');
		$status_kdr = $this->input->post('status_kdr');
		$status_mentoring = $this->input->post('status_mentoring');
		if ($status_mentoring == 1) {
			$nama_mentor = $this->input->post('nama_mentor');
		}else{
			$nama_mentor = "-";
		}

		$data = array(
			'nama_lengkap' => $nama_lengkap,
			#'nim' => $nim,
			'kode_fakultas' => $fakultas,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'kode_amanah' => $amanah,
			'kode_kdr' => $status_kdr,
			'kode_exc' => $status_mentoring,
			'nama_mentor' => $nama_mentor
		);
	 
		$where = array(
			'nim' => $nim
		);

		/*$cek_nim = $this->mCrudAnggota->cek_nim("anggota",$where)->num_rows();
		if ($cek_nim > 0) {
			if ($level == "SU") {
				echo "<script type='text/javascript'>alert('NIM sudah terdaftar!');window.location.replace('http://localhost/ukmki/superuser'); </script>";
			}else{
				echo "<script type='text/javascript'>alert('NIM sudah terdaftar!');
				window.location.replace('http://localhost/ukmki/admin');
				</script>";
			}
		}else{*/
			$this->mCrudAnggota->updateAnggota($where,$data,'anggota');

			echo "<script type='text/javascript'>alert('Edit Member Success!');window.location.replace('http://localhost/ukmki/crudAnggota/lihatAnggota/$level') ; </script>";
		#}
	}

	function hapusAnggota($nim, $level){
		$where = array('nim' => $nim);
		$this->mCrudAnggota->hapusAnggota($where,'anggota');
		echo "<script type='text/javascript'>alert('Delete Success!');window.location.replace('http://localhost/ukmki/crudAnggota/lihatAnggota/$level'); </script>";
	}
}