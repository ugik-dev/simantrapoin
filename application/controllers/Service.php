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
            $data = $this->ServiceModel->act_1($data);
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
            $data = $this->ServiceModel->act_2($data);
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
            $data = $this->ServiceModel->act_3($data);
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
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_4($data);
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
            $this->SecurityModel->rolesOnlyGuard(array('kasi_umum'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 5) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            if (!empty($data['file_draftFilename']))
                $data['file_draft'] = FileIO::genericUpload('file_draft', array('png', 'jpeg', 'jpg', 'pdf', 'doc', 'docx'), NULL, $data, '100000');
            $data = $this->ServiceModel->act_6($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }



    function act_7()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('backoffice'));
            $data = $this->input->POST();

            $status = $this->PengirimanModel->getTahapProposal($data['id_pengiriman'])['id_tahap_proposal'];
            if ($status > 6) {
                throw new UserException("Sudah ada tindakan !!", USER_NOT_FOUND_CODE);
            }
            $data = $this->ServiceModel->act_7($data);
            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    function act_8()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('kabid'));
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
            $this->SecurityModel->rolesOnlyGuard(array('kadin'));
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
            $this->SecurityModel->rolesOnlyGuard(array('backoffice'));
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




    function process()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->POST();
            $data['file_pendukung'] = FileIO::genericUpload('file_pendukung', array('pdf', 'jpeg', 'jpg', 'png'), NULL, $data, '20000');
            $data['nib_file'] = FileIO::genericUpload('nib_file', array('pdf', 'jpeg', 'jpg', 'png'), NULL, $data, '20000');
            $data = $this->ServiceModel->addService($data);

            // throw new UserException("Pengajuan sudah diambil tindakan lanjut, harap lakukan pengajuan dari awal!!", USER_NOT_FOUND_CODE);

            echo json_encode(array('data' => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
}
