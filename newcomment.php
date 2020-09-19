<html>
<head>
    <title>Страница для добавления заметки</title>
</head>
<body>
<p>Добавить новый комментарий: </p>
<form id="newnote" name="newnote" method="post" action="">
    <input type="text" name="author" id="author" size="20" maxlength="20"/>
    <textarea name="comment" cols="55" rows="10" id="comment"> </textarea>
    <input type="hidden" name="created" id="created"
           value="<?php echo date("Y-m-d"); ?>"/>

    <input type="submit" name="submit" id="submit" value="Отправить"/>
</form>
<a href="blog.php">Возврат на главную страницу сайта</a>
</body>
</html>
<?php
$note_id = $_GET['note'];
//Подключение к серверу
require_once("connection/MySiteDB.php");
//Выбор БД
$select_db = mysqli_select_db($link, $db);
//Получение данных из формы
$author= $_POST['author'];
$comment = $_POST['comment'];
$created = $_POST['created'];
if (($author) && ($created) && ($comment)) {
//Формирование запроса
    $query = "INSERT INTO comments (created, author, comment, art_id) VALUES ('$created', '$author', '$comment', '$note_id')";
//Реализация запроса
    $result = mysqli_query($link, $query);
}
?>