<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserTempModel extends CI_Model
{

    public function getAllUserTemp($filter = [])
    {
        $this->db->select('*');
        $this->db->from('user_temp as po');
        if (!empty($filter['id_user_temp'])) $this->db->where('po.id_user_temp', $filter['id_user_temp']);
        if (!empty($filter['username'])) $this->db->where('po.username', $filter['username']);
        // if (!empty($this->session->userdata('id_kabupaten'))) $this->db->where('po.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        return DataStructure::keyValue($res->result_array(), 'id_user_temp');
    }

    public function getUserTemp($idUserTemp = NULL)
    {
        $row = $this->getAllUserTemp(['id_usaha' => $idUserTemp]);
        if (empty($row)) {
            throw new UserException("UserTemp yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
        }
        return $row[$idUserTemp];
    }

    public function addUserTemp($data)
    {
        $data['id_user_entry'] = $this->session->userdata('id_user');
        if ($this->session->userdata('id_role') == '1') {
        } else {
            $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
        };
        $dataInsert = DataStructure::slice($data, ['tahun_terdata', 'id_user_entry', 'id_kabupaten', 'nama', 'id_jenis_usaha', 'id_item_usaha', 'alamat_user', 'lokasi', 'file', 'deskripsi']);
        $this->db->insert('pariwisata_usaha', $dataInsert);
        ExceptionHandler::handleDBError($this->db->error(), "Insert UserTemp", "pariwisata_usaha");
        return $this->db->insert_id();
    }

    public function accept($data)
    {
        // $data['user_accept'] = $this->session->userdata('id_user');
        $t = time();
        $time = date("Y-m-d H:m:d", $t);
        $data['date_accept'] = 'current_timestamp()';
        $data['id_role'] = '99';
        // if ($this->session->userdata('id_role') == '1') {
        // } else {
        // $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
        // };
        $dataInsert = DataStructure::slice($data, ['username', 'nama', 'alamat_user', 'id_role', 'email', 'no_telp', 'password', 'ktp', 'npwp', 'swa', 'pas_photo']);
        $this->db->insert('user', $dataInsert);
        ExceptionHandler::handleDBError($this->db->error(), "Accept User", "user");
        $id_user = $this->db->insert_id();

        $this->db->set('accept', '1');
        $this->db->set('user_accept', $this->session->userdata('id_user'));
        $this->db->set('date_accept', $time);
        $this->db->where('id_user_temp', $data['id_user_temp']);
        $this->db->update('user_temp');
        ExceptionHandler::handleDBError($this->db->error(), "Ubah UserTemp", "user_temp");
    }

    public function not_accept($data)
    {
        // $data['user_accept'] = $this->session->userdata('id_user');
        $t = time();
        $time = date("Y-m-d H:m:d", $t);
        $this->db->set('accept', '2');
        $this->db->set('user_accept', $this->session->userdata('id_user'));
        $this->db->set('date_accept', $time);
        $this->db->where('id_user_temp', $data['id_user_temp']);
        $this->db->update('user_temp');
        ExceptionHandler::handleDBError($this->db->error(), "Ubah UserTemp", "user_temp");
    }

    public function editUserTemp($data)
    {
        $data['id_user_entry'] = $this->session->userdata('id_user');

        if ($this->session->userdata('id_role') == '1') {
            $this->db->set(DataStructure::slice($data, ['tahun_terdata', 'id_kabupaten', 'nama', 'id_jenis_usaha', 'id_item_usaha', 'alamat_user', 'lokasi', 'file', 'deskripsi']));
        } else {
            $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
            $this->db->set(DataStructure::slice($data, ['tahun_terdata', 'id_user_entry', 'id_kabupaten', 'nama', 'id_jenis_usaha', 'id_item_usaha', 'alamat_user', 'lokasi', 'file', 'deskripsi']));
        }
        $this->db->where('id_usaha', $data['id_usaha']);
        $this->db->update('pariwisata_usaha');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah UserTemp", "pariwisata_usaha");
        return $data['id_usaha'];
    }

    public function deleteUserTemp($data)
    {
        $this->db->where('id_usaha', $data['id_usaha']);
        $this->db->delete('pariwisata_usaha');

        ExceptionHandler::handleDBError($this->db->error(), "Hapus UserTemp", "pariwisata_usaha");
    }
}
