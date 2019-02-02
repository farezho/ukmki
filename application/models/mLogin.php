<?php 

	class MLogin extends CI_Model{	
		function cekUnameAdmin($table,$where){
			return $this->db->get_where($table,$where);
		}

		function cekAdmin($table,$where){		
			return $this->db->get_where($table,$where);
		}	
	
		function cekUnameSU($table,$where){
			return $this->db->get_where($table,$where);
		}

		function cekSU($table,$where){		
			return $this->db->get_where($table,$where);
		}

	}