<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsahaModel extends CI_Model {

    

	public function getAllJenisOption($filter = []){
		$this->db->select('ko.id_jenis_usaha, ko.nama_jenis_usaha');
		$this->db->from('pariwisata_jenis_usaha as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_jenis_usaha');
	}
    
    public function getAllItemOption($filter = []){
		$this->db->select('ko.id_item_usaha, ko.nama_item_usaha');
		$this->db->from('pariwisata_item_usaha as ko');
		$res=$this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_item_usaha');
	}

  public function getAllUsaha($filter = []){
		$this->db->select('*');
		$this->db->from('pariwisata_usaha as po');
        $this->db->join("pariwisata_jenis_usaha as jo", "po.id_jenis_usaha = jo.id_jenis_usaha");
        $this->db->join("pariwisata_item_usaha as sb", "po.id_item_usaha = sb.id_item_usaha");
		$this->db->join("kabupaten as kab", "kab.id_kabupaten = po.id_kabupaten");
	
		if(!empty($filter['id_usaha'])) $this->db->where('po.id_usaha', $filter['id_usaha']);
		if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('po.id_kabupaten', $this->session->userdata('id_kabupaten'));
	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_usaha');
	}

	public function getUsaha($idUsaha = NULL){
		$row = $this->getAllUsaha(['id_usaha' => $idUsaha]);
		if (empty($row)){
			throw new UserException("Usaha yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idUsaha];
	}

	  public function addUsaha($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		if($this->session->userdata('id_role') == '1'){

		}else{
		  $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
	  };
	    $dataInsert = DataStructure::slice($data, ['tahun_terdata','id_user_entry','id_kabupaten','nama','id_jenis_usaha','id_item_usaha','alamat','lokasi','file','deskripsi']);
	    $this->db->insert('pariwisata_usaha', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Usaha", "pariwisata_usaha");
	    return $this->db->insert_id();
	}
	
	public function editUsaha($data){
		$data['id_user_entry'] = $this->session->userdata('id_user');
		
		if($this->session->userdata('id_role') == '1'){
			$this->db->set(DataStructure::slice($data, ['tahun_terdata','id_kabupaten','nama','id_jenis_usaha','id_item_usaha','alamat','lokasi','file','deskripsi']));
		}else{
			$data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
			$this->db->set(DataStructure::slice($data, ['tahun_terdata','id_user_entry','id_kabupaten','nama','id_jenis_usaha','id_item_usaha','alamat','lokasi','file','deskripsi']));
		
		}
		$this->db->where('id_usaha', $data['id_usaha']);
		$this->db->update('pariwisata_usaha');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Usaha", "pariwisata_usaha");	
		return $data['id_usaha'];
	}
	
	public function deleteUsaha($data){
		$this->db->where('id_usaha', $data['id_usaha']);
		$this->db->delete('pariwisata_usaha');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Usaha", "pariwisata_usaha");
	}




}