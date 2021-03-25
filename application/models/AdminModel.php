<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function getAllKabupaten(){
		$this->db->select('*');
		$this->db->from('kabupaten');
		//if(!empty($filter['id_cagarbudaya'])) $this->db->where('cb.id_cagarbudaya', $filter['id_cagarbudaya']);
		
	    $res = $this->db->get();
	    return DataStructure::keyValue($res->result_array(), 'id_kabupaten');
	}

}
