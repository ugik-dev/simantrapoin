<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('DashboardModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    }

    public function DailyActivity()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->get();
            $data = $this->DashboardModel->DailyActivity($this->input->get());

            // $idPengiriman = $this->PengirimanModel->de_approvPengiriman($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
}
