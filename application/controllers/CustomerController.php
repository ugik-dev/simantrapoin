<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array('CustomerModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    }

    public function index()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $pageData = array(
            'title' => 'Beranda',
            'content' => 'customer/Pengajuan',
            // 'content' => 'Dashboard',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        // echo json_encode($this->session->userdata());
        $this->load->view('Page', $pageData);
    }

    public function pengajuan()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $pageData = array(
            'title' => 'Pengajuan',
            'content' => 'customer/Pengajuan',
            // 'content' => 'Dashboard',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function request_customer()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $pageData = array(
            'title' => 'Pengajuan',
            'content' => 'customer/RequestAccount',
            // 'content' => 'Dashboard',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }

    public function panduan()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $pageData = array(
            'title' => 'Panduan',
            'content' => 'customer/PanduanPage',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
            'contentData' => array(),
        );
        $this->load->view('Page', $pageData);
    }

    // public function Message(){
    //   $this->SecurityModel->roleOnlyGuard('customer');
    // 	$pageData = array(
    // 		'title' => 'Mail Box',
    //     'content' => 'customer/Message',
    //     'breadcrumb' => array(
    //       'Home' => base_url(),
    //     ),
    // 	);
    //   $this->load->view('Page', $pageData);
    // }


    public function Kelolahuser()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $pageData = array(
            'title' => 'Kelolah User',
            'content' => 'customer/Kelolahuser',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }
    public function ExportPengunjung()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $getdata = $this->input->get();



        if ($getdata['tb'] == 'objek') {
            $filter['id_objek'] = $getdata['id_data'];
            $data_profil = $this->DetailObjekModel->getProfil($filter);
            $header_pdf = 'Daya Tarik Wisata';
        } else if ($getdata['tb'] == 'penginapan') {
            $filter['id_penginapan'] = $getdata['id_data'];
            $data_profil = $this->DetailPenginapanModel->getProfil($filter);
            $header_pdf = 'Penginapan';
        } else if ($getdata['tb'] == 'cagarbudaya') {
            $filter['id_cagarbudaya'] = $getdata['id_data'];
            $data_profil = $this->DetailCagarbudayaModel->getProfil($filter);
            $header_pdf = 'Cagar dan Budaya';
        } else if ($getdata['tb'] == 'museum') {
            $filter['id_museum'] = $getdata['id_data'];
            $data_profil = $this->DetailMuseumModel->getProfil($filter);
            $header_pdf = 'Museum';
        } else if ($getdata['tb'] == 'desawisata') {
            $filter['id_desawisata'] = $getdata['id_data'];
            $data_profil = $this->DetailDesawisataModel->getProfil($filter);
            $header_pdf = 'Desa Wisata';
        } else if ($getdata['tb'] == 'biro') {
            $filter['id_biro'] = $getdata['id_data'];
            $data_profil = $this->DetailBiroModel->getProfil($filter);
            $header_pdf = 'Biro dan Agen Wisata';
        } else if ($getdata['tb'] == 'usaha') {
            $filter['id_usaha'] = $getdata['id_data'];
            $data_profil = $this->DetailUsahaModel->getProfil($filter);
            $header_pdf = 'Usaha dan Jasa';
        };

        $filter['id_user'] = $data_profil['id_user_entry'];
        $entry = $this->DetailCagarbudayaModel->getUser($filter);
        //var_dump($approv);
        if ($data_profil['id_user_approv'] == '0') {
            $approv['nama'] = 'Data Belum Approv';
        } else {
            $filter['id_user'] = $data_profil['id_user_approv'];
            $approv = $this->DetailCagarbudayaModel->getUser($filter);
        };


        $pageData = array(
            'getdata' => $getdata,
            'data' => $this->PengunjungModel->getPengunjung($getdata),
            'data_profil' => $data_profil,
            'header' => $header_pdf,
            'nama_approv' => $approv['nama'],
            'nama_entry' => $entry['nama'],
            'tahun' => $getdata['tahun']
        );
        $this->load->view('PdfPengunjung', $pageData);
    }

    public function Laporan()
    {
        $this->SecurityModel->roleOnlyGuard('customer');

        $tahun = $this->LaporanModel->getTahun();

        $i = 0;
        foreach ($tahun as $th) {
            $vp[$th['tahun']] = $this->LaporanModel->p1($th['tahun']);
            $vb[$th['tahun']] = $this->LaporanModel->p2($th['tahun']);
            $i++;
        };
        $pageData = array(
            'datapariwisata' => $this->LaporanModel->getFormat(),
            'datakebudayaan' => $this->LaporanModel->getFormat2(),
            'tahun' => $this->LaporanModel->getTahun(),
            'vp' => $vp,
            'vb' => $vb,

        );
        //var_dump($vb);
        $this->load->view('customer/Laporan', $pageData);
    }

    public function PdfCagarbudaya()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $id = $this->input->get();
        $dataProfil = $this->DetailCagarbudayaModel->getProfil($id);
        $tmp['id_user'] = $dataProfil['id_user_approv'];
        $approv = $this->DetailCagarbudayaModel->getUser($tmp);
        $tmp['id_user'] = $dataProfil['id_user_entry'];
        $entry = $this->DetailCagarbudayaModel->getUser($tmp);
        $kabupaten = $this->DetailCagarbudayaModel->getKabupaten($dataProfil['id_kabupaten']);
        $pageData = array(
            'dataProfil' => $dataProfil,
            'approv' => $approv['nama'],
            'entry' => $entry['nama'],
            'kabupaten' => $kabupaten
        );
        $this->load->view('customer/Pdfcagarbudaya', $pageData);
    }
    public function Kalender()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $pageData = array(
            'title' => 'Event',
            'content' => 'Kalender',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }



    public function test()
    {
        $this->SecurityModel->roleOnlyGuard('customer');
        $pageData = array(
            'title' => 'test',
            'content' => 'customer/test',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }
}
