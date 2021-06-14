<?php
$path = '../folders/';
$name = $_POST['file_name'];
if (is_dir($path . $name)) {
    rmdir($path . $name);
} else {
    unlink($path . $name);
}
if (!isset($_GET['dir'])) {
    header("Location: ../index.php");
} else {
    header("Location: ../index.php?page=" . $_GET['dir']);
}







