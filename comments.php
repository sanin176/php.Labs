<?php
require_once("connection/MySiteDB.php");

$note_id = $_GET['note'];

$query_note = "SELECT * FROM notes WHERE id = $note_id";
$select_note = mysqli_query($link, $query_note);

$note = mysqli_fetch_array($select_note);

echo 'Title ', $note['title'], '<br>';
echo 'Article ', $note['article'], '<br><br>';
echo 'ID ', $note['id'], '<br><br>';
echo '<a href="editnote.php?note=' . $note_id . '">Изменить заметку</a><br><br>';
echo '<a href="deletenote.php?note=' . $note_id . '">Удалить заметку</a><br><br>';
echo 'COMMENTS: <br>';

$query_comments = "SELECT * FROM comments WHERE art_id = $note_id";
$select_comments = mysqli_query($link, $query_comments);
$count = mysqli_num_rows($select_comments);
if ($count > 0) {
    while ($comment = mysqli_fetch_array($select_comments)) {
        echo $comment['comment'], "<br>";
    }
}else echo "Эту запись еще никто не комментировал.";
?>