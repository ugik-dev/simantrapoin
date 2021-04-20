<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('ServiceModel', 'PengirimanModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = TRUE;
    }

    public function help()
    {
        $this->SecurityModel->userOnlyGuard(TRUE);
        // var_dump($this->session->userdata());
        $pageData = array(
            'title' => 'Help Service',
            'content' => 'help',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function New()
    {
        $this->SecurityModel->userOnlyGuard(TRUE);
        // var_dump($this->session->userdata());
        $pageData = array(
            'title' => 'Help Service',
            'content' => 'frontoffice/Service',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }


    function getServiceCategory()
    {
        try {
            $data = $this->input->GET();
            $data = $this->ServiceModel->getServiceCategory($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function getTimSurveyDetail()
    {
        try {
            $data = $this->input->GET();
            $data = $this->ServiceModel->getTimSurveyDetail($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function getTimSurvey()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('kasi_survey');
            $data = $this->input->GET();
            $data = $this->ServiceModel->getTimSurvey($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    function getMaps()
    {
        try {
            // $this->SecurityModel->roleOnlyGuard();
            $data = $this->input->GET();
            $data = $this->ServiceModel->getMaps($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    function getDataDumy()
    {
        try {
            $this->SecurityModel->userOnlyGuard();
            $data = $this->input->GET();
            $data = $this->ServiceModel->getDataDumy($data);
            if (!empty($data[0])) {
                $data = $data[0];
            }
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function service_1()
    {
        try {
            $data = $this->ServiceModel->service_1($this->input->GET());
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_1()
    {
        try {
            $this->SecurityModel->roleOnlyGuard('frontoffice');
            $data = $this->input->POST();
            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 0) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $this->ServiceModel->act_1($data);
            if ($data['tujuan'] == 'umum') {
                $role = '4';
            } else {
                $role = '5';
            }
            $this->email_send(array('id_pengiriman' => $data['id_pengiriman'], 'id_role' => $role));

            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    function act_2()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kasi_umum', 'kasi_usaha'));
            $data = $this->input->POST();
            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 1) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data2 = $this->ServiceModel->act_2($data);
            if ($data['keputusan'] == 'terima') {
                $this->email_send(array('id_pengiriman' => $data['id_pengiriman'], 'id_role' => '7'));
            }
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    function act_3()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kabid'));
            $data = $this->input->POST();
            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 2) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $this->ServiceModel->act_3($data);
            if ($data['keputusan'] == 'terima') {
                $this->email_send(array('id_pengiriman' => $data['id_pengiriman'], 'id_role' => '6'));
            }
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_4()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kasi_survey'));
            $data = $this->input->POST();
            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 3) {
                // throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $team = [];
            if ($data['keputusan'] == 'terima') {
                $j = 1;
                $emailtim = [];
                for ($i = 1; $i <= $data['count_tim']; $i++) {
                    if (!empty($data['tim_' . $i])) {
                        $team['tim_' . $j] = $data['tim_' . $i];
                        if (!empty($data['email_tim_' . $i])) array_push($emailtim, $data['email_tim_' . $i]);
                        $j++;
                    };
                }
            }

            $this->ServiceModel->act_4($data, $team);
            if ($data['keputusan'] == 'terima') {
                $this->email_send(array('id_pengiriman' => $data['id_pengiriman'], 'survey' => $emailtim));
                $this->email_send(array('id_pengiriman' => $data['id_pengiriman'], 'user' => $data['email_user'], 'tanggal' => $data['date_survey']));
            }
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_5()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kasi_survey'));
            $data = $this->input->POST();
            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 4) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_5($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_6()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kabid'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 5) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_6($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_7()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kasi_umum', 'kasi_usaha'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 6) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            if (!empty($data['file_draftFilename']))
                $data['file_draft'] = FileIO::genericUpload('file_draft', array('png', 'jpeg', 'jpg', 'pdf', 'doc', 'docx'), NULL, $data, '100000');
            $data = $this->ServiceModel->act_7($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }



    function act_8()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('backoffice'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 7) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_8($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_9()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kabid'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 8) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_9($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_10()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kadin'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 9) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_10($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_11()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('backoffice'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman']);
            if ($status['id_tahap_proposal'] > 10) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_11($data, $status);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }




    function process()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->POST();
            if (!empty($data['file_pendukungFilename'])) {
                $data['file_pendukung'] = FileIO::genericUpload('file_pendukung', array('pdf', 'jpeg', 'jpg', 'png'), NULL, $data, '20000');
            } else {
                $data['file_pendukung'] = '';
            }
            if (!empty($data['nib_fileFilename'])) {
                $data['nib_file'] = FileIO::genericUpload('nib_file', array('pdf', 'jpeg', 'jpg', 'png'), NULL, $data, '20000');
            } else {
                $data['nib_file'] = '';
            }
            $data = $this->ServiceModel->addService($data);

            // throw new UserException("Pengajuan sudah diambil tindakan lanjut, harap lakukan pengajuan dari awal!!", USER_NOT_FOUND_CODE);

            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function processedit()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->POST();
            if (!empty($data['file_pendukungFilename'])) {
                $data['file_pendukung'] = FileIO::genericUpload('file_pendukung', array('pdf', 'jpeg', 'jpg', 'png'), NULL, $data, '20000');
            } else {
                unset($data['file_pendukung']);
            }
            if (!empty($data['nib_fileFilename'])) {
                $data['nib_file'] = FileIO::genericUpload('nib_file', array('pdf', 'jpeg', 'jpg', 'png'), NULL, $data, '20000');
            } else {
                unset($data['nib_file']);
            }
            $old = $this->PengirimanModel->getPengiriman($data['id_pengiriman']);
            $old2 = $this->ServiceModel->getDataDumy(array('id_pengiriman' => $data['id_pengiriman']));

            if ($old['id_tahap_proposal'] > 0) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }

            $data = $this->ServiceModel->editService($data);

            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function email_send($data)
    {
        $this->SecurityModel->rolesOnlyGuard(array('kadin', 'frontoffice', 'kasi_umum', 'kasi_usaha', 'kasi_survey', 'backoffice', 'kabid'));

        $serv = $this->ServiceModel->getServerSTMP();
        if (!empty($data['survey'])) {
            $send['to'] = $data['survey']; //KPB
            $message = 'Hallo, <br> Terdapat Disposisi Pengajuan Perizinan kepada anda, 
        harap cek di halaman ' . base_url() . '/PengirimanController/DetailPengiriman?id_pengiriman=' . $data['id_pengiriman'];
        } else   if (!empty($data['user'])) {
            $send['to'] = $data['user']; //KPB
            $message = 'Hallo, <br> Kami dari Tim Perizinan DINPMP2UKM KABUPATEN BANGKA menyampaikan bahwa akan diadakan survey pada; <br>Tanggal : ' . date('d F Y', strtotime($data['tanggal'])) . '<br>Pukul : ' . explode("T", $data['tanggal'])[1] . '
        <br>harap cek di halaman ' . base_url() . '/PengirimanController/DetailPengiriman?id_pengiriman=' . $data['id_pengiriman'];
        } else {
            $to = $this->ServiceModel->getEmail($data); // kasi umum
            $send['to'] = $to[0]['email']; //KPB
            $message = 'Hallo, <br> Terdapat Disposisi Pengajuan Perizinan kepada anda, 
        harap cek di halaman ' . base_url() . '/PengirimanController/DetailPengiriman?id_pengiriman=' . $data['id_pengiriman'];
        }
        if (empty($send['to'])) return;
        $send['subject'] = 'SIMANTRAPOIN';

        $send['message'] = $this->template_email($message);


        $config['protocol']    = 'smtp';
        $config['smtp_host']    = $serv['url_'];
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '60';
        $config['smtp_user']    = $serv['username'];    //Important
        $config['smtp_pass']    = $serv['key'];  //Important
        $config['charset']    = 'utf-8';
        $config['newline']    = '\r\n';
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $send['config'] = $config;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($serv['username']);
        $this->email->to($send['to']);
        $this->email->subject($send['subject']);
        $this->email->message($send['message']);
        $this->email->send();
        // echo $this->email->print_debugger();
        return $send;
    }

    public function vie()
    {
        $this->load->view('test');
    }

    public function template_email($message)
    {
        $template = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">

            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Demystifying Email Design</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            </head>

            <body style="margin: 0; padding: 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                <tr>
                                    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; width : 130px">
                                        <img src="' . base_url() . '/assets/img/logo-bangka.png" alt="Creating Email Magic" width="70" style="display: block;" />
                                    </td>
                                    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                                        <h1>
                                            <a> SIMANTRAPOIN</a>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td>
                                        ' . $message . '        </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ee4c50" colspan="2">
                                            Copyright 2020 <a href="' . base_url() . '">SIMANTRAPOINT</a> All Rights Reserved.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>

            </html>';
        return $template;
    }

    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
}
