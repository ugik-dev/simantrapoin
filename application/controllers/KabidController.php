<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KabidController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('FOModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }

  public function index()
  {
    $this->SecurityModel->rolesOnlyGuard(array('kabid'));
    // var_dump($this->session->userdata());
    $pageData = array(
      'title' => 'Beranda',
      'content' => 'Dashboard',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function pengajuan()
  {
    $this->SecurityModel->roleOnlyGuard('kabid');
    $pageData = array(
      'title' => 'Pengajuan',
      'content' => 'frontoffice/Pengajuan',
      // 'content' => 'Dashboard',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function panduan()
  {
    $this->SecurityModel->roleOnlyGuard('frontoffice');
    $pageData = array(
      'title' => 'Panduan',
      'content' => 'frontoffice/PanduanPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => array(),
    );
    $this->load->view('Page', $pageData);
  }
}
