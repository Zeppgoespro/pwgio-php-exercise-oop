<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
    </head>
    <body>
        <p>Home Page</p>
        <?php

            if (isset($_SESSION['msg'])):
                echo '<p>' . $_SESSION['msg'] . '</p>';
                unset($_SESSION['msg']);
            endif;

        ?>
        <p style="font-size:14px;"><a href="/upload">UPLOAD</a> the csv-file</p>
        <p>Go to the <a href="/transactions">Transaction Table</a></p>
    </body>
</html>