<?php 
 
class MCrudSU extends CI_Model{
	function tampil_dataAdmin(){
		return $this->db->get('admin');
	}

	function tampil_dataAnggota(){
		return $this->db->get('anggota');
	}

	function tampil_dataFakultas(){
		return $this->db->get('fakultas');
	}

	function tampil_dataAmanah(){
		return $this->db->get('amanah');
	}	

	function tampil_dataKDR(){
		return $this->db->get('status_kdr');
	}	

	function tampil_dataExc(){
		return $this->db->get('status_exc');
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

	function getWhere($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function insert($data,$table){
		$this->db->insert($table,$data);
	}

	function getAnggotaByFak($where){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('kode_fakultas',$where);
		$this->db->join('amanah','anggota.kode_amanah = amanah.kode_amanah');
		$this->db->join('status_kdr','anggota.kode_kdr = status_kdr.kode_kdr');
		$this->db->join('status_exc','anggota.kode_exc = status_exc.kode_exc');
		$query = $this->db->get(); 
		return $query->result(); 	
	}

	function getAnggotaByKDR($where){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('kode_kdr',$where);
		$this->db->join('fakultas','anggota.kode_fakultas = fakultas.kode_fakultas');
		$this->db->join('amanah','anggota.kode_amanah = amanah.kode_amanah');
		$this->db->join('status_exc','anggota.kode_exc = status_exc.kode_exc');
		$query = $this->db->get(); 
		return $query->result(); 	
	}

}