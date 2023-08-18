<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
        <style>
            p {
              font-size:20px;
            }
        </style>
    </head>
    <body>
        <h2 style="color: indigo;">Great Transaction Table</h2>
        <p>
            Берите таблицу из рут фолдера (<b>transaction_sample</b>), меняйте там цифры/даты/всё такое (если хотите).<br/>
            Загружайте файл через аплоадер, он переписывается в БД (<b>MySQL</b>), сам файл попадает в папку <b>storage</b>.<br/>
            Можете загрузить сразу несколько <b>csv-файлов</b> за раз.<br/>
            Потом переходите в общую таблицу по ссылке внизу страницы.<br/>
        </p>
        <p>
            <b>Внимание!</b> К слову, кнопка <b>"Clear the table"</b> на табличной странице работает динамически через <b>AJAX</b>.<br/>
            Удаляет записи из БД и чистит табличную страницу.
        </p>
        <?php

            if (isset($_SESSION['msg'])):
                echo '<p style="color: orange;"><b>' . $_SESSION['msg'] . '</b></p>';
                unset($_SESSION['msg']);
            endif;

        ?>
        <p><b><a href="/upload">UPLOAD</a> the csv-file</b> (you can take sample from the root)</p>
        <p>Go to the <a href="/transactions">Transaction Table >></a></p>
    </body>
</html>