<?php 

	class MDaftarAdmin extends CI_Model{	
		function cek_username($table,$where){		
			return $this->db->get_where($table,$where);
		}	

		function insert_admin($data,$table){
			$this->db->insert($table,$data);
		}
		
	}