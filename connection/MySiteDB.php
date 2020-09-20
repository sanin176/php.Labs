<?php

$localhost = 'localhost';
$db = 'mySiteDB';
$user = 'root';
$password = 'root';
$link = mysqli_connect($localhost, $user, $password, $db);

mysqli_query($link, "SET NAMES cp1251;");// or die(mysql_error());
mysqli_query($link, "SET CHARACTER SET cp1251;");// or die(mysql_error());

