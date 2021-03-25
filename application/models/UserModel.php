<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

  public function getAllUser($filter = []){
		if(isset($filter['isSimple'])){
			$this->db->select('u.id_user, u.nama');
		} else {
			$this->db->select("u.*, r.*");
		}
		$this->db->from('user as u');
		$this->db->join('role as r', 'r.id_role = u.id_role');
		// $this->db->join('kabupaten as k', 'k.id_kabupaten = u.id_kabupaten','left');

		if(isset($filter['username'])) $this->db->where('u.username', $filter['username']);
		if(isset($filter['id_user'])) $this->db->where('u.id_user', $filter['id_user']);
    	$res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_user');
	}

	public function getUser($idUser = NULL){
		$row = $this->getAllUser(['id_user' => $idUser]);
		if (empty($row)){
			throw new UserException("User yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idUser];
	}
	
	public function editPhoto($idUser,$newPhoto){
		$this->db->set('photo',$newPhoto);
		$this->db->where('id_user',$idUser);
		$this->db->update('user');
		return $newPhoto;
	}
	
	public function changePassword($data){
		$this->db->set('password',md5($data['password']));
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user');
		return 'succes';
	}
	public function editUser($tmpdata){
		$data = array( 
			'username' => $tmpdata['username'],
			'nama' => $tmpdata['nama'],
			);

		$this->db->set($data);
		$this->db->where('id_user',$tmpdata['id_user']);
		$this->db->update('user');
		
		return $tmpdata;
	}


	public function getUserByUsername($username = NULL){
		$row = $this->getAllUser(['username' => $username]);
		if (empty($row)){
			throw new UserException("User yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return array_values($row)[0];
	}
		
	public function login($loginData){
		
		$user = $this->getUserByUsername($loginData['username']);
		// var_dump($user);
		if(md5($loginData['password']) != $user['password'])
			throw new UserException("Password yang kamu masukkan salah.", WRONG_PASSWORD_CODE);
		return $user;
	}

	public function registerUser($data)
	{
	
		// $this->cekUserByEmailBuyer($data);
		// $this->cekUserByEmailSeller($data);
		// $data['password_hash'] = $data['password'];
		$data['password'] = md5($data['password']);
		// $permitted_activtor = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		// $data['activator'] =  substr(str_shuffle($permitted_activtor), 0, 20);
		// echo $act;
		$this->db->insert('user_temp', DataStructure::slice($data, [
			'username', 'nama', 'password', 'ktp','npwp','swa','dok_pendukung', 'email', 'no_telp', 'pas_photo', 'alamat'
		], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah User", "User");

		$data['id']  = $this->db->insert_id();

		return $data;
	}

}
