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

    public function getMaps($filter)
    {
        $this->db->select("id_pengiriman, nama_badan, longitude , latitude");
        $this->db->from('pengiriman');
        $this->db->where('longitude <> "" AND longitude <> "0" AND latitude <> "" AND latitude <> "0" ');
        $res = $this->db->get();
        // return $res;
        return $res->result_array();
    }

    public function getServerSTMP()
    {
        $this->db->select("*");
        $this->db->from("config_email as ssk");
        $this->db->where("ssk.type", 'stmp_mail');
        $res = $this->db->get();
        $res = $res->result_array();
        return $res['0'];
    }


    public function getEmail($filter)
    {
        $this->db->select("email");
        $this->db->from("user as ssk");

        if (!empty($filter['id_role'])) $this->db->where("ssk.id_role", $filter['id_role']);
        $res = $this->db->get();
        return $res->result_array();
    }


    public function getTimSurveyDetail($filter)
    {
        $this->db->select("s.*,
        u1.nama as nama_tim_1, u1.title_role as title_role_1,
        u2.nama as nama_tim_2, u2.title_role as title_role_2,
        u3.nama as nama_tim_3, u3.title_role as title_role_3,
        u4.nama as nama_tim_4, u4.title_role as title_role_4,
        u5.nama as nama_tim_5, u5.title_role as title_role_5,
        u6.nama as nama_tim_6, u6.title_role as title_role_6,
        u7.nama as nama_tim_7, u7.title_role as title_role_7,
        u8.nama as nama_tim_8, u8.title_role as title_role_8,
        u9.nama as nama_tim_9, u9.title_role as title_role_9,
        u10.nama as nama_tim_10, u10.title_role as title_role_10,
        u11.nama as nama_tim_11, u11.title_role as title_role_11,
        u12.nama as nama_tim_12, u12.title_role as title_role_12,
        u13.nama as nama_tim_13, u13.title_role as title_role_13,
        u14.nama as nama_tim_14, u14.title_role as title_role_14,
        u15.nama as nama_tim_15, u15.title_role as title_role_15
        ");
        $this->db->from('survey as s');
        $this->db->join('v_tim_survey as u1', 's.tim_1 = u1.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u2', 's.tim_2 = u2.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u3', 's.tim_3 = u3.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u4', 's.tim_4 = u4.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u5', 's.tim_5 = u5.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u6', 's.tim_6 = u6.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u7', 's.tim_7 = u7.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u8', 's.tim_8 = u8.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u9', 's.tim_9 = u9.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u10', 's.tim_10 = u10.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u11', 's.tim_11 = u11.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u12', 's.tim_12 = u12.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u13', 's.tim_13 = u13.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u14', 's.tim_14 = u14.id_user', 'LEFT');
        $this->db->join('v_tim_survey as u15', 's.tim_15 = u15.id_user', 'LEFT');
        $this->db->where('id_pengiriman', $filter['id_pengiriman']);
        $res = $this->db->get();
        // return $res;
        return $res->result_array();
    }

    public function getTimSurvey($filter)
    {
        $this->db->select("nama,id_user,title_role,nama_role, email");
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
        if ($this->session->userdata()['nama_role'] == 'customer') {
            $data['nik'] = $this->session->userdata()['username'];
        }

        $data['status_proposal'] = 'DIPROSES';

        $dataInsert = DataStructure::slice($data, ['nik', 'latitude', 'longitude', 'nib_file', 'id_service', 'nib', 'user_sending', 'lokasi_perizinan', 'deskripsi',  'file_pendukung', 'tujuan', 'survey', 'nama_badan']);
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


    public function editService($data)
    {
        $data['user_sending'] = $this->session->userdata('id_user');
        if ($this->session->userdata()['nama_role'] == 'customer') {
            $data['nik'] = $this->session->userdata()['username'];
        }

        $data['status_proposal'] = 'DIPROSES';

        $this->db->set(DataStructure::slice($data, ['nik', 'latitude', 'longitude', 'nib_file', 'id_service', 'nib', 'user_sending', 'lokasi_perizinan', 'deskripsi',  'file_pendukung', 'tujuan', 'survey', 'nama_badan']));
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');
        ExceptionHandler::handleDBError($this->db->error(), "Insert Pengiriman", "pengiriman");
        // $id = $this->db->insert_id();

        if ($this->session->userdata()['nama_role'] == 'frontoffice') {
            // $data['id_pengiriman'] = $id;
            $this->db->set(DataStructure::slice($data, ['nama', 'no_telp', 'email', 'alamat']));
            $this->db->where('id_pengiriman', $data['id_pengiriman']);
            $this->db->update('dumy_data');
            ExceptionHandler::handleDBError($this->db->error(), "Insert Pengiriman", "pengiriman");
        }

        return $data['id_pengiriman'];
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
        } else {
            // $this->db->set('logs_ditolak', $this->session->userdata()['id_user']);
            // $this->db->set('status_proposal', 'DITOLAK');
            // $this->db->set('date_tolak', $now);
            // $this->db->set('tolak_in', '0');
            // $this->db->set('catatan', $data['catatan']);
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
        } else {
            $this->db->set('tolak_in', '2');
            $this->db->set('id_tahap_proposal', '5');
            $this->db->set('status_proposal', 'DITOLAK');
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

    public function act_4($data, $team)
    {
        $now = date("Y-m-d h:i:s");
        if ($data['keputusan'] == 'terima') {
            $this->db->set('id_tahap_proposal', '4');
            $this->db->set('catatan_4', $data['catatan']);
            $this->db->set('acc_4', $this->session->userdata()['id_user']);
            $this->db->set('date_acc_4', $now);
        } else {
            $this->db->set('tolak_in', '4');
            $this->db->set('id_tahap_proposal', '5');
            $this->db->set('status_proposal', 'DITOLAK');
            $this->db->set('catatan_4', $data['catatan']);
            $this->db->set('acc_4', $this->session->userdata()['id_user']);
            $this->db->set('date_acc_4', $now);
        }
        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');
        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");

        if ($data['keputusan'] == 'terima') {
            $team['id_pengiriman'] = $data['id_pengiriman'];
            $team['date_survey'] = $data['date_survey'];
            $team['count_tim'] = $data['count_tim'];
            $dataInsert = DataStructure::slice($team, [
                'id_pengiriman',
                'date_survey',
                'count_tim',
                'tim_1',
                'tim_2',
                'tim_3',
                'tim_4',
                'tim_5',
                'tim_6',
                'tim_7',
                'tim_8',
                'tim_9',
                'tim_10',
                'tim_11',
                'tim_12',
                'tim_13',
                'tim_14',
                'tim_15',
            ]);
            $this->db->select("*");
            $this->db->from('survey');
            $this->db->where('id_pengiriman', $data['id_pengiriman']);
            $res = $this->db->get();

            $sur = $res->result_array();
            if (empty($sur)) {
                $this->db->insert('survey', $dataInsert);
            } else {
                $this->db->where('id_pengiriman', $data['id_pengiriman']);
                $this->db->update('survey', $dataInsert);
            }

            ExceptionHandler::handleDBError($this->db->error(), "Insert Tim Survey", "survey");
        }

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
        } else {
            $this->db->set('tolak_in', '5');
            $this->db->set('id_tahap_proposal', '5');
            $this->db->set('status_proposal', 'DITOLAK');
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
        if (!empty($data['file_draft'])) $this->db->set('file_draft', $data['file_draft']);
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
        $this->db->set('id_tahap_proposal', '10');
        $this->db->set('catatan_10', $data['catatan']);
        $this->db->set('acc_10', $this->session->userdata()['id_user']);
        $this->db->set('date_acc_10', $now);

        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }


    public function act_11($data)
    {
        $now = date("Y-m-d h:i:s");
        $this->db->set('id_tahap_proposal', '99');

        $this->db->set('no_dokumen', $data['no_dokumen']);
        $this->db->set('catatan_11', $data['catatan']);
        $this->db->set('acc_11', $this->session->userdata()['id_user']);
        $this->db->set('date_acc_11', $now);

        $this->db->where('id_pengiriman', $data['id_pengiriman']);
        $this->db->update('pengiriman');

        ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
        return $data['id_pengiriman'];
    }
}
