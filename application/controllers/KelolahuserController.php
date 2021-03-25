<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolahuserController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('KelolahuserModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }
    

  public function getAllRoleOption(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->KelolahuserModel->getAllRoleOption($this->input->get());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  
  public function getAllKelolahuser(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->KelolahuserModel->getAllKelolahuser();
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function addUser(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idKelolahuser = $this->KelolahuserModel->addKelolahuser($data);
      $data = $this->KelolahuserModel->getKelolahuser($idKelolahuser);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function editKelolahuser(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idKelolahuser = $this->KelolahuserModel->editKelolahuser($data);
      $data = $this->KelolahuserModel->getKelolahuser($idKelolahuser);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  
  public function editPassword(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $idKelolahuser = $this->KelolahuserModel->editPassword($data);
      $data = $this->KelolahuserModel->getKelolahuser($idKelolahuser);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteKelolahuser(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $this->KelolahuserModel->deleteKelolahuser($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

}