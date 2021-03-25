<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPariwisataModel extends CI_Model {

    

	public function getFormat($data){
		$this->db->select('dlp.id_data , flp.id_format,flp.satuan,flp.id_elemen,flp.nama_elemen,dlp.value,dlp.id_approv');
        $this->db->from('stat_laporan_pariwisata as flp');
        $this->db->where('flp.tahun',$data['tahun']);
        
        $this->db->join('data_laporan_pariwisata as dlp','dlp.tahun=flp.tahun and dlp.id_format=flp.id_format ','left');
		$res=$this->db->get();

        return $res->result_array();
		//return DataStructure::keyValue($res->result_array(), 'id_kepemilikan_museum');
    }
    public function getFormat2($data){
		$this->db->select('dlp.id_data , flp.id_format,flp.satuan,flp.id_elemen,flp.nama_elemen,dlp.value,dlp.id_approv');
        $this->db->from('stat_laporan_kebudayaan as flp');
        $this->db->where('flp.tahun',$data['tahun']);
        
        $this->db->join('data_laporan_kebudayaan as dlp','dlp.tahun=flp.tahun and dlp.id_format=flp.id_format ','left');
		$res=$this->db->get();

        return $res->result_array();
		//return DataStructure::keyValue($res->result_array(), 'id_kepemilikan_museum');
    }
    public function approvData($id_data){
        $tanggal = date('d-m-Y');

        $id_approv = $this->session->userdata('id_user');
        echo $tanggal;
        echo $id_approv;        
        $data = array(
             'id_approv' => $id_approv, 
             'tanggal_approv' => $tanggal        
             );
        
                $this->db->set($data);
                $this->db->where('id_data', $id_data);
                $this->db->update('data_laporan_pariwisata');
      //  return $data['nomor'];
    }

    public function approvData2($id_data){
        $tanggal = date('d-m-Y');
        $id_approv = $this->session->userdata('id_user');
        echo '||'.$tanggal.'-'.$id_approv.'-'.$id_data.'||';
      //  echo ; 
        $data = array(
             'id_approv' => $id_approv, 
             'tanggal_approv' => $tanggal        
             );
         
                 $this->db->set($data);
                 $this->db->where('id_data', $id_data);
                 $this->db->update('data_laporan_kebudayaan');
       //  return $data['nomor'];
     }
    public function saveTambah($tahun,$value,$id_format){
        $id_entry = $this->session->userdata('id_user');
        $data = array( 
                'tahun' => $tahun,
                'value' => $value,
                'id_format' => $id_format,
                'id_entry' =>  $id_entry,
                'id_approv' => '0'               
                );
        
        $this->db->insert('data_laporan_pariwisata', $data);
        ExceptionHandler::handleDBError($this->db->error(), "Insert DetailMuseum", "data_museum");
        //return $data['nomor'];
    }

    public function saveEdit($id_data,$tahun,$value,$id_format){
        $id_entry = $this->session->userdata('id_user');
       
        $data = array(
            'id_data' => $id_data, 
            'tahun' => $tahun,
            'value' => $value,
            'id_format' => $id_format,
            'id_entry' =>  $id_entry,
            'id_approv' => '0'             
                         
            );
        
                $this->db->set($data);
                $this->db->where('id_data', $data['id_data']);
                $this->db->update('data_laporan_pariwisata');
        //return $data['nomor'];
    }

    public function saveTambah2($tahun,$value,$id_format){
        $id_entry = $this->session->userdata('id_user');
       
        $data = array( 
                'tahun' => $tahun,
                'value' => $value,
                'id_format' => $id_format,
                'id_entry' =>  $id_entry,
                'id_approv' => '0'                  
                );
        
        $this->db->insert('data_laporan_kebudayaan', $data);
        ExceptionHandler::handleDBError($this->db->error(), "Insert DetailMuseum", "data_museum");
        //return $data['nomor'];
    }

    public function saveEdit2($id_data,$tahun,$value,$id_format){
        $id_entry = $this->session->userdata('id_user');
        
        $data = array(
            'id_data' => $id_data, 
            'tahun' => $tahun,
            'value' => $value,
            'id_format' => $id_format,
            'id_entry' =>  $id_entry,
            'id_approv' => '0'            
            );
        
                $this->db->set($data);
                $this->db->where('id_data', $data['id_data']);
                $this->db->update('data_laporan_kebudayaan');
        //return $data['nomor'];
    }

    public function getTahun(){
		$this->db->select('*');
		$this->db->from('tb_tahun');
		$res=$this->db->get();

        return $res->result_array();
		//return DataStructure::keyValue($res->result_array(), 'id_kepemilikan_museum');
	}


}