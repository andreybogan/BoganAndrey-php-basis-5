<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_upload.php";
include GLOBAL_DIR . "fns/fns_db.php";
include GLOBAL_DIR . "fns/fns_gallery.php";

// Получаем из базы информацию об изображении с указанным id.
$result = getImageDB($_GET['id']);

// Если результат получен, то увеличиваем количество просмотров на 1.
updateCount($_GET['id']);

// Подключаем html страницу с фотографией.
include TEMPLATE_DIR . "image.php";