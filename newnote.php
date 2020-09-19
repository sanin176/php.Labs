<html>
<head>
    <title>Страница для добавления заметки</title>
</head>
<body>
<p>Добавить новую заметку: </p>
<form id="newnote" name="newnote" method="post" action="">
    <input type="text" name="title" id="title" size="20" maxlength="20"/>
    <textarea name=" article" cols="55" rows="10" id=" article"> </textarea>
    <input type="hidden" name="created" id="created"
           value="<?php echo date("Y-m-d"); ?>"/>

    <input type="submit" name="submit" id="submit" value="Отправить"/>
</form>
<a href="blog.php">Возврат на главную страницу сайта</a>
</body>
</html>
<?php
//Подключение к серверу
require_once("connection/MySiteDB.php");
//Выбор БД
$select_db = mysqli_select_db($link, $db);
//Получение данных из формы
$title = $_POST['title'];
$created = $_POST['created'];
$article = $_POST[‘article’];
if (($title) && ($created) && ($article)) {
//Формирование запроса
    $query = "INSERT INTO notes (title, created, article) VALUES ('$title', '$created', '$article')";
//Реализация запроса
    $result = mysqli_query($link, $query);
}
?>