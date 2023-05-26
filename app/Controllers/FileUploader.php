<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\FileHandler;

class FileUploader
{
  public function uploader(): View
  {
    return View::make('uploader');
  }

  public function upload_file(): void
  {
    $file_count = count($_FILES['upload_file']['name']);

    if ($_FILES['upload_file']['name'][0] === ''):

      $_SESSION['msg'] = 'There is no files uploaded!';

      header('Location: /');
      exit;

    else:

      for ($i = 0; $i < $file_count; $i++):

        $file_name = $_FILES['upload_file']['name'][$i];
        $file_tmp_name = $_FILES['upload_file']['tmp_name'][$i];
        $file_path = STORAGE_PATH . '/' . $file_name;

        move_uploaded_file($file_tmp_name, $file_path);

        (new FileHandler())->import($file_path);

      endfor;

      if ($file_count < 2):
        $_SESSION['msg'] = 'File uploaded successfully!';
      else:
        $_SESSION['msg'] = 'Files uploaded successfully!';
      endif;

      header('Location: /');
      exit;

    endif;
  }
}