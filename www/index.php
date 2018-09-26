<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_upload.php";
include GLOBAL_DIR . "fns/fns_db.php";
include GLOBAL_DIR . "fns/fns_gallery.php";

// Каталог для хранения превьюшек фотографий.
$dirImgSmall = "images/small/";
// Каталог для хранения оригиналов фотографий.
$dirImgBig = "images/big/";
// Загружаемый файл.
$file = 'file';

// Если была нажата кнопка Добавить фото, то обрабатываем его.
if (@$_REQUEST['uploadPhoto']) {
  // Загружаем фото.
  $result = uploadFiles($dirImgBig, $dirImgSmall, $file);

  // Если при загрузке файла возникла ошибка, то выводим ее, иначе добавляем информацию в базу.
  if ($result['error']) {
    // Выводим сообщение об ошибке.
    echo "При загрузке файла возникла проблема: {$result['error']}";
  } else {
    // Формируем url адрес картинки.
    $urlImages = "http://" . $_SERVER['HTTP_HOST'] . "/" . $dirImgBig . $result['file_name'];
    // Заносим информацию о загруженном изображении в базу.
    setImageDB($result['file_name'], $_FILES[$file]['size'], $urlImages);
    // Редирект на саму себя.
    header("Location:  http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);
    exit;
  }
}

// Получаем массив картинок из базы данных.
$arrSmallImages = getAllImagesDB();

// Подключаем html страницу галлереи.
include TEMPLATE_DIR . "gallery.php";