<?php
$path = '../folders/';
$name = $_POST['file_name'];
$dirPath = $path.$name;
if (is_dir($dirPath)) {
deleteDir($dirPath);

} else {
    unlink($dirPath);
}


if (!isset($_GET['dir'])) {
    header("Location: ../index.php");
} else {
    header("Location: ../index.php?page=" . $_GET['dir']);
}



  function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}







