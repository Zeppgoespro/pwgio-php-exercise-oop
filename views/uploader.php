<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uploader</title>
</head>
<body>

  <p style="font-size:14px;">Return to <a href="/">MAIN</a></p>

  <form action="/upload" method="post" id="upload_form" enctype="multipart/form-data">

    <input type="file" name="upload_file[]" accept="text/csv" multiple />
    <input type="submit" value="Upload" name="upload_btn" form="upload_form" />

  </form>

</body>
</html>