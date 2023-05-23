<?php

declare(strict_types = 1);

namespace App\Models;

use App\Model;

class Transaction extends Model
{

  public function __construct(protected array $transaction_row)
  {
    $this->transaction_row = $transaction_row;
  }

  protected function format_date(string $date)
  {
    #
  }

  public function insert():void
  {
    $query = 'INSERT INTO transactions (transaction_date, check_number, `description`, amount) VALUES (?, ?, ?, ?)';
    $params = [
      $this->format_date($this->transaction_row[0]),
      $this->format_check_number($this->transaction_row[1]),
      $this->transaction_row[2],
      $this->format_amount($this->data[3])
    ];

    $this->db->prepare($query)->execute($params);
  }

}