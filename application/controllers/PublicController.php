<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PublicController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('PublicModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
    //       $this->load->library('encryption');
    //       $this->encryption->initialize(
    //         array(
    //                 'cipher' => 'DES',
    //                 'mode' => 'ctr',
    //                 'key' => '<a -character random string>'
    //         )
    // );

  }


  public function search()
  {
    $this->load->view('SearchPage', [
      'title' => "Search",
      'content' => 'public/Search',
    ]);
  }

  // public function index(){
  //   $this->load->view('PublicPage', [
  // 		'title' => "Home",
  //     'content' => 'public/LandingPage',
  //   ]);
  // }

  public function searchProcess($nib)
  {
    try {
      $filter['nib'] = $nib;
      $filter['sort'] = '1';
      $data = $this->PublicModel->getAllPengiriman($filter);
      $i = 0;
      // foreach ($data as $value) {
      //   // echo $value['id_pengiriman'].'<BR>';
      //   // $en = $this->encryption->encrypt($value['id_pengiriman']);
      //   // echo $en.'<br>';
      //   // echo $this->encryption->decrypt($en).'<br>';

      //   // $data[$i]['id_pengiriman'] = $en;
      //   $i++;
      // }
      // var_dump($data);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function searchProcessID($nib, $id)
  {
    try {
      $filter['nib'] = $nib;
      $filter['id_pengiriman'] = $id;
      // $filter['sort'] = '1';
      // $data = $this->PublicModel->getDetail($filter);
      // $i = 0;
      // $key = $this->encryption->create_key(16);
      // Get a hex-encoded representation of the key:
      // $key = bin2hex($this->encryption->create_key(16));
      // echo $key;

      // foreach ($data as $value) {

      //   // echo $value['id_pengiriman'].'<BR>';
      //   $en = $this->encryption->encrypt($value['id_pengiriman']);
      //   echo $en . '<br>';
      //   // echo $this->encryption->decrypt($en).'<br>';

      //   $data[$i]['id_pengiriman'] = $en;
      //   $i++;
      // }
      $this->load->view('DetailSearchPage', [
        'title' => "Search",
        'content' => 'public/Search',
        'data' => $filter
      ]);
      // echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function searchDetail()
  {
    try {
      $filter['nib'] = $this->input->post()['nib'];
      $filter['id_pengiriman'] = $this->input->post()['id_pengiriman'];
      // $filter['sort'] = '1';
      $data = $this->PublicModel->getDetail($filter);
      // $i = 0;
      // $key = $this->encryption->create_key(16);
      // Get a hex-encoded representation of the key:
      // $key = bin2hex($this->encryption->create_key(16));
      // echo $key;

      // foreach ($data as $value) {

      //   // echo $value['id_pengiriman'].'<BR>';
      //   $en = $this->encryption->encrypt($value['id_pengiriman']);
      //   echo $en . '<br>';
      //   // echo $this->encryption->decrypt($en).'<br>';

      //   $data[$i]['id_pengiriman'] = $en;
      //   $i++;
      // }
      // $this->load->view('DetailSearchPage', [
      //   'title' => "Search",
      //   'content' => 'public/Search',
      //   'data' => $filter
      // ]);
      echo json_encode(array('data' => $data[0]));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
}
