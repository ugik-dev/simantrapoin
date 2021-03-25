<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('TestModel');
		 
}

// function index(){
// 		$this->load->view('v_upload');    
// }


function do_upload(){
		$config['upload_path']="./upload/";
		$config['allowed_types']='gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		 var_dump('anjay');
		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
				$data = array('upload_data' => $this->upload->data());

				$judul= $this->input->post('judul');
				$image= $data['upload_data']['file_name']; 
				 
				$result= $this->DetailCagarbudayaModel->simpan_upload($image);
				echo json_decode($result);
		}

 }
}
