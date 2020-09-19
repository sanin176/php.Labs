<?php
$note_id = $_GET['note'];
require_once ("connection/MySiteDB.php");
$select_db = mysqli_select_db ($link, $db);
$query = "SELECT * FROM notes WHERE id = $note_id";
$result = mysqli_query ($link, $query);
$delete_note = mysqli_fetch_array ($result);
?>
<html>
<body>
<p>Страница редактирования заметки </p>
<form id="editnote" name="editnote" method="post" >
    <label for="title">Заголовок заметки</label>
    <input type="text" name="title" id="title"
           value = "<?php echo $delete_note['title'];?>" />
    <label for="article">Текст заметки </label>
    <input type="text" name=" article" id=" article"
           value = "<?php echo $delete_note['article'];?>" />
    <input type="hidden" name = "note" id = "note"
           value="<?php echo $delete_note['id']?>" />
    <input type="hidden" name = "MM_update" value="editnote" />
    <input type="submit" name="submit" id="submit" value="Удалить" />
</form>

<?php
$submit = $_POST['submit'];
if ($submit)
{
    $query_comments= mysqli_query($link,"SELECT * FROM comments  WHERE  art_id='".$note_id."'");
    $query_notes= mysqli_query($link,"SELECT * FROM notes  WHERE  id='".$note_id."'");

    if(mysqli_num_rows($query_comments) > 0){
        $row=mysqli_fetch_array($query_comments, MYSQLI_ASSOC); // fetch the data
        $query= mysqli_query($link,"DELETE FROM comments WHERE art_id=$note_id");
        $response="deleted";
    }

    if(mysqli_num_rows($query_notes) > 0){
        $row=mysqli_fetch_array($query_notes, MYSQLI_ASSOC); // fetch the data
        $query= mysqli_query($link,"DELETE FROM notes WHERE id=$note_id");
        $response="deleted";
    } else {
        $response= "no_data";
    }

}
?>
</body>
</html>
