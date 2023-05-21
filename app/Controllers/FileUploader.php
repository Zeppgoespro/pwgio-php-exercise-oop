<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class FileUploader
{
  public function uploader(): View
  {
    return View::make('uploader');
  }
}