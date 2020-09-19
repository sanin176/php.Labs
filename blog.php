<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        em div {
            margin: 10px 0;
        }

        a {
            color: black;
            text-decoration: none;
        }
    </style>
    <meta charset="UTF-8">
    <title>ПдИ</title>
    <div style="width: 690px">
        <div style="display: flex;">
            <a href="#">
                Войти
            </a>
            &nbsp;|&nbsp;
            <a href="#">
                Новая запись
            </a>
            &nbsp;|&nbsp;
            <a href="email.php">
                Отправить сообщение
            </a>
            &nbsp;|&nbsp;
            <a href="#">
                Фото
            </a>
            &nbsp;|&nbsp;
            <a href="#">
                Файлы
            </a>
            &nbsp;|&nbsp;
            <a href="#">
                Администратору
            </a>
            &nbsp;|&nbsp;
            <a href="#">
                Информация
            </a>
            &nbsp;|&nbsp;
            <a href="#">
                Выйти
            </a>
        </div>
        <hr>
        <?php
        require_once("connection/MySiteDB.php");

        $select_note = mysqli_query($link, "SELECT * FROM notes");
        while ($note = mysqli_fetch_array($select_note)){
            echo $note['id'], "<br>";
            ?>
            <a href="comments.php?note=<?php echo $note['id']; ?>">
                <?php echo $note ['title'], "<br>";?></a>
            <?php
            echo $note ['created'], "<br>";
            echo $note ['content'], "<br>";
        }
        ?>

    </div>
</head>
<body>

</body>
</html>