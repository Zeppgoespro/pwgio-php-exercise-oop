<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\TransactionOut;
use App\View;

class TransactionController
{

  public function render(): View
  {
    return View::make('transactions', ['transactions' => (new TransactionOut)->pull_from_table()]);
  }

}