<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolahuserModel extends CI_Model
{



	public function getAllRoleOption($filter = [])
	{
		$this->db->select('id_role,nama_role,title_role');
		$this->db->from('role as ko');

		$res = $this->db->get();

		return DataStructure::keyValue($res->result_array(), 'id_role');
	}

	public function getAllKelolahuser($filter = [])
	{
		$this->db->select('*');
		$this->db->from('user as po');
		$this->db->join("role as pjo", "po.id_role = pjo.id_role", 'left');
		// $this->db->join("kabupaten as kab", "kab.level = po.level",'left');


		if (!empty($filter['id_user'])) $this->db->where('po.id_user', $filter['id_user']);

		$res = $this->db->get();
		return DataStructure::keyValue($res->result_array(), 'id_user');
	}

	public function getKelolahuser($idKelolahuser = NULL)
	{
		$row = $this->getAllKelolahuser(['id_desawisata' => $idKelolahuser]);
		if (empty($row)) {
			throw new UserException("Kelolahuser yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idKelolahuser];
	}

	public function addKelolahuser($data)
	{
		$data['password'] =  md5($data['password']);
		$dataInsert = DataStructure::slice($data, ['password', 'username', 'nama', 'id_role', 'email', 'no_telp']);
		$this->db->insert('user', $dataInsert);
		ExceptionHandler::handleDBError($this->db->error(), "Insert Kelolahuser", "user");
		return $this->db->insert_id();
	}

	public function editKelolahuser($data)
	{
		$this->db->set(DataStructure::slice($data, ['username', 'nama', 'id_role', 'email', 'no_telp']));
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah User", "user");
		return $data['id_user'];
	}
	public function editPassword($data)
	{
		$data['password'] =  md5($data['password']);
		$this->db->set(DataStructure::slice($data, ['password']));
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah User", "user");
		return $data['id_user'];
	}

	public function deleteKelolahuser($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user');

		ExceptionHandler::handleDBError($this->db->error(), "Hapus Kelolahuser", "desawisata");
	}
}
