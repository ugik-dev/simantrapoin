<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('PengirimanModel', 'SecurityModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }

  public function getAllPengiriman()
  {

    // $this->SecurityModel->userOnlyGuard(true);
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PengirimanModel->getAllPengiriman($this->input->POST());
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function DetailPengiriman()
  {
    $this->SecurityModel->userOnlyGuard(FALSE, TRUE);

    // $this->SecurityModel->rolesOnlyGuard(array('admin','frontoffice','backoffice', 'kasi_umum'));
    $pageData = array(
      'title' => 'Detail Pengiriman',
      'content' => 'frontoffice/DetailPengiriman',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      'contentData' => array(
        'id_pengiriman' =>   $this->input->get()['id_pengiriman']
      )
    );
    $this->load->view('Page', $pageData);
  }



  public function addPengiriman()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      // $data['jurnal'] = FileIO::genericUpload3('jurnal', array('pdf'), NULL, $data, '20000');

      // $data['dokumen_permohonan'] = FileIO::genericUpload('dokumen_permohonan', array('pdf'), NULL, $data, '1000');
      if (!empty($data['dokumen_permohonanFilename'])) $data['dokumen_permohonan'] = FileIO::genericUpload('dokumen_permohonan', array('pdf'), NULL, $data, '1000');

      $idPengiriman = $this->PengirimanModel->addPengiriman($data);
      $data = $this->PengirimanModel->getPengiriman($idPengiriman);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }



  public function editPengiriman()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $temp = $this->PengirimanModel->getPengiriman($data['id_pengiriman']);
      if ($temp['id_tahap_proposal'] > '2') {
        throw new UserException("Pengajuan sudah diambil tindakan lanjut, harap lakukan pengajuan dari awal!!", USER_NOT_FOUND_CODE);
      }

      if (!empty($data['dokumen_permohonanFilename'])) $data['dokumen_permohonan'] = FileIO::genericUpload('dokumen_permohonan', array('pdf'), NULL, $data, '1000');
      $idPengiriman = $this->PengirimanModel->editPengiriman($data);
      $data = $this->PengirimanModel->getPengiriman($idPengiriman);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function approv()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $pos = $this->input->post();
      if (!empty($this->input->get()['id_pengiriman'])) {
        $idPengiriman = $this->input->get()['id_pengiriman'];
      } else {
        $idPengiriman = $pos['id_pengiriman'];
      }

      if (!empty($this->input->post()['survey'])) {
        $survey = $this->input->post()['survey'];
      }

      $data = $this->PengirimanModel->getPengiriman($idPengiriman);
      if (!empty($survey)) $data['survey'] = $survey;
      if (!empty($this->input->post()['catatan_1'])) {
        $data['catatan_1'] = $this->input->post()['catatan_1'];
      }

      if (!empty($this->input->post()['catatan_23'])) {
        $data['catatan_23'] = $this->input->post()['catatan_23'];
      }
      if (!empty($this->input->post()['catatan_4'])) {
        $data['catatan_4'] = $this->input->post()['catatan_4'];
      }

      if (!empty($pos['output_no_dokumen'])) $data['output_no_dokumen'] = $pos['output_no_dokumen'];
      $idPengiriman = $this->PengirimanModel->approvPengiriman($data);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function de_approv()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->get();
      $data = $this->PengirimanModel->getPengiriman($this->input->get()['id_pengiriman']);

      $idPengiriman = $this->PengirimanModel->de_approvPengiriman($data);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function not_approv()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      // $output_no_dokumen = $this->input->post()['output_no_dokumen'];
      $catatan = $this->input->post()['catatan'];
      $data = $this->PengirimanModel->getPengiriman($this->input->post()['id_pengiriman']);
      // $data['output_no_dokumen'] = $output_no_dokumen;
      $data['catatan_form'] = $catatan;
      $idPengiriman = $this->PengirimanModel->not_approvPengiriman($data);
      echo json_encode(array('data' => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deletePengiriman()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $temp = $this->PengirimanModel->getPengiriman($data['id_pengiriman']);

      if ($temp['status_proposal'] == 'DITERIMA' || $temp['status_proposal'] == 'DITOLAK') {
        throw new UserException("Pengajuan sudah ada keputusan!!", USER_NOT_FOUND_CODE);
      }

      $this->PengirimanModel->deletePengiriman($data);
      echo json_encode(array());
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  // public function PDF(){
  //   use PhpOffice\PhpWord\PhpWord;

  // }

  public function word()
  {
    // try {
    $this->SecurityModel->userOnlyGuard(TRUE);

    // if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

    $idPengiriman = $this->input->get()['id_pengiriman'];
    $data = $this->PengirimanModel->getPengiriman($idPengiriman);
    // var_dump($data);

    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0));
    // $PHPWord->addParagraphStyle('p3Style', array('align'=>'center', 'spaceAfter'=>100));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph2', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph4', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $noSpace = array('spaceAfter' => 0);

    $paragraphStyleName = 'pStyle';
    $phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
    $phpWord->addParagraphStyle('pS2', array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 50));

    // foreach ($pengirimanItem as $pi) {

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600,
      'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(14),
      'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5)
    ));

    $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 200, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));

    $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName, array('spaceAfter' => 0));
    $table->addRow();
    $table->addCell(1200, $cellVCentered)->addImage(base_url('assets/img/logo-bangka.png'), array('height' => 75, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,  'spaceAfter' => 0));;
    $myCell1 = $table->addCell(9300, $cellVCentered);
    $myCell1->addText('PEMERINTAHAN KABUPATEN BANGKA', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
    $myCell1->addText('DINAS PENANAMAN MODAL, PELAYANAN PERIZINAN TERPADU SATU PINTU', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => TRUE), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
    $myCell1->addText('KOPERASI USAHA MIKRO KECIL DAN MENENGAH', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
    $myCell1->addText('KABUPATEN BANGKA', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));

    // $myCell1->addText($perusahaan['lok_perusahaan_full'] . ', ' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
    $myCell1->addText('Jalan Pemuda Sungailiat (33215) Telp. (0717) 96107 Fax. (0717) 96092', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
    $myCell1->addText('E-Mail : dinpmp2kukm@gmail.com SMS : 0812 7878 1145', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
    // $myCell1->addText('Telp. 0717 9112195, Email : kpb.ladababel@gmail.com', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

    $section->addLine(array('weight' => 1.25, 'width' => 520, 'height' => 0, 'color' => '38c172'), array('spaceAfter' => 0));

    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);
    $table->addRow();
    $table->addCell(1400, $cellVCentered)->addText('', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText('', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText('', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText('Sungailiat, ' . $this->tgl_indo(), 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(1400, $cellVCentered)->addText('Nomor', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($data['output_no_dokumen'], 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText('Kepada Yth :', 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(1400, $cellVCentered)->addText('Sifat', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText('Penting', 'paragraph', $noSpace);
    if ($data['status_proposal'] == 'DITERIMA') {
      $table->addCell(5000, $cellVCentered)->addText('Kepala BKPM RI', 'paragraph', $noSpace);
    } else {
      $table->addCell(5000, $cellVCentered)->addText('Bapak/Ibu ' . $data['nama'], 'paragraph', $noSpace);
    }

    $table->addRow();
    $table->addCell(1400, $cellVCentered)->addText('Lampiran', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    if ($data['status_proposal'] == 'DITERIMA') {
      $table->addCell(5000, $cellVCentered)->addText('-', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText('di', 'paragraph', $noSpace);
    } else {
      $table->addCell(5000, $cellVCentered)->addText('1 (satu) berkas', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText('di', 'paragraph', $noSpace);
    }

    $table->addRow();
    $table->addCell(1400, $cellVCentered)->addText('Perihal', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    if ($data['status_proposal'] == 'DITERIMA') {
      $table->addCell(5000, $cellVCentered)->addText('Persetujuan Pemenuhan Komitmen', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText("\t Jakarta", 'paragraph', $noSpace);
    } else {
      $table->addCell(5000, $cellVCentered)->addText('Pengembalian Berkas dan Penolakan', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText("\t Tempat", 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(1400, $cellVCentered)->addText('', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText('', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText('Penerbitan Izin', 'paragraph', $noSpace);
    }



    $textrun = $section->addTextRun();
    // $year = explode("-", $pengiriman['created_at'])[0];
    $year = 2020;

    if ($data['status_proposal'] == 'DITERIMA') {
      $section->addText("\tSehubungan dengan telah diterbitkannya Izin Usaha / Izin Komersial / Operasional dari Online Single Submission (OSS), dimana izin tersebut akan berlaku efektif setelah yang bersangkutan melakukan pemenuhan komitmen sesuai dengan prasyaratan Izin Usaha / Izin Komersial / Operasional, berdasarkan :", 'paragraph', 'pS2');

      $table = $section->addTable($spanTableStyleName);
      $table->addRow();
      $table->addCell(30, $cellVCentered)->addText('1.', 'paragraph');
      $table->addCell(15000, $cellVCentered)->addText("Peraturan Pemerintah Nomor 24 Tahun 2018 Tentang Pelayanan Perizinan Berusaha Terintegrasi Secara Elektronik", 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(30, $cellVCentered)->addText('2.', 'paragraph', $noSpace);
      $table->addCell(15000, $cellVCentered)->addText("Peraturan Presiden No. 91 Tahun 2017 Tentang Percepatan Pelaksanaan Berusaha", 'paragraph', $noSpace);
      $section->addText("", 'paragraph', 'pS2');

      $section->addText("\tSetelah mempelajarai berkas pemenuhan komitmen yang diajukan, Dinas PMP2KUKM Kabupaten Bangka dapat memberi Persetujuan Kepada :", 'paragraph', 'pS2');


      $table = $section->addTable($spanTableStyleName);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan/Perseorangan', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $nm = '';
      if (!empty($data['nama_badan'])) $nm .= $data['nama_badan'] . ' / ';
      $nm .= $data['nama'];
      $table->addCell(6000, $cellVCentered)->addText($nm, 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('NIB', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText($data['nib'], 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Izin Usaha', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText("", 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jenis Usaha', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText("", 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Lokasi Usaha', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText($data['alamat'], 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Luas Lokasi', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText("", 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Kegiatan Usaha / KBLI', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText("", 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nomor Telepon', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText("", 'paragraph');

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Email', 'paragraph');
      $table->addCell(10, $cellVCentered)->addText(":", 'paragraph');
      $table->addCell(6000, $cellVCentered)->addText("", 'paragraph');

      $section->addText("\tDemikian surat persetujuan ini kami sampaikan, Atas perhatiannya di ucapkan terima kasih", 'paragraph', 'pS2');
    } else {
      $section->addText("\tSehubungan dengan Pengajuan Izin Usaha Mikro Kecil IUMKM pada tanggal ______________ melalui Sistem Online Single Submission (OSS) dengan NIB ______________________ dan telah dilakukan Survey Pemeriksaan Lapangan oleh Tim Teknis pada tanggal _______________________ yang berlokasi di " . $data['alamat'] . ".", 'paragraph', 'pS2');
      $section->addText("\tBerkenaan dengan hal tersebut diatas, dengan ini kami sampaikan hal - hal sebagai berikut :", 'paragraph', 'pS2');
      $section->addTextBreak();

      $table = $section->addTable($spanTableStyleName);
      $table->addRow();
      $table->addCell(50, $cellVCentered)->addText('1.', 'paragraph');
      $table->addCell(15000, $cellVCentered)->addText("", 'paragraph');


      $table->addRow();
      $table->addCell(50, $cellVCentered)->addText('2.', 'paragraph');
      $table->addCell(15000, $cellVCentered)->addText("", 'paragraph');


      $table->addRow();
      $table->addCell(50, $cellVCentered)->addText('3.', 'paragraph');
      $table->addCell(15000, $cellVCentered)->addText("", 'paragraph');
      $section->addTextBreak();

      $section->addText("\tDemikian hal yang kami sampaikan, atas perhatiannya di ucapkan terima kasih", 'paragraph', 'pS2');
    }

    // $section->addText("Berdasarkan Peraturan Gubernur nomor 19 tahun 2020 tentang Tata Kelolah Perdagangan Lada Putih Muntok White Papper, KPB Lada menyatakan keterangan transaksi perdagangan lada :", 'paragraph', 'pS2');
    $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);


    $textrun = $section->addTextRun();
    $textrun->addTextBreak();
    $textrun->addTextBreak();
    $textrun->addText("\t\t\t\t\t\t\t\tKepala Dinas Penanaman Modal,", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => false));
    $textrun->addTextBreak();
    $textrun->addText("\t\t\t\t\t\t\t\tPelayanan Perizinan Terpadu Satu Pintu,", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => false));
    $textrun->addTextBreak();
    $textrun->addText("\t\t\t\t\t\t\t\tKoperasi, Usaha Kecil dan Menengah,", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => false));
    $textrun->addTextBreak();
    $textrun->addText("\t\t\t\t\t\t\t\tKabupaten Bangka,", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => false));

    $textrun->addTextBreak(5);
    $textrun->addText("\t\t\t\t\t\t\t\tIr. ASMAWI ALIE, MT", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => false));
    $textrun->addTextBreak();
    $textrun->addText("\t\t\t\t\t\t\t\tPEMBINA UTAMA MUDA", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => false));
    $textrun->addTextBreak();
    $textrun->addText("\t\t\t\t\t\t\t\tNIP. 19641222 198903 1 009", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => false));
    $nama_file = '';
    if ($data['status_proposal'] == 'DITERIMA') {
      $nama_file .= 'Persetujuan_No';
    } else {
      $nama_file .= 'Penolakan_No';
    }
    $nama_file .= $data['output_no_dokumen'];

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    FileIO::headerDownloadDocx($nama_file);

    $objWriter->save("php://output");
  }

  function tgl_indo()
  {
    $tanggal = date('Y-m-d');
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }
}
