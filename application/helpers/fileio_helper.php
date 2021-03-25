<?php
class FileIO
{

  public static function uploadPath($field)
  {
    return realpath(APPPATH . '../upload/' . $field) . '\\';
  }

  public static function upload($field, $bidang, $id, $allowedType = NULL, $postfix = NULL)
  {
    $CI = &get_instance();
    $filename = $bidang . '_' . $id . ($postfix ? '_' . $postfix : '');
    $CI->load->library('upload', array(
      'upload_path' => realpath(APPPATH . '../upload/' . $field),
      'allowed_types' => $allowedType != NULL ? $allowedType : 'jpg|jpeg|png|gif|doc|docx|pdf',
      'max_size' => '10240',
      'file_name' =>  $allowedType == 'pdfxx' ? 'temp' : $filename,
      'overwrite' => TRUE
    ));
    if (!$CI->upload->do_upload($field)) {
      throw new UserException($CI->upload->display_errors(), UPLOAD_FAILED_CODE);
    } else {
      if ($allowedType == 'pdfxx') {
        FileIO::genCompatPDF($field, $CI->upload->data()['file_name'], $filename . '.pdf');
        return $filename . '.pdf';
      } else {
        return $CI->upload->data()['file_name'];
      }
    }
  }

  public static function upload_size($field, $folder, $type, $allowedType = NULL, $size)
  {
    $CI = &get_instance();
    $CI->load->library('upload');
    $CI->upload->initialize(array(
      'upload_path' => realpath(APPPATH . '../upload/' . $folder),
      'allowed_types' => $allowedType != NULL ? $allowedType : 'jpg|jpeg|png|pdf',
      'max_size' =>  $size,

      'encrypt_name' => true,
    ));
    if (!$CI->upload->do_upload($field)) {
      throw new UserException($CI->upload->display_errors(), UPLOAD_FAILED_CODE);
    } else {
      return [
        'type' => $type,
        'filename' => $CI->upload->data()['file_name'],
        'url' => "upload/{$folder}/{$CI->upload->data()['file_name']}",
        'size' => round($CI->upload->data()['file_size']),
      ];
    }
  }

  public static function resize($data, $quality = '70%', $dimension)
  {

    $CI = &get_instance();
    $config['create_thumb'] = FALSE;
    $config['maintain_ratio'] = TRUE;
    $config['width'] = $dimension;
    $config['height'] = $dimension;
    $config['quality'] = $quality;
    $config['source_image'] = $data['url'];
    $config['image_library'] = 'gd2';

    $CI->load->library('image_lib', $config);
    $CI->load->helper('file');
    // die(var_dump( filesize($config['source_image'])));

    $CI->image_lib->initialize($config);
    $CI->image_lib->resize();
    return 0;
  }

  public static function upload_compress($data, $field, $type, $allowedType = NULL, $size, $compress, $dimension = 1000)
  {

    $CI = &get_instance();
    $CI->load->library('upload');
    $CI->upload->initialize(array(
      'upload_path' => realpath(APPPATH . '../upload/' . $field),
      'allowed_types' => $allowedType != NULL ? $allowedType : 'jpg|jpeg|png|pdf',
      'encrypt_name' => true,
    ));
    if (!$CI->upload->do_upload($field)) {
      throw new UserException($CI->upload->display_errors(), UPLOAD_FAILED_CODE);
    } else {
      $dat = array(
        'type' => $type,
        'filename' => $CI->upload->data()['file_name'],
        'url' => "upload/{$field}/{$CI->upload->data()['file_name']}",
        'size' => round($CI->upload->data()['file_size'])
      );
      $CI->load->helper('file');
      $fs = filesize($dat['url']);

      FileIO::resize($dat, $compress, $dimension);
      $fs = filesize($dat['url']);
      return $dat['filename'];
    }
  }


  public static function deletefl($url)
  {
    $path = realpath(APPPATH . '../' . $url);
    if (!empty($url) && file_exists($path)) {
      if (!unlink($path)) {
        throw new UserException('Gagal mengahapus ', 0);
      }
    } else {
      // throw new UserException('File tidak ada', FILE_NOT_FOUND);
    }

    return NULL;
  }


  public static function delete($field, $filename)
  {
    $path = realpath(APPPATH . '../upload/' . $field . '/' . $filename);
    if (!empty($filename) && file_exists($path)) {
      if (!unlink($path)) {
        throw new UserException('Gagal mengahapus ' . $field, 0);
      }
    } else {
      // throw new UserException('File tidak ada', FILE_NOT_FOUND);
    }

    return NULL;
  }

  public static function headerDownloadxlsx($title)
  {
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $title . '.xlsx"');
    header('Cache-Control: max-age=0');
  }

  public static function headerDownloadxls($title)
  {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $title . '.xls"');
    header('Cache-Control: max-age=0');
  }

  public static function headerDownloadZip($path, $title)
  {
    header("Content-Disposition: attachment; filename=$title");
    header("Content-length: " . filesize($path . $title));
    header("Content-type: application/zip");
    header('Cache-Control: max-age=0');
  }

  public static function genCompatPDF($field, $oldFilename, $filename)
  {
    $oldFilename = "./upload/{$field}/{$oldFilename}";
    $newFilename = "./upload/{$field}/{$filename}";
    putenv('PATH=C:\Program Files\gs\gs9.26\bin');
    shell_exec('gswin64 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=' . $newFilename . ' ' . $oldFilename);
    FileIO::delete($field, $oldFilename);
  }

  public static function headerDownloadDocx($title)
  {
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment;filename="' . $title . '.docx"');
    header('Cache-Control: max-age=0');
  }

  public static function genericUpload($field, $allowedType, $oldData = NULL, $data, $size)
  {
    $filename = NULL;
    $filename = !empty($_FILES[$field]['name']) ? FileIO::upload_size($field, $field, NULL, $allowedType, $size)['filename'] : (!empty($oldData[$field]) ? $oldData[$field] : NULL);
    $filename = !empty($data["delete_{$field}"]) ? FileIO::deletefl("/upload/{$field}/" . $data["delete_{$field}"]) : $filename;
    // die(var_dump($filename));
    return $filename;
  }
}
