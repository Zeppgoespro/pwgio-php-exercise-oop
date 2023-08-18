<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\TransactionOut;
use App\View;
use DateTime;
use App\App;

class TransactionController
{
  public function render(): View
  {
    $transactions = (new TransactionOut)->pull_from_table();
    return View::make('transactions', ['transactions' => $transactions]);
  }

  public function clear_transactions(): void
  {
    $stmt = App::db()->prepare('SELECT * FROM `transactions`');
    $stmt->execute();

    if ($stmt->rowCount() === 0):
      header('Content-Type: application/json');
      echo json_encode(['success' => 'empty']);
      exit;
    else:
      $stmt = App::db()->prepare('DELETE FROM `transactions`');
      $stmt->execute();
      header('Content-Type: application/json');
      echo json_encode(['success' => 'deleted']);
      exit;
    endif;
  }

  protected static function format_date(string $date): string
  {
    $date_time = new DateTime($date);
    return $date_time->format('M d, Y');
  }

  protected static function format_amount($amount): string
  {
    $amount = floatval($amount);
    return ($amount >= 0) ? '$' . number_format($amount, 2, '.', ',') : '-$' . number_format(abs($amount), 2, '.', ',');
  }

  public static function populate_rows(array $transactions): void
  {
    foreach ($transactions as $transaction):
      echo '<tr>';
      echo '<td>' . self::format_date($transaction['transaction_date']) . '</td>';
      echo '<td>' . $transaction['check_number'] . '</td>';
      echo '<td>' . $transaction['description'] . '</td>';

      if ($transaction['amount'] < 0):
        echo '<td style="color:red">' . self::format_amount($transaction['amount']) . '</td>';
      elseif ($transaction['amount'] === 0):
        echo '<td style="color:black">' . self::format_amount($transaction['amount']) . '</td>';
      else:
        echo '<td style="color:green">' . self::format_amount($transaction['amount']) . '</td>';
      endif;

      echo '</tr>';
    endforeach;
  }

  public static function populate_totals(array $transactions, string $inc_exp_tot): void
  {
    $pos_number = 0;
    $neg_number = 0;
    $total_number = 0;

    foreach ($transactions as $transaction):

      if ($transaction['amount'] > 0):
        $pos_number +=$transaction['amount'];
        $total_number +=$transaction['amount'];
      elseif ($transaction['amount'] < 0):
        $neg_number +=$transaction['amount'];
        $total_number +=$transaction['amount'];
      endif;

    endforeach;

    if ($inc_exp_tot === 'inc'):
      echo self::format_amount($pos_number);
    elseif ($inc_exp_tot === 'exp'):
      echo self::format_amount($neg_number);
    else:
      echo self::format_amount($total_number);
    endif;
  }

}