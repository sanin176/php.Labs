<?php
$comment_id = $_GET['comment'];
require_once ("connection/MySiteDB.php");
$select_db = mysqli_select_db ($link, $db);
$query = "SELECT * FROM comments WHERE id = $comment_id";
$result = mysqli_query ($link, $query);
$delete_comment = mysqli_fetch_array ($result);
?>
<html>
<body>
<p>Страница удаления комментария </p>
<form id="editnote" name="editnote" method="post" >
    <label for="title">Комментарий</label>
    <input type="hidden" name = "comment" id = "comment"
           value="<?php echo $delete_comment['id']?>" />
    <input type="hidden" name = "MM_update" value="editcomment" />
    <input type="submit" name="submit" id="submit" value="Удалить" />
</form>

<?php
$submit = $_POST['submit'];
if ($submit)
{
    $query_comments= mysqli_query($link,"SELECT * FROM comments  WHERE  id='".$comment_id."'");

    if(mysqli_num_rows($query_comments) > 0){
        $row=mysqli_fetch_array($query_comments, MYSQLI_ASSOC); // fetch the data
        $query= mysqli_query($link,"DELETE FROM comments WHERE id=$comment_id");
        $response="deleted";
    }
}
?>
</body>
</html>
