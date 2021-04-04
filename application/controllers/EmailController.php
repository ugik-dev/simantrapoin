<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('ServiceModel', 'PengirimanModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = TRUE;
    }

    public function email_send($data)
    {
        $serv = $this->ServiceModel->getServerSTMP();
        if (!empty($data['survey'])) {
            $send['to'] = $data['survey']; //KPB
            $message = 'Hallo, <br> Terdapat Disposisi Pengajuan Perizinan kepada anda, 
        harap cek di halaman ' . base_url() . '/PengirimanController/DetailPengiriman?id_pengiriman=' . $data['id_pengiriman'];
        } else   if (!empty($data['user'])) {
            $send['to'] = $data['user']; //KPB
            $message = 'Hallo, <br> Kami dari Tim Perizinan DINAS , 
        harap cek di halaman ' . base_url() . '/PengirimanController/DetailPengiriman?id_pengiriman=' . $data['id_pengiriman'];
        } else {
            $to = $this->ServiceModel->getEmail($data); // kasi umum
            $send['to'] = $to[0]['email']; //KPB
            $message = 'Hallo, <br> Terdapat Disposisi Pengajuan Perizinan kepada anda, 
        harap cek di halaman ' . base_url() . '/PengirimanController/DetailPengiriman?id_pengiriman=' . $data['id_pengiriman'];
        }
        $send['subject'] = 'SIMANTRAPOINT';

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
        // $message = 'hello';
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
 Copyright 2020 <a href="' . base_url() . '">SIMANTRAPOINT</a> All Rights Reserved.                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>

            </html>';
        return $template;
    }
}
