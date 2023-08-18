<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const clearButton = document.getElementById('clearButton');
                const tableBody = document.getElementById('tableBody');
                const totals = document.querySelectorAll('.total');

                clearButton.addEventListener('click', function() {

                    fetch('/transactions/clear', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success == 'deleted') {
                            alert('Table cleared successfully!');
                            tableBody.innerHTML = '';
                            totals.forEach(total => {
                                total.innerHTML = '$0.00';
                            });
                        } else if (data.success == 'empty') {
                            alert('There is nothing to delete!');
                        } else {
                            alert('An error occurred while clearing the table!');
                        }
                    })
                    .catch(error => {
                        console.error('Error is', error);
                    });
                });
            });
        </script>
    </head>
    <body>
        <p style="font-size:14px;">Return to <a href="/">MAIN</a></p>

        <button type="button" id="clearButton" style="margin-bottom: 15px; font-weight: bold;">Clear the table</button>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?=
                    \App\Controllers\TransactionController::populate_rows($transactions);
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td class="total">
                        <?=
                            \App\Controllers\TransactionController::populate_totals($transactions, 'inc');
                        ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td class="total">
                        <?=
                            \App\Controllers\TransactionController::populate_totals($transactions, 'exp');
                        ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td class="total">
                        <?=
                            \App\Controllers\TransactionController::populate_totals($transactions, 'tot');
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>