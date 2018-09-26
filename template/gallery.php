<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Фотоальбом</title>
</head>
<body>
  <h1>Фотоальбом</h1>

  <?php
  // Если в базе есть фотографии, то выводим их на страницу.
  if (!empty($arrSmallImages)) {
    for ($i = 0; $i < count($arrSmallImages); $i++) {
      ?> <a href="../../image.php?id=<?= $arrSmallImages[$i]['id_img'] ?>"><img
            src="images/small/<?= $arrSmallImages[$i]['name'] ?>"
            alt="Фото в альбоме"></a> <?
    }
  }

  // Если при загрузке файла возникли ошибки, выводим их.
  if (!empty($error)) {
    echo "<p style='color:red;'>{$error}</p>";
  }
  ?>

  <!-- Форма добавления нового фото -->
  <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="POST" enctype="multipart/form-data" style="margin: 24px 0;">
    <input type="file" name="file">
    <input type="submit" name="uploadPhoto" value="Добавить фото">
  </form>
</body>
</html>