<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mDaftarAdmin');
		$this->load->model('mCrudSU');
		$this->load->model('mCrudAnggota');
		$this->load->helper('email');
		$this->load->helper('url');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index(){
		$data['anggota'] = $this->mCrudSU->tampil_dataAnggota()->result();
		$data['anggota'] = $this->mCrudSU->getAllDesc();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vKontenDashboard',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	public function lihatAdmin(){
		$data['admin'] = $this->mCrudSU->tampil_dataAdmin()->result();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vLihatAdminSU',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	public function addAdmin(){
		$this->load->view('view_ukmki/vAddAdmin');
	}

	public function aksi_addAdmin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		$re_pass = $this->input->post('re-password');
		$re_pass = md5($re_pass);
		$nama = $this->input->post('name');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('address');

		$where = array(
			'username' => $username
		);

		$cek_username = $this->mDaftarAdmin->cek_username("admin",$where)->num_rows();
		if ($cek_username > 0) {
			echo "<script>alert('Username sudah tersedia');
			window.location.href='addAdmin';
			</script>";
		}else if (strcmp($password, $re_pass) != 0) {
			echo "<script>alert('Password dan Re-type Password tidak sama');
			window.location.href='addAdmin';
			</script>";
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<script>alert('Email yang dimasukkan tidak valid');
			window.location.href='addAdmin';
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
			echo "<script>alert('Registration Success!');
			window.location.href='lihatAdmin';
			</script>";
		}
	}

	public function changePassword($username){
		$where = array('username' => $username);
		$data['admin'] = $this->mCrudSU->getWhere($where,'superuser')->result();
		$this->load->view('view_ukmki/vUbahPassSU',$data);
	}

	public function action_changePass(){
		$username = $this->input->post('username'); 

		/*pass username dari database*/
		$getPass = strtolower($this->input->post('getPass')); 
		
		/*current password dan password baru dari inputan*/
		$c_pass = strtolower($this->input->post('c-password'));
		$c_pass = md5($c_pass);
		$password = strtolower($this->input->post('password'));
		$password = md5($password);
		$re_pass = strtolower($this->input->post('re-password'));
		$re_pass = md5($re_pass);	

		/*echo "$getPass<br/>$c_pass<br/>";;*/	

		if (strcmp($getPass, $c_pass) != 0){
			echo "<script>alert('Current password is incorrect!');
			window.location.href='index';
			</script>";
		}else if (strcmp($password, $re_pass) != 0) {
			echo "<script>alert('Password and re-type password doesnt match');
			window.location.href='index';
			</script>";
		}else{
			$data = array(
				'password' => $password
			);

			$where = array(
				'username' => $username
			);		
		 	$this->mCrudSU->update($where,$data,'superuser');

			echo "<script>alert('Edit Success!');
			window.location.href='index';
			</script>";
		}
	}

	function editAdmin($username){
		$where = array('username' => $username);
		$data['admin'] = $this->mCrudSU->getWhere($where,'admin')->result();
		$this->load->view('view_ukmki/vEditAdmin',$data);
	}

	function aksi_editAdmin(){
		$username = $this->input->post('username');
		$nama = $this->input->post('name');
		$password = strtolower($this->input->post('password'));
		$password = md5($password);
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('address');
	 
		$data = array(
			'nama_lengkap' => $nama,
			'username' => $username,
			'password' => $password,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'email' => $email
		);
	 
		$where = array(
			'username' => $username
		);		
	 	$this->mCrudSU->update($where,$data,'admin');

		echo "<script>alert('Edit Success!');
			window.location.href='lihatAdmin';
			</script>";
	}

	function hapusAdmin($username){
		$where = array('username' => $username);
		$this->mCrudSU->hapus($where,'admin');
		echo "<script>alert('Delete Success!');
			 window.location.href = '" . base_url() . "superuser/lihatAdmin';
			</script>";
	}

	public function filterFakultas($kodeFak){
		$data['kode'] = $this->uri->segment(3); //dapatkan kode fakultas dari url
		
		$where = $kodeFak;
		$data['anggota'] = $this->mCrudSU->getAnggotaByFak($where);
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vFilterFakSU',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	public function filterKDR($kodeKDR){
		$data['kode'] = $this->uri->segment(3); //dapatkan kode KDR dari url

		$where = $kodeKDR;
		$data['anggota'] = $this->mCrudSU->getAnggotaByKDR($where);
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vFilterKDRSU',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	public function lihatFakultas(){
		$data['fakultas'] = $this->mCrudSU->tampil_dataFakultas()->result();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vFakultas',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	function addFakultas(){
		$this->load->view('view_ukmki/vAddFakultas');
	}

	function aksi_addFakultas(){
		$kode_fakultas = $this->input->post('kode_fakultas');
		$deskripsi = $this->input->post('deskripsi');

		$where = array(
			'kode_fakultas' => $kode_fakultas
		);

		$cek_fakultas = $this->mCrudSU->getWhere($where,"fakultas")->num_rows();
		if ($cek_fakultas > 0) {
			echo "<script type='text/javascript'>alert('Kode fakultas sudah terdaftar!');window.location.replace('http://localhost/ukmki/superuser/lihatFakultas'); </script>";
		}else{
			$data = array(
				'kode_fakultas' => $kode_fakultas,
				'deskripsi' => $deskripsi
			);

			$insert = $this->mCrudSU->insert($data,"fakultas");
			echo "<script type='text/javascript'>alert('New Faculty Added!');window.location.replace('http://localhost/ukmki/superuser/lihatFakultas'); </script>";
		}
	}

	function editFakultas($kode_fakultas){
		$where = array('kode_fakultas' => $kode_fakultas);
		$data['fakultas'] = $this->mCrudSU->getWhere($where,'fakultas')->result();
		$this->load->view('view_ukmki/vEditFakultas',$data);
	}

	function aksi_editFakultas(){
		$kode_fakultas = $this->input->post('kode_fakultas');
		$deskripsi = $this->input->post('deskripsi');

		$data = array(
			'kode_fakultas' => $kode_fakultas,
			'deskripsi' => $deskripsi
		);

		$where = array(
			'kode_fakultas' => $kode_fakultas
		);

		$this->mCrudSU->update($where,$data,'fakultas');
		echo "<script type='text/javascript'>alert('Edit Success!');window.location.replace('http://localhost/ukmki/superuser/lihatFakultas') ; </script>";
	}

	function hapusFakultas($kode_fakultas){
		$where = array('kode_fakultas' => $kode_fakultas);
		$this->mCrudSU->hapus($where,'fakultas');
		echo "<script type='text/javascript'>alert('Delete Success!');window.location.replace('http://localhost/ukmki/superuser/lihatFakultas'); </script>";
	}

	public function lihatAmanah(){
		$data['amanah'] = $this->mCrudSU->tampil_dataAmanah()->result();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vAmanah',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	function addAmanah(){
		$this->load->view('view_ukmki/vAddAmanah');
	}

	function aksi_addAmanah(){
		$deskripsi_amanah = $this->input->post('deskripsi_amanah');

		$where = array(
			'deskripsi_amanah' => $deskripsi_amanah
		);

		$cek_amanah = $this->mCrudSU->getWhere($where,"amanah")->num_rows();
		if ($cek_amanah > 0) {
			echo "<script type='text/javascript'>alert('Amanah sudah terdaftar!');window.location.replace('http://localhost/ukmki/superuser/lihatAmanah'); </script>";
		}else{
			$data = array(
				'deskripsi_amanah' => $deskripsi_amanah
			);

			$insert = $this->mCrudSU->insert($data,"amanah");
			echo "<script type='text/javascript'>alert('New Position Added!');window.location.replace('http://localhost/ukmki/superuser/lihatAmanah'); </script>";
		}
	}

	function editAmanah($kode_amanah){
		$where = array('kode_amanah' => $kode_amanah);
		$data['amanah'] = $this->mCrudSU->getWhere($where,'amanah')->result();
		$this->load->view('view_ukmki/vEditAmanah',$data);
	}

	function aksi_editAmanah(){
		$kode_amanah = $this->input->post('kode_amanah');
		$deskripsi_amanah = $this->input->post('deskripsi_amanah');

		$data = array(
			'kode_amanah' => $kode_amanah,
			'deskripsi_amanah' => $deskripsi_amanah
		);

		$where = array(
			'kode_amanah' => $kode_amanah
		);

		$this->mCrudSU->update($where,$data,'amanah');
		echo "<script type='text/javascript'>alert('Edit Success!');window.location.replace('http://localhost/ukmki/superuser/lihatAmanah') ; </script>";
	}

	function hapusAmanah($kode_amanah){
		$where = array('kode_amanah' => $kode_amanah);
		$this->mCrudSU->hapus($where,'amanah');
		echo "<script type='text/javascript'>alert('Delete Success!');window.location.replace('http://localhost/ukmki/superuser/lihatAmanah'); </script>";
	}

	public function lihatKDR(){
		$data['kdr'] = $this->mCrudSU->tampil_dataKDR()->result();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vKDR',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	function addKDR(){
		$this->load->view('view_ukmki/vAddKDR');
	}

	function aksi_addKDR(){
		$deskripsi_kdr = $this->input->post('deskripsi_kdr');

		$where = array(
			'deskripsi_kdr' => $deskripsi_kdr
		);

		$cek_kdr = $this->mCrudSU->getWhere($where,"status_kdr")->num_rows();
		if ($cek_kdr > 0) {
			echo "<script type='text/javascript'>alert('KDR sudah terdaftar!');window.location.replace('http://localhost/ukmki/superuser/lihatKDR'); </script>";
		}else{
			$data = array(
				'deskripsi_kdr' => $deskripsi_kdr
			);

			$insert = $this->mCrudSU->insert($data,"status_kdr");
			echo "<script type='text/javascript'>alert('New KDR Added!');window.location.replace('http://localhost/ukmki/superuser/lihatKDR'); </script>";
		}
	}	

	function editKDR($kode_kdr){
		$where = array('kode_kdr' => $kode_kdr);
		$data['kdr'] = $this->mCrudSU->getWhere($where,'status_kdr')->result();
		$this->load->view('view_ukmki/vEditKDR',$data);
	}

	function aksi_editKDR(){
		$kode_kdr = $this->input->post('kode_kdr');
		$deskripsi_kdr = $this->input->post('deskripsi_kdr');

		$data = array(
			'kode_kdr' => $kode_kdr,
			'deskripsi_kdr' => $deskripsi_kdr
		);

		$where = array(
			'kode_kdr' => $kode_kdr
		);

		$this->mCrudSU->update($where,$data,'status_kdr');
		echo "<script type='text/javascript'>alert('Edit Success!');window.location.replace('http://localhost/ukmki/superuser/lihatKDR') ; </script>";
	}

	function hapusKDR($kode_kdr){
		$where = array('kode_kdr' => $kode_kdr);
		$this->mCrudSU->hapus($where,'status_kdr');
		echo "<script type='text/javascript'>alert('Delete Success!');window.location.replace('http://localhost/ukmki/superuser/lihatKDR'); </script>";
	}

	public function lihatExc(){
		$data['exc'] = $this->mCrudSU->tampil_dataExc()->result();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarSU',$data);
		$this->load->view('view_ukmki/vExc',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	function addExc(){
		$this->load->view('view_ukmki/vAddExc');
	}

	function aksi_addExc(){
		$deskripsi_exc = $this->input->post('deskripsi_exc');

		$where = array(
			'deskripsi_exc' => $deskripsi_exc
		);

		$cek_exc = $this->mCrudSU->getWhere($where,"status_exc")->num_rows();
		if ($cek_exc > 0) {
			echo "<script type='text/javascript'>alert('Excellencia sudah terdaftar!');window.location.replace('http://localhost/ukmki/superuser/lihatExc'); </script>";
		}else{
			$data = array(
				// 'kode_exc' => $kode_exc,
				'deskripsi_exc' => $deskripsi_exc
			);

			$insert = $this->mCrudSU->insert($data,"status_exc");
			echo "<script type='text/javascript'>alert('New Excellencia Added!');window.location.replace('http://localhost/ukmki/superuser/lihatExc'); </script>";
		}
	}	

	function editExc($kode_exc){
		$where = array('kode_exc' => $kode_exc);
		$data['exc'] = $this->mCrudSU->getWhere($where,'status_exc')->result();
		$this->load->view('view_ukmki/vEditExc',$data);
	}

	function aksi_editExc(){
		$kode_exc = $this->input->post('kode_exc');
		$deskripsi_exc = $this->input->post('deskripsi_exc');

		$data = array(
			'kode_exc' => $kode_exc,
			'deskripsi_exc' => $deskripsi_exc
		);

		$where = array(
			'kode_exc' => $kode_exc
		);

		$this->mCrudSU->update($where,$data,'status_exc');
		echo "<script type='text/javascript'>alert('Edit Success!');window.location.replace('http://localhost/ukmki/superuser/lihatExc') ; </script>";
	}


	function hapusExc($kode_exc){
		$where = array('kode_exc' => $kode_exc);
		$this->mCrudSU->hapus($where,'status_exc');
		echo "<script type='text/javascript'>alert('Delete Success!');window.location.replace('http://localhost/ukmki/superuser/lihatExc'); </script>";
	}

}