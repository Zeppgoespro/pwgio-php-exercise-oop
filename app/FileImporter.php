<?php

declare(strict_types = 1);

namespace App;

use App\Models\Transaction;

class FileImporter
{

  public function import(string $file_path): void
  {
    $handler = fopen($file_path, 'r');

    if ($handler !== false):
      fgetcsv($handler);

      while (($transaction_row = fgetcsv($handler)) !== false):
        $transaction = new Transaction($transaction_row);
        $transaction->insert();
      endwhile;

      fclose($handler);

    endif;
  }

}