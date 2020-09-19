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
    <?php
    $pages = [
        ['name' => 'Войти', 'link' => '#'],
        ['name' => 'Новая запись', 'link' => 'newnote.php'],
        ['name' => 'Отправить сообщение', 'link' => 'email.php'],
        ['name' => 'Фото', 'link' => '#'],
        ['name' => 'Файлы', 'link' => '#'],
        ['name' => 'Администратору', 'link' => '#'],
        ['name' => 'Информация', 'link' => 'inform.php'],
        ['name' => 'Выйти', 'link' => '#']
    ];

    echo '<div style="max-width: 940px">
            <div>';
    foreach ($pages as $key => $page) {
        if ($key+1 != count($pages)){
            echo '<a href=' . $page['link'] . '>
                ' . $page['name'] . '
            </a>&nbsp;|&nbsp';
        }
        else {
            echo '<a href=' . $page['link'] . '>
                ' . $page['name'] . '
            </a>';
        }
    }
    echo '</div>
        <hr>';

    require_once("connection/MySiteDB.php");

    $select_note = mysqli_query($link, "SELECT * FROM notes ORDER BY notes.id DESC");
    while ($note = mysqli_fetch_array($select_note)) {
        echo $note['id'], "<br>";
        ?>
        <a href="comments.php?note=<?php echo $note['id']; ?>">
            <?php echo $note ['title'], "<br>"; ?></a>
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