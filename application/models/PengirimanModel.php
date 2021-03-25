<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanModel extends CI_Model
{
	public function getTahapProposal($id)
	{
		$this->db->select('id_tahap_proposal');
		$this->db->from('pengiriman as cb');
		$this->db->where('id_pengiriman', $id);
		$res = $this->db->get();
		return $res->result_array()[0];
	}
	public function getAllPengiriman($filter = [])
	{
		if (!empty($filter['sort'])) {
			$this->db->select('created_at,id_pengiriman, nib, ,nama_badan, lokasi_perizinan, status_proposal , id_tahap_proposal, tujuan , survey');
		} else {
			$this->db->select('cb.*,uu.*, u.nama as nama_sending, u.id_role as role_sending, 
			u1.nama as nama_acc_1 ,
			u2.nama as nama_acc_2 , 
			u3.nama as nama_acc_3 ,
			u4.nama as nama_acc_4 ,
			u5.nama as nama_acc_5 , 
			u6.nama as nama_acc_6,
			u7.nama as nama_acc_7,
			u8.nama as nama_acc_8,
			u9.nama as nama_acc_9,
			u10.nama as nama_acc_10,
			u11.nama as nama_acc_11,
				t.nama as nama_tolak');
		}
		$this->db->from('pengiriman as cb');
		if (empty($filter['sort'])) {

			$this->db->join("user as uu", "cb.nik = uu.username", 'LEFT');
			$this->db->join("user as u", "cb.user_sending = u.id_user", 'LEFT');
			$this->db->join("user as u1", "cb.acc_1 = u1.id_user", 'LEFT');
			$this->db->join("user as u2", "cb.acc_2 = u2.id_user", 'LEFT');
			$this->db->join("user as u3", "cb.acc_3 = u3.id_user", 'LEFT');
			$this->db->join("user as u4", "cb.acc_4 = u4.id_user", 'LEFT');
			$this->db->join("user as u5", "cb.acc_5 = u5.id_user", 'LEFT');
			$this->db->join("user as u6", "cb.acc_6 = u6.id_user", 'LEFT');
			$this->db->join("user as u7", "cb.acc_7 = u7.id_user", 'LEFT');
			$this->db->join("user as u8", "cb.acc_8 = u8.id_user", 'LEFT');
			$this->db->join("user as u9", "cb.acc_9 = u9.id_user", 'LEFT');
			$this->db->join("user as u10", "cb.acc_10 = u10.id_user", 'LEFT');
			$this->db->join("user as u11", "cb.acc_11 = u11.id_user", 'LEFT');
			$this->db->join("user as t", "cb.logs_ditolak = t.id_user", 'LEFT');
		}
		if (!empty($filter['id_pengiriman'])) $this->db->where('cb.id_pengiriman', $filter['id_pengiriman']);
		if (!empty($filter['status_proposal'])) $this->db->where('cb.status_proposal', $filter['status_proposal']);
		if (!empty($filter['self_status'])) {
			if ($filter['self_status'] == 'diproses') $this->db->where('cb.id_tahap_proposal < "' . $this->session->userdata()['level'] . '" AND status_proposal != "DITOLAK"');
			if ($filter['self_status'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "' . $this->session->userdata()['level'] . '"');
			if ($filter['self_status'] == 'ditolak') $this->db->where('cb.status_proposal', 'DITOLAK');
			if ($filter['self_status'] == 'all') $this->db->where('cb.status_proposal != "DRAFT"');
			if ($filter['self_status'] == 'approv') $this->db->where('cb.id_tahap_proposal > "' . $this->session->userdata()['level'] . '" AND status_proposal != "DITOLAK"');
			if ($filter['self_status'] == 'finish') $this->db->where('cb.status_proposal = "DITERIMA"');
		}
		if ($this->session->userdata()['nama_role'] == 'kasi_usaha') $this->db->where('cb.status_proposal != "DRAFT" AND cb.tujuan = "usaha"');
		if ($this->session->userdata()['nama_role'] == 'kasi_umum') $this->db->where('cb.status_proposal != "DRAFT" AND cb.tujuan = "umum"');
		if ($this->session->userdata()['nama_role'] == 'kasi_survey') $this->db->where('cb.status_proposal != "DRAFT" AND cb.survey = "ya"');
		if ($this->session->userdata()['nama_role'] == 'kabid') $this->db->where('cb.status_proposal != "DRAFT" AND cb.survey = "ya"');

		if (!empty($filter['status_kasi'])) {
			if ($this->session->userdata()['nama_role'] == 'kasi_survey') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "3" AND status_proposal != "DITOLAK"');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.id_tahap_proposal > "3" AND status_proposal = "DITOLAK"');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "3" AND status_proposal = "DITERIMA"');
				// if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.ssstatus_proposal', 'DITOLAK');
			} else if ($this->session->userdata()['nama_role'] == 'kasi_umum' || $this->session->userdata()['nama_role'] == 'kasi_usaha') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "1" AND status_proposal != "DITOLAK"');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.status_proposal', 'DITOLAK');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "2" AND status_proposal != "DITOLAK"');
			} else if ($this->session->userdata()['nama_role'] == 'kabid') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "2" AND status_proposal != "DITOLAK"');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.id_tahap_proposal > "2" AND status_proposal = "DITOLAK"');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "2" AND status_proposal = "DITERIMA"');
			} else if ($this->session->userdata()['nama_role'] == 'kadin') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "6" ');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.id_tahap_proposal > "6" AND status_proposal = "DITOLAK"');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "6" AND status_proposal = "DITERIMA"');
			}
		}
		// if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
		//var_dump($this->session->userdata());
		// $this->db->where('cb.id_pengiriman', 16);

		$res = $this->db->get();
		return DataStructure::keyValue($res->result_array(), 'id_pengiriman');
	}

	public function getAllPengirimanOLD($filter = [])
	{
		if (!empty($filter['sort'])) {
			$this->db->select('created_at,id_pengiriman, nib, no_dokumen, nama,nama_badan, alamat, status_proposal , id_tahap_proposal, tujuan , survey');
		} else {
			$this->db->select('cb.*, u.nama as nama_fo , u6.nama as kadin, u1.nama as bo1 , u2.nama as bo2 , u3.nama as bo3 , u4.nama as bo4 , u5.nama as bo5 , t.nama as nama_tolak');
		}
		$this->db->from('pengiriman as cb');
		if (empty($filter['sort'])) {

			$this->db->join("user as u", "cb.user_sending = u.id_user", 'LEFT');
			$this->db->join("user as u1", "cb.acc_1 = u1.id_user", 'LEFT');
			$this->db->join("user as u2", "cb.acc_2 = u2.id_user", 'LEFT');
			$this->db->join("user as u3", "cb.acc_3 = u3.id_user", 'LEFT');
			$this->db->join("user as u4", "cb.acc_4 = u4.id_user", 'LEFT');
			$this->db->join("user as u5", "cb.acc_5 = u5.id_user", 'LEFT');
			$this->db->join("user as u6", "cb.acc_kadin = u6.id_user", 'LEFT');
			$this->db->join("user as t", "cb.logs_ditolak = t.id_user", 'LEFT');
		}
		if (!empty($filter['id_pengiriman'])) $this->db->where('cb.id_pengiriman', $filter['id_pengiriman']);
		if (!empty($filter['status_proposal'])) $this->db->where('cb.status_proposal', $filter['status_proposal']);
		if (!empty($filter['self_status'])) {
			if ($filter['self_status'] == 'diproses') $this->db->where('cb.id_tahap_proposal < "' . $this->session->userdata()['level'] . '" AND status_proposal != "DITOLAK"');
			if ($filter['self_status'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "' . $this->session->userdata()['level'] . '"');
			if ($filter['self_status'] == 'ditolak') $this->db->where('cb.status_proposal', 'DITOLAK');
			if ($filter['self_status'] == 'all') $this->db->where('cb.status_proposal != "DRAFT"');
			if ($filter['self_status'] == 'approv') $this->db->where('cb.id_tahap_proposal > "' . $this->session->userdata()['level'] . '" AND status_proposal != "DITOLAK"');
			if ($filter['self_status'] == 'finish') $this->db->where('cb.status_proposal = "DITERIMA"');
		}
		if ($this->session->userdata()['nama_role'] == 'kasi_usaha') $this->db->where('cb.status_proposal != "DRAFT" AND cb.tujuan = "usaha"');
		if ($this->session->userdata()['nama_role'] == 'kasi_umum') $this->db->where('cb.status_proposal != "DRAFT" AND cb.tujuan = "umum"');
		if ($this->session->userdata()['nama_role'] == 'kasi_survey') $this->db->where('cb.status_proposal != "DRAFT" AND cb.survey = "ya"');
		if ($this->session->userdata()['nama_role'] == 'kabid') $this->db->where('cb.status_proposal != "DRAFT" AND cb.survey = "ya"');

		if (!empty($filter['status_kasi'])) {
			if ($this->session->userdata()['nama_role'] == 'kasi_survey') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "3" AND status_proposal != "DITOLAK"');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.id_tahap_proposal > "3" AND status_proposal = "DITOLAK"');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "3" AND status_proposal = "DITERIMA"');
				// if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.ssstatus_proposal', 'DITOLAK');
			} else if ($this->session->userdata()['nama_role'] == 'kasi_umum' || $this->session->userdata()['nama_role'] == 'kasi_usaha') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "1" AND status_proposal != "DITOLAK"');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.status_proposal', 'DITOLAK');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "2" AND status_proposal != "DITOLAK"');
			} else if ($this->session->userdata()['nama_role'] == 'kabid') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "2" AND status_proposal != "DITOLAK"');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.id_tahap_proposal > "2" AND status_proposal = "DITOLAK"');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "2" AND status_proposal = "DITERIMA"');
			} else if ($this->session->userdata()['nama_role'] == 'kadin') {
				if ($filter['status_kasi'] == 'menunggu') $this->db->where('cb.id_tahap_proposal = "6" ');
				if ($filter['status_kasi'] == 'ditolak') $this->db->where('cb.id_tahap_proposal > "6" AND status_proposal = "DITOLAK"');
				if ($filter['status_kasi'] == 'approv') $this->db->where('cb.id_tahap_proposal > "6" AND status_proposal = "DITERIMA"');
			}
		}
		// if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
		//var_dump($this->session->userdata());
		$res = $this->db->get();
		return DataStructure::keyValue($res->result_array(), 'id_pengiriman');
	}

	public function getPengiriman($idPengiriman = NULL)
	{
		$row = $this->getAllPengiriman(['id_pengiriman' => $idPengiriman]);
		if (empty($row)) {
			throw new UserException("Pengiriman yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idPengiriman];
	}

	public function addPengiriman($data)
	{
		$data['user_sending'] = $this->session->userdata('id_user');
		// if($this->session->userdata('id_role') == '1'){

		// }else{
		//   $data['id_kabupaten'] = $this->session->userdata('id_kabupaten');
		// };
		$dataInsert = DataStructure::slice($data, ['nama', 'catatan_fo', 'nib', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']);
		$this->db->insert('pengiriman', $dataInsert);
		ExceptionHandler::handleDBError($this->db->error(), "Insert Pengiriman", "pengiriman");
		return $this->db->insert_id();
	}

	public function editPengiriman($data)
	{

		$this->db->set(DataStructure::slice($data, ['nama', 'nib', 'catatan_fo', 'user_sending', 'alamat', 'deskripsi', 'no_dokumen', 'dokumen_permohonan', 'tujuan', 'survey', 'nama_badan']));
		$this->db->where('id_pengiriman', $data['id_pengiriman']);
		$this->db->update('pengiriman');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
		return $data['id_pengiriman'];
	}

	public function approvPengiriman($data)
	{
		ini_set('date.timezone', 'Asia/Jakarta');
		$date = date("Y-m-d h:i:s");

		if ($this->session->userdata()['nama_role'] == 'frontoffice') {
			if ($data['id_tahap_proposal'] > '1') {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				$this->db->set('user_sending', $this->session->userdata()['id_user']);
				$this->db->set('date_sending', $date);
				$this->db->set('status_proposal', 'DIPROSES');
				$this->db->set('id_tahap_proposal', '1');
			}
		}

		if ($this->session->userdata()['nama_role'] == 'kasi_umum' || $this->session->userdata()['nama_role'] == 'kasi_usaha') {
			if ($data['id_tahap_proposal'] > '1') {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				$this->db->set('acc_1', $this->session->userdata()['id_user']);
				$this->db->set('date_acc_1', $date);
				$this->db->set('status_proposal', 'DIPROSES');
				$this->db->set('catatan_1', $data['catatan_1']);

				if ($data['survey'] == 'ya') {
					$this->db->set('id_tahap_proposal', '2');
					$this->db->set('survey', 'ya');
				}
				if ($data['survey'] == 'tidak') {
					$this->db->set('survey', 'tidak');
					$this->db->set('id_tahap_proposal', '4');
				}
			}
		}


		if ($this->session->userdata()['nama_role'] == 'kabid') {
			if ($data['id_tahap_proposal'] > '2') {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				$this->db->set('acc_2', $this->session->userdata()['id_user']);
				$this->db->set('date_acc_2', $date);
				if (!empty($data['catatan_23'])) $this->db->set('catatan_2', $data['catatan_23']);
				$this->db->set('status_proposal', 'DIPROSES');

				$this->db->set('id_tahap_proposal', '3');
			}
		}

		if ($this->session->userdata()['nama_role'] == 'kasi_survey') {
			if ($data['id_tahap_proposal'] > '3') {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				$this->db->set('acc_3', $this->session->userdata()['id_user']);
				$this->db->set('date_acc_3', $date);
				$this->db->set('status_proposal', 'DIPROSES');
				if (!empty($data['catatan_23'])) $this->db->set('catatan_3', $data['catatan_23']);
				$this->db->set('id_tahap_proposal', '4');
			}
		}

		if ($this->session->userdata()['nama_role'] == 'kadin') {
			if ($data['id_tahap_proposal'] > '6') {
				throw new UserException("Pengajuan sudah diambil tindakan lanjut!!", USER_NOT_FOUND_CODE);
			} else {
				$this->db->set('acc_kadin', $this->session->userdata()['id_user']);
				$this->db->set('date_kadin', $date);
				if ($data['status_proposal'] == 'DIPROSES') $this->db->set('status_proposal', 'DITERIMA');
				if (!empty($data['catatan_23'])) $this->db->set('catatan_kadin', $data['catatan_23']);
				$this->db->set('id_tahap_proposal', '99');
			}
		}


		if ($this->session->userdata()['nama_role'] == 'backoffice') {
			$lvl = $this->session->userdata()['level'];
			if ($data['id_tahap_proposal'] == $lvl + 1) {
				throw new UserException("Pengajuan sudah diapprov!! ", USER_NOT_FOUND_CODE);
			} else if ($data['id_tahap_proposal'] > $lvl + 1) {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				$this->db->set('acc_' . $lvl, $this->session->userdata()['id_user']);
				$this->db->set('date_acc_' . $lvl, $date);
				// $this->db->set('status_proposal','DIPROSES');
				// $this->db->set('id_tahap_proposal', $lvl + 1);
				if ($lvl == '4') {
					$this->db->set('id_tahap_proposal', '5');
					$this->db->set('acc_' . $lvl, $this->session->userdata()['id_user']);
					$this->db->set('date_acc_' . $lvl, $date);
					if (!empty($data['catatan_4'])) $this->db->set('catatan_4', $data['catatan_4']);
					// $this->db->set('status_proposal', 'DIPR');
					if (!empty($data['output_no_dokumen'])) $this->db->set('output_no_dokumen', $data['output_no_dokumen']);
				}
				if ($lvl == '5') {
					$this->db->set('acc_' . $lvl, $this->session->userdata()['id_user']);
					$this->db->set('date_acc_' . $lvl, $date);
					$this->db->set('id_tahap_proposal', '6');
					if (!empty($data['catatan_23'])) $this->db->set('catatan_5', $data['catatan_23']);
					// if ($data['status_proposal'] == 'DIPROSES') $this->db->set('status_proposal', 'DITERIMA');
					// if (!empty($data['output_no_dokumen'])) $this->db->set('output_no_dokumen', $data['output_no_dokumen']);
				}
			}
		}

		$this->db->where('id_pengiriman', $data['id_pengiriman']);
		$this->db->update('pengiriman');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
		return $data['id_pengiriman'];
	}

	public function not_approvPengiriman($data)
	{
		ini_set('date.timezone', 'Asia/Jakarta');
		$date = date("Y-m-d h:i:s");

		if ($this->session->userdata()['nama_role'] == 'frontoffice') {
			if ($data['id_tahap_proposal'] > '1') {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				$this->db->set('logs_ditolak', $this->session->userdata()['id_user']);
				$this->db->set('date_tolak', $date);
				$this->db->set('status_proposal', 'DITOLAK');
				if (!empty($data['catatan'])) $this->db->set('catatan', $data['catatan']);
			}
		}


		if ($this->session->userdata()['nama_role'] == 'backoffice') {
			$lvl = $this->session->userdata()['level'];
			if ($data['id_tahap_proposal'] == $lvl + 1) {
				throw new UserException("Pengajuan sudah diapprov!! ", USER_NOT_FOUND_CODE);
			} else if ($data['id_tahap_proposal'] > $lvl + 1) {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				// $this->db->set('acc_'.$lvl,$this->session->userdata()['id_user']);
				// $this->db->set('date_acc_'.$lvl,$date);
				// $this->db->set('status_proposal','DIPROSES');
				$this->db->set('id_tahap_proposal', $lvl + 1);

				$this->db->set('logs_ditolak', $this->session->userdata()['id_user']);
				$this->db->set('date_tolak', $date);
				$this->db->set('status_proposal', 'DITOLAK');
				if (!empty($data['catatan_form'])) $this->db->set('catatan', $data['catatan_form']);
				if (!empty($data['output_no_dokumen'])) $this->db->set('output_no_dokumen', $data['output_no_dokumen']);
			}
		}

		if (!empty($data['catatan_form'])) $this->db->set('catatan', $data['catatan_form']);
		$this->db->set('id_tahap_proposal', '4');
		$this->db->set('tolak_in', $data['id_tahap_proposal']);
		$this->db->set('logs_ditolak', $this->session->userdata()['id_user']);
		$this->db->set('date_tolak', $date);
		$this->db->set('status_proposal', 'DITOLAK');

		$this->db->where('id_pengiriman', $data['id_pengiriman']);
		$this->db->update('pengiriman');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
		return $data['id_pengiriman'];
	}


	public function de_approvPengiriman($data)
	{
		ini_set('date.timezone', 'Asia/Jakarta');
		$date = date("Y-m-d h:i:s");

		if ($this->session->userdata()['nama_role'] == 'frontoffice') {
			if ($data['id_tahap_proposal'] > '1') {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			} else {
				// $this->db->set('user_sending', $this->session->userdata()['id_user']);
				// $this->db->set('date_sending', $date);
				$this->db->set('status_proposal', 'DRAFT');
				$this->db->set('id_tahap_proposal', '0');
			}
		}

		if ($this->session->userdata()['nama_role'] == 'backoffice') {
			$lvl = $this->session->userdata()['level'];
			if ($data['id_tahap_proposal'] == $lvl + 1) {
				$this->db->set('id_tahap_proposal', $lvl);
				$this->db->set('status_proposal', 'DIPROSES');
			} else if ($data['id_tahap_proposal'] > $lvl + 1) {
				throw new UserException("Pengajuan sudah diapprov oleh level lebih tinggi!!", USER_NOT_FOUND_CODE);
			}
		}

		$this->db->where('id_pengiriman', $data['id_pengiriman']);
		$this->db->update('pengiriman');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah Pengiriman", "pengiriman");
		return $data['id_pengiriman'];
	}




	public function deletePengiriman($data)
	{
		$this->db->where('id_pengiriman', $data['id_pengiriman']);
		$this->db->delete('pengiriman');

		ExceptionHandler::handleDBError($this->db->error(), "Hapus Pengiriman", "pengiriman");
	}
}
