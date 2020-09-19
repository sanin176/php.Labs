<?php
//Соединение с сервером
$link = mysqli_connect('localhost', 'root', 'ZXC123zxc');
//Выбор БД
$db = "MySiteDB";
$select = mysqli_select_db($link, $db);
if ($select) {
    echo "База успешно выбрана", "<br>";
} else {
    echo "База не выбрана";
}
//Создание таблицы
//Формирование запроса
$query = "CREATE TABLE notes
 (id INT NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (id),
 created DATE,
 title VARCHAR (20),
 article VARCHAR (255))";
//Реализация запроса
$create_tbl = mysqli_query($link, $query);
if ($create_tbl) {
    echo "Таблица успешно создана", "<br>";
} else {
    echo "Таблица не создана";
}
?>