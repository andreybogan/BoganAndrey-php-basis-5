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
  <a href="index.php">Вернуться в альбом</a>
  <h1>Фотография <?= $result['name'] ?></h1>
  <div>
    <img src="<?= $result['path'] ?>" alt="">
  </div>
  <p>Количество просмотров: <?= ++$result['count'] ?></p>

</body>
</html>