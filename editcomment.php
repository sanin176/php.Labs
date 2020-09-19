<?php
$comment_id = $_GET['comment'];
require_once("connection/MySiteDB.php");
$select_db = mysqli_select_db($link, $db);
$query = "SELECT * FROM comments WHERE id = $comment_id";
$result = mysqli_query($link, $query);
$edit_comment = mysqli_fetch_array($result);
?>
    <html>
    <body>
    <p>Страница редактирования заметки </p>
    <form id="editnote" name="editnote" method="post">
        <label for="title">Заголовок заметки</label>
        <label for=" article">Текст заметки </label>
        <textarea name="comment" id="comment">
        <?php echo $edit_comment['comment']; ?></textarea>
        <input type="hidden" name="note" id="note"
               value="<?php echo $edit_comment['id'] ?>"/>
        <input type="submit" name="submit" id="submit" value="Изменить"/>
    </form>
    <a href="blog.php">Вернуться на главную страницу сайта</a>
    </body>
    </html>

<?php
$comment = isset($_POST['comment']) ? $_POST['comment'] : $edit_comment['comment'];

$update_query = "UPDATE comments SET comment = '$comment' WHERE id = $comment_id";
$update_result = mysqli_query($link, $update_query);

?>