<?php

use function Complex\add;

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('UserModel'));
		$this->load->helper(array('DataStructure', 'Validation'));
		$this->db->db_debug = false;
	}

	public function index()
	{
		redirect('login');
	}

	public function login()
	{
		$this->SecurityModel->guestOnlyGuard();
		$pageData = array(
			'title' => 'Login',
		);
		// $this->load->view('fragment/test', $pageData);

		// $this->load->view('LoginPage', $pageData);
		$this->load->view('LoginPage');
	}


	public function daftar()
	{
		$this->SecurityModel->guestOnlyGuard();
		// $this->load->library('user_agent');
		// if ($this->agent->is_mobile()) {				
		// 			echo "Mobile";
		// 		} else {
		// 			echo "Laptop";
		// 		}


		$pageData = array(
			'title' => 'Daftar',
		);
		// $this->load->view('fragment/test', $pageData);

		$this->load->view('RegisterPage2');
	}


	public function loginProcess()
	{
		try {
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			Validation::ajaxValidateForm($this->SecurityModel->loginValidation());

			$loginData = $this->input->post();

			$user = $this->UserModel->login($loginData);

			$this->session->set_userdata($user);
			echo json_encode(array("error" => FALSE, "user" => $user));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function registerProcess()
	{
		try {
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			Validation::ajaxValidateForm($this->SecurityModel->loginValidation());

			$registerData = $this->input->post();
			$re = $this->UserModel->getAllUser(array('username' => $registerData['username']));
			if (!empty($re)) {
				throw new UserException("NIK yang kamu daftar kan sudah ada", USER_NOT_FOUND_CODE);
			}
			$registerData['ktp'] = FileIO::upload_compress($registerData, 'ktp', array('png', 'jpeg', 'jpg'), NULL, '100000', '50%', '500');
			$registerData['swa'] = FileIO::upload_compress($registerData, 'swa', array('png', 'jpeg', 'jpg'), NULL, '100000', '50%', '500');
			$registerData['pas_photo'] = FileIO::upload_compress($registerData, 'pas_photo', array('png', 'jpeg', 'jpg'), NULL, '100000', '50%', '500');
			$registerData['npwp'] = FileIO::upload_compress($registerData, 'npwp', array('png', 'jpeg', 'jpg'), NULL, '100000', '50%', '500');
			// $registerData['ktp'] = FileIO::genericUpload('ktp', array('png', 'jpeg', 'jpg'), NULL, $registerData ,'100000', '50%');

			$data = $this->UserModel->registerUser($registerData);
			// $user = $this->UserModel->registerUser($registerData);

			// $this->session->set_userdata($user);
			echo json_encode(array("error" => FALSE, "user" => $data));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function changePassword()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			// $this->SecurityModel->pengusulSubTypeGuard(['dosen_tendik'], TRUE);
			// Validation::ajaxValidateForm($this->SecurityModel->deleteDosenTendik());

			$CP = $this->input->post();
			if (md5($CP['old_password']) != $this->session->userdata('password')) {
				throw new UserException('Password Lama Salah', 0);
			}
			$this->UserModel->changePassword($CP);
			$this->session->set_userdata('password', md5($CP['password']));
			echo json_encode(array());
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}
	public function editUser()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			// $this->SecurityModel->pengusulSubTypeGuard(['dosen_tendik'], TRUE);
			// Validation::ajaxValidateForm($this->SecurityModel->deleteDosenTendik());

			$data = $this->input->post();
			if (md5($data['password']) != $this->session->userdata('password')) {
				throw new UserException('Pasword Salah!', 0);
			} else {
				$result = $this->UserModel->editUser($data);
				$this->session->set_userdata('username', $result['username']);
				$this->session->set_userdata('nama', $result['nama']);
			}
			//$this->UserModel->changePassword($CP);

			echo json_encode($result);
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function logout()
	{
		// $this->SecurityModel->userOnlyGuard();
		$this->session->sess_destroy();
		redirect('login');
		// echo json_encode(["error" => FALSE, 'data' => 'Logout berhasil.']);
	}

	function editPhoto()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			$config['upload_path'] = "./upload/profile";
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;


			$this->load->library('upload', $config);
			if ($this->upload->do_upload("photo")) {
				$data = array('upload_data' => $this->upload->data());
				$id = $this->input->post('id_user');
				$image = $data['upload_data']['file_name'];
				$fileold = $this->input->post('oldphoto');
				if ($fileold != 'profile_small.jpg') {
					unlink("./upload/profile/" . $fileold);
				};
				$result = $this->UserModel->editPhoto($id, $image);
				$this->session->set_userdata('photo', $image);
				echo json_decode($result);
			}


			echo json_encode(array());
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function getAllUser()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			$data = $this->UserModel->getAllUser(array('isSimple' => '1'));
			echo json_encode(array('data' => $data));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}
}
