<?php
//Получаем полный путь к папке, где хранятся графические файлы
$image_dir_path = $_SERVER['DOCUMENT_ROOT'] . "/photo";// /Users/aleksandrzditovec/PhpstormProjects/labs
echo "Your path -> " . $image_dir_path;
//Запускаем просмотр папки. Функция opendir() возвращает идентификатор //папки
$image_dir_id = opendir($image_dir_path);
//$array_files - массив, в который будут помещаться все найденные файлы
$array_files = null;
//Служебная переменная, используемая для вычисления индекса следующего
//элемента массива $array_files
$i = 0;
//Запускаем цикл просмотра
while (($path_to_file = readdir($image_dir_id)) !== false)
//Функция readdir() возвращает полный путь к очередному файлу,
// хранящемуся //в папке, идентификатор которой был возвращен функцией
// opendir() и передан //в качестве параметра.
// $path_to_file получает полный путь к файлу для дальнейшей обработки.
// Если в папке нет непросмотренных файлов - возвращается логическое
// значение false
{
    if (($path_to_file != ".") && ($path_to_file != ".."))
        //Точки обозначают вложенные файлы: одна точка - текущая папка, две
        // точки // - папка, в которую вложена текущая папка.
    {
        $array_files[$i] = basename($path_to_file);
        $i++;
//Помещаем имя найденного файла в массив $array_files. Функция basename()
//позволяет получить имя файла из полного пути к нему.
    }
}
closedir($image_dir_id);
//closedir() удаляет из памяти переданный ей идентификатор папки, таким //образом завершая просмотр.
?>

<!-- Форма для отправки файла на сервер -->
<form name="file_upload" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="65536000000"/>
    <input type="file" name="file_upload"/>
    <input type="submit" id="submitAdd" name="submitAdd" value="Добавить"/>
</form>

<?php
//Сценарий отправки файла на сервер
//Проверяем, была ли выполнена отправка файла. Далее реализуем сценарий.
$submit = $_POST['submitAdd'];
if ($submit) {
    if (isset($_POST["MAX_FILE_SIZE"])) {
        $tmp_file_name = $_FILES["file_upload"]["tmp_name"];
        $dest_file_name = $_SERVER['DOCUMENT_ROOT'] . "/photo/" . $_FILES["file_upload"]["name"];
        move_uploaded_file($tmp_file_name, $dest_file_name);
    }
}
?>

<?php
//Получаем количество элементов массива $array_files, т.е. количество //найденных файлов.
$array_files_count = count($array_files);
if ($array_files_count) {
    ?>
    <hr/> <?php
    sort($array_files);
    for ($i = 0; $i < $array_files_count; $i++) {
//Выводим мена хранящихся в массиве файлов на страницу ?>
        <p><a href="/photo/<?php echo $array_files[$i]; ?>" target="_blank">
                <?php echo $array_files[$i]; ?></a></p> <?php
    }
    ?>
    <hr/>
<?php }
?>


<!-- Форма для удаления файла с сервера -->
<form name="file_delete" method="post"
      enctype="application/x-www-form-urlencoded"> Файл <select name="file_delete" size="1">
        <?php for ($i = 0; $i < $array_files_count; $i++) { ?>
            <option><?php echo $array_files[$i]; ?></option>
        <?php } ?></select>
    <input type="submit" name="submit" value="Удалить"/>
</form>

<?php
//Сценарий удаления файла
//Сначала проверяем, было ли запущено удаление файла if (isset($_POST["file_delete"]))
{
    //Формируем полное имя файла
    $file_name = $_SERVER['DOCUMENT_ROOT'] . "/photo/" . $_POST["file_delete"];
//Функция unlink() удаляет файл

    unlink($file_name);
}
?>


<br>
<br>
<br>
<a style="color: blue" href="blog.php">На главную страницу сайта</a>
<br>
<br>
<br>