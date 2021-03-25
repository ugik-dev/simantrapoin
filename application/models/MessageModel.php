<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageModel extends CI_Model {

    

	  public function sendMessage($data){

          $data['id_user_sending'] = $this->session->userdata('id_user');
          $data['nama_user_sending'] = $this->session->userdata('nama');
          $data['text_message'] = $data['format_message'].$data['message'];
	     $dataInsert = DataStructure::slice($data, ['id_user_sending','nama_user_sending','text_message','id_user_reciver']);
	    $this->db->insert('message', $dataInsert);
	    ExceptionHandler::handleDBError($this->db->error(), "Insert Message", "message");
	    return $this->db->insert_id();
	}
	
	public function getNotRead(){

			$reciver=$this->session->userdata('id_user');
		  $this->db->select('count(id_message) as notread');
		  $this->db->from('message');

		  $this->db->where('status','0');
		  $this->db->where('id_user_reciver',$reciver);
		  $res=$this->db->get();
		  $res=$res->result_array();
		  return $res[0];
  }
  public function getMessage($data){
	$reciver=$this->session->userdata('id_user');
	  $this->db->select('*');
	  $this->db->limit(50);
	  $this->db->from('message');
	  $this->db->order_by('date','desc');
	  $this->db->where('id_user_reciver',$reciver);
	  //$this->db->select('count(id_message)');
	  
	  $res=$this->db->get();
	  $res=$res->result_array();
	  return $res;
}
public function getDetailMessage($data){
	$reciver=$this->session->userdata('id_user');
	  $this->db->select('*');
	  $this->db->from('message');
	  $this->db->order_by('date');
	  $this->db->where('id_user_reciver',$reciver);
	  $this->db->where('id_message',$data['id_message']);
	  //$this->db->select('count(id_message)');
	  
	  $res=$this->db->get();
	  $res=$res->result_array();
	  return $res;
}
public function changeStatus($data){
		$reciver=$this->session->userdata('id_user');
	  $this->db->set('status','1');
	  
	 // $this->db->order_by('date');
	  $this->db->where('id_user_reciver',$reciver);
	  $this->db->where('id_message',$data['id_message']);
	  //$this->db->select('count(id_message)');
	  $this->db->update('message');
	 
	  return 0;
}
public function deleteMessage($data){
	$this->db->where('id_message', $data);
	$this->db->delete('message');

ExceptionHandler::handleDBError($this->db->error(), "Hapus Message", "message");
}

}