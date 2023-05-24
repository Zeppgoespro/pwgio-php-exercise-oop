<?php

declare(strict_types = 1);

namespace App;

use App\Models\TransactionIn;

class FileHandler
{

  public function import(string $file_path): void
  {
    $handler = fopen($file_path, 'r');

    if ($handler !== false):
      fgetcsv($handler);

      while (($transaction_row = fgetcsv($handler)) !== false):
        $transaction = new TransactionIn($transaction_row);
        $transaction->insert();
      endwhile;

      fclose($handler);

    endif;
  }

}