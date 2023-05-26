<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class TransactionOut extends Model
{

  public function pull_from_table(): array
  {
    $query = 'SELECT * FROM `transactions`';
    $stmt = $this->db->query($query);

    $table = $stmt->fetchAll();
    return $table ? $table : [];
  }

}