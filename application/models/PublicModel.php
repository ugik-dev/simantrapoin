<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PublicModel extends CI_Model
{
	public function getAllPengiriman($filter = [])
	{
		if (!empty($filter['sort'])) {
			$this->db->select('created_at,id_pengiriman, nib, no_dokumen, nama,nama_badan, alamat, status_proposal , id_tahap_proposal, tujuan , survey');
		} else {
			// $this->db->select('cb.*, u.nama as nama_fo , u1.nama as bo1 , u2.nama as bo2 , u3.nama as bo3 , u4.nama as bo4 , u5.nama as bo5 , t.nama as nama_tolak');
		}
		$this->db->from('pengiriman as cb');
		if (empty($filter['sort'])) {

			// $this->db->join("user as u", "cb.user_sending = u.id_user", 'LEFT');
			// $this->db->join("user as u1", "cb.acc_1 = u1.id_user", 'LEFT');
			// $this->db->join("user as u2", "cb.acc_2 = u2.id_user", 'LEFT');
			// $this->db->join("user as u3", "cb.acc_3 = u3.id_user", 'LEFT');
			// $this->db->join("user as u4", "cb.acc_4 = u4.id_user", 'LEFT');
			// $this->db->join("user as u5", "cb.acc_5 = u5.id_user", 'LEFT');
			// $this->db->join("user as t", "cb.logs_ditolak = t.id_user", 'LEFT');
		}

		 $this->db->where('cb.nib', $filter['nib']);
		//var_dump($this->session->userdata());
		$res = $this->db->get();
		return $res->result_array();
	}
    public function getDetail($filter = [])
	{
		$this->db->select('cb.*, u6.nama as kadin , u.nama as nama_fo , u1.nama as bo1 , u2.nama as bo2 , u3.nama as bo3 , u4.nama as bo4 , u5.nama as bo5 , t.nama as nama_tolak');
	    	$this->db->from('pengiriman as cb');
		
			$this->db->join("user as u", "cb.user_sending = u.id_user", 'LEFT');
			$this->db->join("user as u1", "cb.acc_1 = u1.id_user", 'LEFT');
			$this->db->join("user as u2", "cb.acc_2 = u2.id_user", 'LEFT');
			$this->db->join("user as u3", "cb.acc_3 = u3.id_user", 'LEFT');
			$this->db->join("user as u4", "cb.acc_4 = u4.id_user", 'LEFT');
			$this->db->join("user as u5", "cb.acc_5 = u5.id_user", 'LEFT');
			$this->db->join("user as u6", "cb.acc_kadin = u6.id_user", 'LEFT');
			$this->db->join("user as t", "cb.logs_ditolak = t.id_user", 'LEFT');
		$this->db->where('cb.id_pengiriman', $filter['id_pengiriman']);

		 $this->db->where('cb.nib', $filter['nib']);
		//var_dump($this->session->userdata());
		$res = $this->db->get();
		return $res->result_array();
	}}
