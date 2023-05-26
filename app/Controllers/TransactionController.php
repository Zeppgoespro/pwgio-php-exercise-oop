<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\TransactionOut;
use App\View;
use DateTime;

class TransactionController
{

  public function render(): View
  {
    $transactions = (new TransactionOut)->pull_from_table();
    return View::make('transactions', ['transactions' => $transactions]);
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

  public static function populate_income(array $transactions): void
  {
    $pos_number = 0;

    foreach ($transactions as $transaction):

      if ($transaction['amount'] > 0):
        $pos_number +=$transaction['amount'];
      endif;

    endforeach;

    echo self::format_amount($pos_number);
  }

  public static function populate_expense(array $transactions): void
  {
    $neg_number = 0;

    foreach ($transactions as $transaction):

      if ($transaction['amount'] < 0):
        $neg_number +=$transaction['amount'];
      endif;

    endforeach;

    echo self::format_amount($neg_number);
  }

  public static function populate_total(array $transactions): void
  {
    $total_number = 0;

    foreach ($transactions as $transaction):

      $total_number +=$transaction['amount'];

    endforeach;

    echo self::format_amount($total_number);
  }

}