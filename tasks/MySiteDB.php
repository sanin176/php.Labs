<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$localhost = 'localhost';
$db = 'mySiteDB';
$user = 'root';
$password = 'ZXC123zxc';
$link = mysqli_connect($localhost, $user, $password, $db);
//trigger_error(mysql_error(), E_USER_ERROR);
//trigger_error выводит на страницу сообщение об ошибке. Первый параметр
//- сообщение об ошибке
//в строковом виде, в данном случае возвращается функция mysql_error(),
//второй - числовой код //ошибки(почти всегда используется значение
//константы E_USER_ERROR, равное 256)
//Следующие строки необходимы для того, чтобы MySQL воспринимал
//кириллицу.
//Параметры функции mysqli_query(): идентификатор соединения с сервером
//и запрос SQL
mysqli_query($link, "SET NAMES cp1251;");// or die(mysql_error());
mysqli_query($link, "SET CHARACTER SET cp1251;");// or die(mysql_error());

echo "here09876";
$query = "SELECT * FROM notes WHERE ";
$query1 = mysqli_query($link, $query);
echo $query1;
//$newArray = mysqli_fetch_array($query1);
while ($note = mysqli_fetch_array($query1)){
    echo $note ['id'], "<br>";
    echo $note ['created'], "<br>";
    echo $note ['title'], "<br>";
    echo $note ['article'], "<br>";
}
//echo $newArray;
//foreach ($newArray as $note){
//    echo $note ['id'], "<br>";
//    echo $note ['created'], "<br>";
//    echo $note ['title'], "<br>";
//    echo $note ['article'], "<br>";
//}

?>