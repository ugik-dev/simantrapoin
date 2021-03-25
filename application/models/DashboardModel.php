<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {


    public function getJumlahCagarbudaya(){
      $tmp = "";
        if(!empty($this->session->userdata('id_kabupaten'))){ $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
            $tmp = $this->session->userdata('id_kabupaten');
        
            $tmp = 'where id_kabupaten = "'.$tmp.'"';
       
        };
        $sql = 'sum(domestik) as domestik_cagarbudaya,sum(mancanegara) as mancanegara_cagarbudaya,sum(jumlah) as totalpengunjung_cagarbudaya,( SELECT count(*) FROM cagarbudaya '.$tmp.') as jumlah_cagarbudaya ';
    
        $this->db->select($sql);
        $this->db->where('approv != 0');
        $this->db->from('rec_cagarbudaya as cb');

        $res = $this->db->get();
        $res = $res->result_array();

        return $res[0];
        }

    public function getJumlahPenginapan(){
        $tmp = "";
	    if(!empty($this->session->userdata('id_kabupaten'))){ $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
            $tmp = $this->session->userdata('id_kabupaten');
         //   echo $tmp;
            $tmp = 'where id_kabupaten = "'.$tmp.'"';
          //  echo $tmp;
        };
        $this->db->select('sum(domestik_personal) as domestik_pp,sum(mancanegara_personal) as mancanegara_pp,sum(jumlah_personal) as totalpp,
        sum(domestik_durasi) as domestik_durasi,sum(mancanegara_durasi) as mancanegara_durasi,sum(jumlah_durasi) as totaldurasi,
        ( SELECT count(*) FROM pariwisata_penginapan '.$tmp.') as jumlah_penginapan ');
        $this->db->from('rec_penginapan as cb');
        $this->db->where('approv != 0');
        $res = $this->db->get();
        $res = $res->result_array();
    
        return $res[0];
        }

    
    public function getAllCagarbudaya(){
   
        $this->db->select('tahun,bulan,nama_bulan,sum(mancanegara) AS `man`,sum(domestik) as `dom`');
        $this->db->from('rec_cagarbudaya');
        $this->db->where('approv != 0');
        $this->db->where("domestik !=",null);
        $this->db->group_by('tahun, bulan');
        $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    
    public function getAllPenginapan(){
   
        $this->db->select('tahun,bulan,nama_bulan,sum(mancanegara_personal) AS `man`,sum(domestik_personal) as `dom`');
        $this->db->from('rec_penginapan');
        $this->db->where("domestik_personal !=",null);
        $this->db->where('approv != 0');
        $this->db->group_by('tahun, bulan');
        $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }

    public function getAllObjekwisata(){
   
        $this->db->select('tahun,bulan,nama_bulan,sum(mancanegara) AS `man`,sum(domestik) as `dom`');
        $this->db->from('rec_objek');
        $this->db->where("domestik !=",null);
        $this->db->where('approv != 0');
        $this->db->group_by('tahun, bulan');
        $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    
    public function getChart1($filter){
       // echo $filter['tahun'];
        $this->db->select('tahun, bulan, Coalesce(sum(jumlah),0) as chart,id_kabupaten');
        $this->db->from('rec_cagarbudaya as ob');
        $this->db->group_by('tahun, bulan');
        $this->db->order_by('tahun desc ,bulan asc');
        $this->db->where('approv != 0');
        if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
        if(!empty($filter['wilayah'])) $this->db->where('id_kabupaten', $filter['wilayah']);
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
        public function getChart1objek($filter){
            // echo $filter['tahun'];
             $this->db->select('tahun, bulan, Coalesce(sum(jumlah),0) as chart');
             $this->db->from('approv_rec_objek as ob');
             $this->db->group_by('tahun, bulan');
             $this->db->order_by('tahun desc ,bulan asc');
             $this->db->where('approv != 0');
             if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
             if(!empty($filter['wilayah'])) $this->db->where('id_kabupaten', $filter['wilayah']);
             $res = $this->db->get();
             $res = $res->result_array();
         
             return $res;
        }



        public function getChart1penginapan($filter){
            // echo $filter['tahun'];
             $this->db->select('tahun, bulan, Coalesce(sum(jumlah_personal),0) as chart');
             $this->db->from('rec_penginapan as ob');
             $this->db->group_by('tahun, bulan');
             $this->db->where('approv != 0');
             $this->db->order_by('tahun desc ,bulan asc');
             if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
             if(!empty($filter['wilayah'])) $this->db->where('id_kabupaten', $filter['wilayah']);
             $res = $this->db->get();
             $res = $res->result_array();
         
             return $res;
        }     

        public function getChart1museum($filter){
            // echo $filter['tahun'];
             $this->db->select('tahun, bulan, Coalesce(sum(jumlah),0) as chart');
             $this->db->from('rec_museum as ob');
             $this->db->group_by('tahun, bulan');
             $this->db->order_by('tahun desc ,bulan asc');
             $this->db->where('approv != 0');
             if(!empty($filter['tahun'])) $this->db->where('tahun', $filter['tahun']);
             if(!empty($filter['wilayah'])) $this->db->where('id_kabupaten', $filter['wilayah']);
             $res = $this->db->get();
             $res = $res->result_array();
         
             return $res;
        } 

        public function getChart2Objek($filter){
            // echo $filter['tahun'];
             $this->db->select('kabupaten.id_kabupaten, Coalesce(sum(domestik_l + mancanegara_l),0) as d_l,Coalesce(sum(domestik_p + mancanegara_p),0) as d_p');
             $this->db->from('approv_rec_objek as ob');
             $this->db->join('kabupaten','ob.id_kabupaten = kabupaten.id_kabupaten','right');
             $this->db->group_by('id_kabupaten');
             $this->db->order_by('id_kabupaten');
           // $this->db->where('approv != 0');
             if(!empty($filter['tahun'])) $this->db->where('ob.tahun', $filter['tahun']);
             $res = $this->db->get();
             $res = $res->result_array();
         
             return $res;
        }

        public function getChart2Cagarbudaya($filter){
            // echo $filter['tahun'];
             $this->db->select('kabupaten.id_kabupaten, Coalesce(sum(domestik_l+mancanegara_l),0) as d_l,Coalesce(sum(domestik_p+mancanegara_p),0) as d_p');
             $this->db->from('approv_rec_cagarbudaya as ob');
             $this->db->join('kabupaten','ob.id_kabupaten = kabupaten.id_kabupaten','right');
             $this->db->group_by('id_kabupaten');
             $this->db->order_by('id_kabupaten');
           //  $this->db->where('approv != 0');
             if(!empty($filter['tahun'])) $this->db->where('ob.tahun', $filter['tahun']);
             $res = $this->db->get();
             $res = $res->result_array();
         
             return $res;
        }

        public function getChart2Museum($filter){
            // echo $filter['tahun'];
             $this->db->select('kabupaten.id_kabupaten, Coalesce(sum(domestik_l+mancanegara_l),0) as d_l,Coalesce(sum(domestik_p+mancanegara_p),0) as d_p');
             $this->db->from('approv_rec_museum as ob');
             $this->db->join('kabupaten','ob.id_kabupaten = kabupaten.id_kabupaten','right');
             $this->db->group_by('id_kabupaten');
             $this->db->order_by('id_kabupaten');
           //  $this->db->where('approv != 0');
             if(!empty($filter['tahun'])) $this->db->where('ob.tahun', $filter['tahun']);
             $res = $this->db->get();
             $res = $res->result_array();
         
             return $res;
        }

        public function getChart2Penginapan($filter){
             $this->db->select('k.id_kabupaten,tahun, Coalesce(sum(domestik_personal_l+mancanegara_personal_l),0) as d_l,Coalesce(sum(domestik_personal_p+mancanegara_personal_p),0) as d_p');
             $this->db->from('kabupaten as k');
             $this->db->join('approv_rec_penginapan as rp','rp.id_kabupaten = k.id_kabupaten','left');
               
             $this->db->order_by('rp.id_kabupaten');
     
             if(!empty($filter['tahun'])){
                $this->db->group_by('k.id_kabupaten,tahun');
                $this->db->where('tahun', $filter['tahun']);

             }else{
                $this->db->group_by('k.id_kabupaten');
            };
             //if(!empty($filter['tahun'])) 
             $res = $this->db->get();
             return $res->result_array();
        }
    
    
    public function getJumlahObjekwisata(){
        $tmp = "";
	    if(!empty($this->session->userdata('id_kabupaten'))){ $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
            $tmp = $this->session->userdata('id_kabupaten');
         //   echo $tmp;
            $tmp = 'where id_kabupaten = "'.$tmp.'"';
          //  echo $tmp;
        };
        $this->db->select('sum(domestik) as domestik_objekwisata,sum(mancanegara) as mancanegara_objekwisata,
        sum(jumlah) as totalpengunjung_objekwisata,
        ( SELECT count(*) FROM pariwisata_objek '.$tmp.') as jumlah_objekwisata ');
        $this->db->from('rec_objek as cb');
    
        $res = $this->db->get();
        $res = $res->result_array();
    
        return $res[0];
        }  

    public function getStrukturCagarbudaya(){
        $this->db->select('sum(jumlah) as value, sp.id_kabupaten, sp.nama_kabupaten ');
        $this->db->from('kabupaten as sp');
        $this->db->join('rec_cagarbudaya  as jp','jp.id_kabupaten = sp.id_kabupaten','left');       
        $this->db->order_by('sp.id_kabupaten');
        $this->db->group_by('sp.id_kabupaten');    
        $res = $this->db->get();
        $res = $res->result_array();
    
        return $res;
        }
    public function getStrukturObjek(){
        $this->db->select('count(id_objek) as value, sp.id_kabupaten, sp.nama_kabupaten ');
        $this->db->from('kabupaten as sp');
        $this->db->join('pariwisata_objek  as jp','jp.id_kabupaten = sp.id_kabupaten','left');       
        $this->db->order_by('sp.id_kabupaten');
        $this->db->group_by('sp.id_kabupaten');    
        $res = $this->db->get();
        $res = $res->result_array();
    
        return $res;
        } 

    public function getStrukturSenibudaya(){
        $this->db->select('count(id_senibudaya) as value, sp.id_kabupaten, sp.nama_kabupaten ');
        $this->db->from('kabupaten as sp');
        $this->db->join('senibudaya  as jp','jp.id_kabupaten = sp.id_kabupaten','left');       
        $this->db->order_by('sp.id_kabupaten');
        $this->db->group_by('sp.id_kabupaten');    
        $res = $this->db->get();
        $res = $res->result_array();
    
        return $res;
        }      
    public function getStrukturBiro(){
        $this->db->select('count(id_biro) as value, sp.id_kabupaten, sp.nama_kabupaten ');
        $this->db->from('kabupaten as sp');
        $this->db->join('pariwisata_biro  as jp','jp.id_kabupaten = sp.id_kabupaten','left');       
        $this->db->order_by('sp.id_kabupaten');
        $this->db->group_by('sp.id_kabupaten');    
        $res = $this->db->get();
        $res = $res->result_array();
    
        return $res;
        }      
    
    public function getStrukturPagelaran(){
	
        	
        $this->db->select('count(id_pagelaran) as val, kab.id_kabupaten,kab.nama_kabupaten');
        $this->db->from('events_approv as sp');
        $this->db->join('kabupaten as kab','kab.id_kabupaten = sp.id_kabupaten','right');
        
        $this->db->group_by('kab.id_kabupaten');
        $this->db->order_by('kab.id_kabupaten');

        $res = $this->db->get();
        $res = $res->result_array();

        return $res;
        }
    public function getStrukturPenginapan(){
	
        	
        $this->db->select('count(jumlah_personal) as value, sp.id_kabupaten, sp.nama_kabupaten ');
        $this->db->from('kabupaten as sp');
        $this->db->join('rec_penginapan  as jp','jp.id_kabupaten = sp.id_kabupaten','left');
       
        
        
        $this->db->order_by('sp.id_kabupaten');
        $this->db->group_by('sp.id_kabupaten');
        $res = $this->db->get();
        $res = $res->result_array();

        return $res;
        }

    public function getSenibudaya(){
	
        $this->db->select('count(*) as jumlahsenibudaya, nama_j_senibudaya');
        $this->db->from('senibudaya as sp');
        $this->db->join('j_senibudaya as jp','jp.id_j_senibudaya = sp.id_j_senibudaya');
        //$this->db->where();
        $this->db->group_by('sp.id_j_senibudaya');
        $res = $this->db->get();
        $res = $res->result_array();
        // $res = DataStructure::keyValue($res->result_array(), 'id_j_senibudaya');
        return $res;
        }


    public function getTahun(){
	
        $this->db->select('*');
        $this->db->from('tb_tahun');
        $res = $this->db->get();
        $res = $res->result_array();
       // $res = DataStructure::keyValue($res->result_array());
        return $res;
        }
	public function getDetailPenginapan($id){
		$this->db->select('*');
		$this->db->from('rec_penginapan as rc');
		$this->db->where("rc.nomor",$id);
		$row = $this->db->get();

		if (empty($row)){
			throw new UserException("DetailPenginapan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		
		$res = DataStructure::keyValue($row->result_array(), 'nomor');
		return $res[$id];
	    }

    public function getLocCagarbudaya(){

        $this->db->select('id_cagarbudaya,nama,lokasi');
        $this->db->from('cagarbudaya as cb');
        $this->db->where('id_user_approv != 0');
        // if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();
        
        return $res;
        }
    
    public function getLocObjek(){	
        $this->db->select('id_objek,nama,lokasi');
        $this->db->from('pariwisata_objek as cb');
        $this->db->where('id_user_approv != 0');
        //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();  
        return $res;
        }
    public function getLocMuseum(){	
        $this->db->select('id_museum,nama,lokasi');
        $this->db->from('museum as cb');
        $this->db->where('id_user_approv != 0');
        //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    public function getLocPenginapan(){	
        $this->db->select('id_penginapan,nama,lokasi');
        $this->db->from('pariwisata_penginapan as cb');
        $this->db->where('id_user_approv != 0');
        //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    
    public function getLocUsaha(){	
        $this->db->select('id_usaha,nama,lokasi');
        $this->db->from('pariwisata_usaha as cb');
        $this->db->where('id_user_approv != 0');
        //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    
    public function getLocBiro(){	
        $this->db->select('id_biro,nama,lokasi');
        $this->db->from('pariwisata_biro as cb');
        $this->db->where('id_user_approv != 0');
        //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    
    public function getLocSaranaprasarana(){	
        $this->db->select('id_saranaprasarana,nama,lokasi');
        $this->db->from('senibudaya_saranaprasarana as cb');

        //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    
    public function getLocSenibudaya(){	
        $this->db->select('id_senibudaya,nama,lokasi');
        $this->db->from('senibudaya as cb');
        $this->db->where('id_user_approv != 0');
        //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
        }
    
    public function getLocPagelaran(){	
            $this->db->select('id_pagelaran,nama,lokasi');
            $this->db->from('senibudaya_pagelaranpameran as cb');
            $this->db->where('id_user_approv != 0');
            //if(!empty($this->session->userdata('id_kabupaten'))) $this->db->where('cb.id_kabupaten', $this->session->userdata('id_kabupaten'));
            $res = $this->db->get();
            $res = $res->result_array();
                return $res;
            }
        
            
    public function getAllPajak(){
        //$year = date('Y');
        $year = '2020';
        $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
        $this->db->from('approv_rec_cagarbudaya');
       $this->db->where('tahun',$year);
        $this->db->group_by('tahun');
       // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $pajak[0] = $res->result_array();
        if(empty( $pajak[0])){
            $pajak[0][0]['pajak'] = 0;
            $pajak[0][0]['retribusi'] = 0;
            $pajak[0][0]['domestik'] = 0;
            $pajak[0][0]['mancanegara'] = 0; 
        }
        $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
        $this->db->from('approv_rec_objek');
       $this->db->where('tahun',$year);
        $this->db->group_by('tahun');
       // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $pajak[1] = $res->result_array();
        if(empty( $pajak[1])){
            $pajak[1][0]['pajak'] = 0;
            $pajak[1][0]['retribusi'] = 0;
            $pajak[1][0]['domestik'] = 0;
            $pajak[1][0]['mancanegara'] = 0; 
        }
        $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
        $this->db->from('approv_rec_museum');
       $this->db->where('tahun',$year);
        $this->db->group_by('tahun');
       // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $pajak[2] = $res->result_array();
        if(empty( $pajak[2])){
            $pajak[2][0]['pajak'] = 0;
            $pajak[2][0]['retribusi'] = 0;
            $pajak[2][0]['domestik'] = 0;
            $pajak[2][0]['mancanegara'] = 0; 
        }
        $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara_personal),0) AS `mancanegara`, Coalesce(sum(domestik_personal),0) AS `domestik`');
        $this->db->from('approv_rec_penginapan');
       $this->db->where('tahun',$year);
        $this->db->group_by('tahun');
       // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $pajak[3] = $res->result_array();
        if(empty( $pajak[3])){
            $pajak[3][0]['pajak'] = 0;
            $pajak[3][0]['retribusi'] = 0;
            $pajak[3][0]['domestik'] = 0;
            $pajak[3][0]['mancanegara'] = 0; 
        }
        $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
        $this->db->from('approv_rec_desawisata');
       $this->db->where('tahun',$year);
        $this->db->group_by('tahun');
       // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $pajak[4] = $res->result_array();
        if(empty( $pajak[0])){
            $pajak[4][0]['pajak'] = 0;
            $pajak[4][0]['retribusi'] = 0;
            $pajak[4][0]['domestik'] = 0;
            $pajak[4][0]['mancanegara'] = 0; 
        }
       // var_dump($pajak);
        $rest['pajak'] =  $pajak[0][0]['pajak'] + $pajak[1][0]['pajak'] + $pajak[2][0]['pajak'] + $pajak[3][0]['pajak'] +$pajak[4][0]['pajak'];
        $rest['retribusi'] =  $pajak[0][0]['retribusi'] + $pajak[1][0]['retribusi'] + $pajak[2][0]['retribusi'] + $pajak[3][0]['retribusi'] +$pajak[4][0]['retribusi'];
        $rest['domestik'] =  $pajak[0][0]['domestik'] + $pajak[1][0]['domestik'] + $pajak[2][0]['domestik'] + $pajak[3][0]['domestik'] +$pajak[4][0]['domestik'];
        $rest['mancanegara'] =  $pajak[0][0]['mancanegara'] + $pajak[1][0]['mancanegara'] + $pajak[2][0]['mancanegara'] + $pajak[3][0]['mancanegara'] +$pajak[4][0]['mancanegara'];
       // var_dump($rest); 

       //======
       $year = '2019';
       $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
       $this->db->from('approv_rec_cagarbudaya');
      $this->db->where('tahun',$year);
       $this->db->group_by('tahun');
      // $this->db->order_by('tahun desc ,bulan desc');
       $res = $this->db->get();
       $pajak[0] = $res->result_array();
       if(empty( $pajak[0])){
           $pajak[0][0]['pajak'] = 0;
           $pajak[0][0]['retribusi'] = 0;
           $pajak[0][0]['domestik'] = 0;
           $pajak[0][0]['mancanegara'] = 0; 
       }
       $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
       $this->db->from('approv_rec_objek');
      $this->db->where('tahun',$year);
       $this->db->group_by('tahun');
      // $this->db->order_by('tahun desc ,bulan desc');
       $res = $this->db->get();
       $pajak[1] = $res->result_array();
       if(empty( $pajak[1])){
           $pajak[1][0]['pajak'] = 0;
           $pajak[1][0]['retribusi'] = 0;
           $pajak[1][0]['domestik'] = 0;
           $pajak[1][0]['mancanegara'] = 0; 
       }
       $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
       $this->db->from('approv_rec_museum');
      $this->db->where('tahun',$year);
       $this->db->group_by('tahun');
      // $this->db->order_by('tahun desc ,bulan desc');
       $res = $this->db->get();
       $pajak[2] = $res->result_array();
       if(empty( $pajak[2])){
           $pajak[2][0]['pajak'] = 0;
           $pajak[2][0]['retribusi'] = 0;
           $pajak[2][0]['domestik'] = 0;
           $pajak[2][0]['mancanegara'] = 0; 
       }
       $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara_personal),0) AS `mancanegara`, Coalesce(sum(domestik_personal),0) AS `domestik`');
       $this->db->from('approv_rec_penginapan');
      $this->db->where('tahun',$year);
       $this->db->group_by('tahun');
      // $this->db->order_by('tahun desc ,bulan desc');
       $res = $this->db->get();
       $pajak[3] = $res->result_array();
       if(empty( $pajak[3])){
           $pajak[3][0]['pajak'] = 0;
           $pajak[3][0]['retribusi'] = 0;
           $pajak[3][0]['domestik'] = 0;
           $pajak[3][0]['mancanegara'] = 0; 
       }
       $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`, Coalesce(sum(retribusi),0) AS `retribusi`, Coalesce(sum(mancanegara),0) AS `mancanegara`, Coalesce(sum(domestik),0) AS `domestik`');
       $this->db->from('approv_rec_desawisata');
      $this->db->where('tahun',$year);
       $this->db->group_by('tahun');
      // $this->db->order_by('tahun desc ,bulan desc');
       $res = $this->db->get();
       $pajak[4] = $res->result_array();
       if(empty( $pajak[0])){
           $pajak[4][0]['pajak'] = 0;
           $pajak[4][0]['retribusi'] = 0;
           $pajak[4][0]['domestik'] = 0;
           $pajak[4][0]['mancanegara'] = 0; 
       }
      // var_dump($pajak);
       $rest['pajak2'] =  $pajak[0][0]['pajak'] + $pajak[1][0]['pajak'] + $pajak[2][0]['pajak'] + $pajak[3][0]['pajak'] +$pajak[4][0]['pajak'];
       $rest['retribusi2'] =  $pajak[0][0]['retribusi'] + $pajak[1][0]['retribusi'] + $pajak[2][0]['retribusi'] + $pajak[3][0]['retribusi'] +$pajak[4][0]['retribusi'];
       $rest['domestik2'] =  $pajak[0][0]['domestik'] + $pajak[1][0]['domestik'] + $pajak[2][0]['domestik'] + $pajak[3][0]['domestik'] +$pajak[4][0]['domestik'];
       $rest['mancanegara2'] =  $pajak[0][0]['mancanegara'] + $pajak[1][0]['mancanegara'] + $pajak[2][0]['mancanegara'] + $pajak[3][0]['mancanegara'] +$pajak[4][0]['mancanegara'];
      // var_dump($rest);
        return $rest;
        }
    public function getPajakCagarbudaya(){
        $year = date('Y');
        $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`');
        $this->db->from('rec_cagarbudaya');
       $this->db->where('approv != 0');
       $this->db->where('tahun',$year);
        $this->db->group_by('tahun');
       // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $res = $res->result_array();
         return $res;
        }
    public function getPajakObjek(){
        $year = date('Y');
        $this->db->select('Coalesce(sum(pajak),0) AS `pajak`');
        $this->db->from('approv_rec_objek');
      //  $this->db->where('approv != 0');
       $this->db->where('tahun',$year);
     //  $this->db->group_by('tahun');
        // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $res = $res->result_array();
            return $res;
        }
    public function getPajakPenginapan(){
        $year = date('Y');
        $this->db->select('tahun, Coalesce(sum(pajak),0) AS `pajak`');
        $this->db->from('rec_penginapan');
        $this->db->where('approv != 0');
        $this->db->where('tahun',$year);
        $this->db->group_by('tahun');
        // $this->db->order_by('tahun desc ,bulan desc');
        $res = $this->db->get();
        $res = $res->result_array();
            return $res;
        }
}
?>