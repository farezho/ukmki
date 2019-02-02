<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBug extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	public function report($level){
		if ($level == "SU") {
			$this->load->view('view_ukmki/vHeader');
			$this->load->view('view_ukmki/vSidebarSU');
			$this->load->view('view_ukmki/vReport');
			$this->load->view('view_ukmki/vFooter');
		}else{
			$this->load->view('view_ukmki/vHeader');
			$this->load->view('view_ukmki/vSidebarAdmin');
			$this->load->view('view_ukmki/vReport');
			$this->load->view('view_ukmki/vFooter');
		}
		
	}
}