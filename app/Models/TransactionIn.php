<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use DateTime;

class TransactionIn extends Model
{

  public function __construct(protected array $transaction_row)
  {
    parent::__construct();
    $this->transaction_row = $transaction_row;
  }

  protected function format_date(string $date): string
  {
      $date_time = new DateTime($date);
      return $date_time->format('Y-m-d');
  }

  protected function format_check_number(string $check): ?int
  {
    return $check !== '' ? (int) $check : null;
  }

  protected function format_amount(string $amount): float
  {
    $amount = (float) preg_replace('/[^0-9-.]/', '', $amount);
    return $amount;
  }

  public function insert():void
  {
    $query = 'INSERT INTO transactions (transaction_date, check_number, `description`, amount) VALUES (?, ?, ?, ?)';
    $params = [
      $this->format_date($this->transaction_row[0]),
      $this->format_check_number($this->transaction_row[1]),
      $this->transaction_row[2],
      $this->format_amount($this->transaction_row[3])
    ];

    $stmt = $this->db->prepare($query);
    $stmt->execute($params);
  }

}