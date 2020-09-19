<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
    <meta charset="UTF-8">
    <title>ПдИ</title>
    <form method="post">
        <div>
            <input type="text" name="title" id="title" placeholder="Тема сообщения" minlength="5">
            <input type="text" name="message" id="message" placeholder="Текст сообщения" minlength="5">
        </div>
        <br>
        <div>
            <input type="submit" id="submit" name="submit" value="Отправить">
        </div>
        <br>
        <a style="color: blue" href="blog.php">На главную страницу сайта</a>
    </form>
</head>
<body>

</body>
</html>
<?php
$submit = $_POST['submit'];
if ($submit) {
    $title = $_POST['title'];
    $message = $_POST['message'];

    $msg = wordwrap($message, 70);

    mail("someone@example.com", $title, $msg);
}
?>