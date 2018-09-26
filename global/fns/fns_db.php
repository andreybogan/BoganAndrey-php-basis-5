<?php
/**
 * Функция утанавливает новое соединение с сервером MySQL,
 * в противном случае выводи сообщение об ошибке.
 * @param string $localhost - Имя хоста или IP адрес.
 * @param string $user - Имя MySQL пользователя.
 * @param string $password - Пароль.
 * @param string $db - База данных по умолчанию.
 * @return mysqli Возвращает объект, представляющий подключение к серверу MySQL (Идентификатор соединения).
 */
function my_connect($localhost, $user, $password, $db) {
  $connect = @mysqli_connect($localhost, $user, $password, $db);
  // Если не удалось установить соединение выводим сообщение об ошибке.
  if (mysqli_connect_errno()) {
    echo "Ошибка: Не удалось установить соединение с базой данных. Повторите попытку позже.";
    exit;
  }
  return $connect;
}

/**
 * Функция выполняет запрос к базе данных, в случае возникновения ошибки запроса выводится сообщение об ошибке.
 * @param $query - Текст запроса.
 * @return bool|mysqli_result  В случае успешного выполнения запросов SELECT, SHOW, DESCRIBE или EXPLAIN mysqli_query()
 * вернет объект mysqli_result. Для остальных успешных запросов mysqli_query() вернет TRUE.
 */
function my_query($query) {
  // Если нет идентификатора соединения, то создаем соединение новое подключение.
  if (!isset($GLOBALS['_db_connect'])) {
    $GLOBALS['_db_connect'] = my_connect(HOST_MySQL, LOGIN_MySQL, PASS_MySQL, NAME_DB);
  }

  // Если возникла ошибка запроса в базу данных, то выводим сообщение об ошибке.
  if (!$result = @mysqli_query($GLOBALS['_db_connect'], $query)) {
    echo "Ошибка: Ошибка запроса в базу данных. Повторите попытку позже.";
    exit;
  }
  return $result;
}

/**
 * Функция экранирует специальные символы в строке для использования в SQL выражении,
 * используя текущий набор символов соединения
 * @param $value - Строка, которую требуется экранировать.
 * @return string Возвращает экранированную строку.
 */
function my_string($value) {
  // Если нет идентификатора соединения, то создаем соединение новое подключение.
  if (!isset($GLOBALS['_db_connect'])) {
    $GLOBALS['_db_connect'] = my_connect(HOST_MySQL, LOGIN_MySQL, PASS_MySQL, NAME_DB);
  }

  // Экранируем специальные символы.
  $result = mysqli_real_escape_string($GLOBALS['_db_connect'], $value);
  return $result;
}

/**
 * Функция возвращает автоматически генерируемый ID, используя последний запрос
 * @return int|string Значение поля AUTO_INCREMENT, которое было затронуто предыдущим запросом.
 * Возвращает ноль, если предыдущий запрос не затронул таблицы, содержащие поле AUTO_INCREMENT.
 */
function my_insert_id() {
  // Получаем поледний ID.
  if (!$result = @mysqli_insert_id($GLOBALS['_db_connect'])) {
    echo "Ошибка: Ошибка получения последнего id. Повторите попытку позже.";
    exit;
  }
  return $result;
}