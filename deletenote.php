<?php
require_once("connection/MySiteDB.php");

$note_id = $_GET['note'];

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
echo $response;