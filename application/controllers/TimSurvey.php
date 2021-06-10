<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TimSurvey extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('PengirimanModel', 'SecurityModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    }


    public function index()
    {
        $this->SecurityModel->rolesOnlyGuard(array('dinkes', 'kasi_umum', 'kasi_usaha'));
        $pageData = array(
            'title' => 'Pengajuan',
            'content' => 'frontoffice/Pengajuan',
            // 'content' => 'Dashboard',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        // $this->PengirimanModel->getA
        // if ($this->session->userdata()['nama_controller'] == 'TimSurvey')
        // var_dump($this->session->userdata());
        $this->load->view('Page', $pageData);
    }
}
