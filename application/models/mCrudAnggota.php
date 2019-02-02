<?php 
 
class MCrudAnggota extends CI_Model{
	function cek_nim($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function insert_anggota($data,$table){
		$this->db->insert($table,$data);
	}

	function tampil_dataAnggota(){
		return $this->db->get('anggota');
	}

	/*MENDAPATKAN DESKRIPSI DARI FAKULTAS, AMANAH, STATUS KADERISASI DAN STATUS EXCELENCIA*/
	function getAllDesc(){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->join('fakultas','anggota.kode_fakultas = fakultas.kode_fakultas');
		$this->db->join('amanah','anggota.kode_amanah = amanah.kode_amanah');
		$this->db->join('status_kdr','anggota.kode_kdr = status_kdr.kode_kdr');
		$this->db->join('status_exc','anggota.kode_exc = status_exc.kode_exc');
		$query = $this->db->get();  
		return $query->result(); 
	}

	function getAnggota($where){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('nim',$where);
		$this->db->join('fakultas','anggota.kode_fakultas = fakultas.kode_fakultas');
		$this->db->join('amanah','anggota.kode_amanah = amanah.kode_amanah');
		$this->db->join('status_kdr','anggota.kode_kdr = status_kdr.kode_kdr');
		$this->db->join('status_exc','anggota.kode_exc = status_exc.kode_exc');
		$query = $this->db->get(); 
		return $query->result(); 
	}

	function updateAnggota($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapusAnggota($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}