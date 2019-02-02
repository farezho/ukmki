<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mCrud');
		$this->load->model('mCrudAnggota');
		$this->load->helper('email');
		$this->load->helper('url');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	public function index(){
		$data['anggota'] = $this->mCrudAnggota->tampil_dataAnggota()->result();
		$data['anggota'] = $this->mCrudAnggota->getAllDesc();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarAdmin',$data);
		$this->load->view('view_ukmki/vKontenDashboard',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	public function changePassword($username){
		$where = array('username' => $username);
		$data['admin'] = $this->mCrud->getAdmin($where,'admin')->result();
		$this->load->view('view_ukmki/vUbahPass',$data);
	}

	public function action_changePass(){
		$username = $this->input->post('username'); 

		/*pass username dari database*/
		$getPass = $this->input->post('getPass'); 
		
		/*current password dan password baru dari inputan*/
		$c_pass = $this->input->post('c-password');
		$c_pass = md5($c_pass);
		$password = $this->input->post('password');
		$password = md5($password);
		$re_pass = $this->input->post('re-password');
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
		 	$this->mCrud->updatePass($where,$data,'admin');

			echo "<script>alert('Edit Success!');
			window.location.href='lihatAdmin';
			</script>";
		}
	}

	public function lihatAdmin(){
		$data['admin'] = $this->mCrud->tampil_dataAdmin()->result();
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarAdmin',$data);
		$this->load->view('view_ukmki/vLihatAdmin',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	public function lihatAnggota(){
		$data['anggota'] = $this->mCrudAnggota->tampil_dataAnggota()->result();
		$data['anggota'] = $this->mCrudAnggota->getAllDesc();
		$this->load->view('view_ukmki/vLihatAnggota',$data);
	}

	public function filterFakultas($kodeFak){
		$data['kode'] = $this->uri->segment(3); //dapatkan kode fakultas dari url
		
		$where = $kodeFak;
		$data['anggota'] = $this->mCrud->getAnggotaByFak($where);
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarAdmin',$data);
		$this->load->view('view_ukmki/vFilterFak',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	public function filterKDR($kodeKDR){
		$data['kode'] = $this->uri->segment(3); //dapatkan kode KDR dari url

		$where = $kodeKDR;
		$data['anggota'] = $this->mCrud->getAnggotaByKDR($where);
		$this->load->view('view_ukmki/vHeader',$data);
		$this->load->view('view_ukmki/vSidebarAdmin',$data);
		$this->load->view('view_ukmki/vFilterKDR',$data);
		$this->load->view('view_ukmki/vFooter',$data);
	}

	function exportExcelFak($kode){
		$getCode = $kode;
		//echo "$getCode";

		// load excel library
        $this->load->library('excel');
        $anggotaInfo = $this->mCrud->getAnggotaByFak($getCode);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Lengkap');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Alamat');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'No. HP');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Amanah');  
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Status KDR');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Status Exc');  
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Nama Mentor');  
       
        // set Row
        $rowCount = 2;
        foreach ($anggotaInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element->nama_lengkap);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->nim);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->alamat);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->no_hp);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->deskripsi_amanah);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->deskripsi_kdr);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->deskripsi_exc);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->nama_mentor);
            $rowCount++;
        }
        
        //Save as an Excel BIFF (xls) file
	    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');

	    header('Content-Type: application/vnd.ms-excel');
	     header('Content-Disposition: attachment;filename="dataAnggota-'.$getCode.'.xls"');
	    header('Cache-Control: max-age=0');

	    $objWriter->save('php://output');
	    exit();  
	}

	function exportExcelKDR($kode){
		$getCode = $kode;

		// load excel library
        $this->load->library('excel');
        $anggotaInfo = $this->mCrud->getAnggotaByKDR($getCode);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Nama Lengkap');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Fakultas');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Alamat');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'No Handphone');  
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Amanah');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Status Exc');  
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Nama Mentor');  
       
        // set Row
        $rowCount = 2;
        foreach ($anggotaInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element->nama_lengkap);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->nim);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->deskripsi);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->alamat);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->no_hp);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->deskripsi_amanah);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->deskripsi_exc);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->nama_mentor);
            $rowCount++;
        }
        
        //set status kaderisasi dari kode yang didapat
        if ($getCode == 1) {
			$kdr = "Pra-mula";
		}elseif ($getCode == 2) {
			$kdr = "Mula";
		}elseif ($getCode == 3) {
			$kdr = "Madya";
		}else{
			$kdr = "Utama";
		}

        //Save as an Excel BIFF (xls) file
	    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');

	    header('Content-Type: application/vnd.ms-excel');
	     header('Content-Disposition: attachment;filename="dataAnggota-'.$kdr.'.xls"');
	    header('Cache-Control: max-age=0');

	    $objWriter->save('php://output');
	    exit();  
	}

}