<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServiceModel extends CI_Model
{
    public function __construct()
    {
        ini_set('date.timezone', 'Asia/Jakarta');
    }
    public function getServiceCategory($filter)
    {
        $this->db->select("*");
        $this->db->from('jenis_perizinan');
        if (!empty($filter['id_perizinan'])) $this->db->where('id_perizinan', $filter['id_perizinan']);
        $res = $this->db->get();
        // return $res;
        return $res->result_array();
    }


    public function getTimSurveyDetail($filter)
    {
        $this->db->select("s.*,
        u.nama as nama_pupr,
        u1.nama as nama_lingkunganhidup,
        u2.nama as nama_pariwisata,
        u3.nama as nama_disperindag,
        u4.nama as nama_diknas,
        u5.nama as nama_pertanian,
        u6.nama as nama_perikanan,
        u7.nama as nama_perkim,
        u8.nama as nama_kesra
        ");
        $this->db->from('survey as s');
        $this->db->join('user as u', 's.pupr = u.id_user', 'LEFT');
        $this->db->join('user as u1', 's.lingkunganhidup = u1.id_user', 'LEFT');
        $this->db->join('user as u2', 's.pariwisata = u2.id_user', 'LEFT');
        $this->db->join('user as u3', 's.disperindag = u3.id_user', 'LEFT');
        $this->db->join('user as u4', 's.diknas = u4.id_user', 'LEFT');
        $this->db->join('user as u5', 's.pertanian = u5.id_user', 'LEFT');
        $this->db->join('user as u6', 's.perikanan = u6.id_user', 'LEFT');
        $this->db->join('user as u7', 's.perkim = u7.id_user', 'LEFT');
        $this->db->join('user as u8', 's.kesra = u8.id_user', 'LEFT');
        $this->db->where('id_pengiriman', $filter['id_pengiriman']);
        $res = $this->db->get();
        // return $res;
        return $res->result_array();
    }

    public function getTimSurvey($filter)
    {
        $this->db->select("nama,id_user,title_role,nama_role");
        $this->db->from('user as u');
        $this->db->join('role as r', 'id_role');
        $this->db->where("u.id_role > '89' AND u.id_role < '99'");
        $res = $this->db->get();
        // return $res;
        return $res->result_array();
    }

    public function service_1($filter)
    {
        $this->db->select("*");
        $this->db->from('service_1');
        if (!empty($filter['id_sub_service'])) $this->db->where('id_service_1', $filter['id_sub_service']);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function getDataDumy($filter)
    {
        $this->db->select("*");
        $this->db->from('dumy_data');
        $this->db->where('id_pengiriman', $filter['id_pengiriman']);
        $res = $this->db->get();
        return $res->result_array();
    }


    public function addService($data)
    {
        $data['user_sending'] = $this->session->userdata('id_user');
        // $dataInsert = DataStructure::slice($data, ['izin_komersial', 'izin_lingkungan', 'pernyataan', 'persyaratan_teknis']);
        // $this->db->insert('service_1', $dataInsert);
        // ExceptionHandler::handleDBError($this->db->error(), "Insert Pengiriman", "pengiriman");
        // $id_sub_service =  $this->db->insert_id();

        if ($this->session->userdata()['nama_role'] == 'customer') {
            $data['nik'] = $this->session->userdata()['username'];
        }
        $data['status_proposal'] = 'DIPROSES';

        $dataInsert = DataStructure::slice($data, ['nik', 'nib_file', 'id_service', 'nib', 'user_sending', 'lokasi_perizinan', 'deskripsi',  'file_pendukung', 'tujuan', 'survey', 'nama_badan']);
        $this->db->insert('pengiriman', $dataInsert);
        ExceptionHandler::handleDBError($this->db->error(), "Insert Pengiriman", "pengiriman");
        $id = $this->db->insert_id();

        if ($this->session->userdata()['nama_role'] == 'frontoffice') {
            $data['id_pengiriman'] = $id;
            $dataInsert = DataStructure::slice($data, ['id_pengiriman', 'nama', 'no_telp', 'email', 'alamat']);
            $this->db->insert('dumy_data', $dataInsert);
            ExceptionHandler::handleDBError($this->db->error(), "Insert Pengiriman", "pengiriman");
            $this->db->insert_id();
        }

        return $id;
    }

    public function editPengiriman($data)
    {

        $this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }

    public function act_1($data)
    {
        $now = date("Y-m-d h:i:s");

        if ($data['keputusan'] == 'terima') {
            $this->db->set('status_proposal', 'DIPROSES');
            $this->db->set('id_tahap_proposal', '1');
            $this->db->set('tujuan', $data['tujuan']);
            $this->db->set('tujuan', $data['tujuan']);
            $this->db->set('catatan_1', $data['catatan']);
            $this->db->set('acc_1', $this->session->userdata()['id_user']);
            $this->db->set('date_acc_1', $now);
        }
        // $this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }


    public function act_2($data)
    {
        $now = date("Y-m-d h:i:s");

        if ($data['keputusan'] == 'terima') {
            // $this->db->set('status_proposal', 'DIPROSES');
            $this->db->set('id_tahap_proposal', '2');
            // $this->db->set('tujuan', $data['tujuan']);
            $this->db->set('survey', $data['survey']);
            $this->db->set('catatan_2', $data['catatan']);
            $this->db->set('acc_2', $this->session->userdata()['id_user']);
            $this->db->set('date_acc_2', $now);
        }
        // $this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }


    public function act_3($data)
    {
        $now = date("Y-m-d h:i:s");

        if ($data['keputusan'] == 'terima') {
            // $this->db->set('status_proposal', 'DIPROSES');
            $this->db->set('id_tahap_proposal', '3');
            // $this->db->set('tujuan', $data['tujuan']);
            // $this->db->set('survey', $data['survey']);
            $this->db->set('catatan_3', $data['catatan']);
            $this->db->set('acc_3', $this->session->userdata()['id_user']);
            $this->db->set('date_acc_3', $now);
        }
        // $this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }

    public function act_4($data)
    {
        $now = date("Y-m-d h:i:s");

        if ($data['keputusan'] == 'terima') {
            // $this->db->set('status_proposal', 'DIPROSES');
            $this->db->set('id_tahap_proposal', '4');
            // $this->db->set('tujuan', $data['tujuan']);
            // $this->db->set('survey', $data['survey']);
            $this->db->set('catatan_4', $data['catatan']);
            $this->db->set('acc_4', $this->session->userdata()['id_user']);
            $this->db->set('date_acc_4', $now);
        }
        // $this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");


        // $this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
        // $this->db->where('id_pengiriman', $data['id_pengiriman']);
        // $this->db->update('pengiriman');

        // ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");

        $dataInsert = DataStructure::slice($data, [
            'id_pengiriman',
            'date_survey',
            'pupr',
            'lingkunganhidup',
            'pariwisata',
            'disperindag',
            'diknas',
            'pertanian',
            'perikanan',
            'perkim',
            'kesra',
        ]);
        $this->db->insert('survey', $dataInsert);
        ExceptionHandler::handleDBError($this->db->error(), "Insert Tim Survey", "survey");
        $id = $this->db->insert_id();

        return $data['id_pengiriman'];
    }


    public function act_5($data)
    {
        $now = date("Y-m-d h:i:s");

        if ($data['keputusan'] == 'terima') {
            // $this->db->set('status_proposal', 'DIPROSES');
            $this->db->set('id_tahap_proposal', '5');
            // $this->db->set('tujuan', $data['tujuan']);
            // $this->db->set('survey', $data['survey']);
            $this->db->set('catatan_5', $data['catatan']);
            $this->db->set('acc_5', $this->session->userdata()['id_user']);
            $this->db->set('date_acc_5', $now);
        }
        // $this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }

    public function act_6($data)
    {
        $now = date("Y-m-d h:i:s");
        $this->db->set('id_tahap_proposal', '6');
        if (!empty($data['file_draft'])) $this->db->set('file_draft', $data['file_draft']);
        $this->db->set('catatan_6', $data['catatan']);
        $this->db->set('acc_6', $this->session->userdata()['id_user']);
        $this->db->set('date_acc_6', $now);

        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }

    public function act_7($data)
    {
        $now = date("Y-m-d h:i:s");
        $this->db->set('id_tahap_proposal', '7');
        $this->db->set('catatan_7', $data['catatan']);
        $this->db->set('acc_7', $this->session->userdata()['id_user']);
        $this->db->set('date_acc_7', $now);

        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }


    public function act_8($data)
    {
        $now = date("Y-m-d h:i:s");
        $this->db->set('id_tahap_proposal', '8');
        $this->db->set('catatan_8', $data['catatan']);
        $this->db->set('acc_8', $this->session->userdata()['id_user']);
        $this->db->set('date_acc_8', $now);

        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }


    public function act_9($data)
    {
        $now = date("Y-m-d h:i:s");
        $this->db->set('id_tahap_proposal', '9');
        $this->db->set('catatan_9', $data['catatan']);
        $this->db->set('acc_9', $this->session->userdata()['id_user']);
        $this->db->set('date_acc_9', $now);

        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }


    public function act_10($data)
    {
        $now = date("Y-m-d h:i:s");
        $this->db->set('id_tahap_proposal', '99');

        $this->db->set('no_dokumen', $data['no_dokumen']);
        $this->db->set('catatan_10', $data['catatan']);
        $this->db->set('acc_10', $this->session->userdata()['id_user']);
        $this->db->set('date_acc_10', $now);

        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }
}
