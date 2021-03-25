<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  class ExportController extends CI_Controller {

    public function __construct(){
      parent::__construct();
      $this->load->model(array('CagarbudayaModel'));
      $this->load->helper(array('DataStructure', 'Validation'));
  
    }

    function export(){
        try{
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->CagarbudayaModel->getAllCagarbudaya();
            echo json_encode(array('data' => $data));

            
            header('Content-Type: application/vnd.ms-excel');

            header('Content-Disposition: attachment;filename="Employee Data.xls"');

          } catch (Exception $e) {
            ExceptionHandler::handle($e);
          }
      //$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

      //header('Content-Type: application/vnd.ms-excel');

      //header('Content-Disposition: attachment;filename="Employee Data.xls"');

      //$object_writer->save('php://output');

    }

  }