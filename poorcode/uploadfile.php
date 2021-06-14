<?php
if (isset($_POST['button'])) {
    $dir='../folders/';

    if (isset($_GET['upload'])) {
        $dir= $dir. $_GET['upload'];
    }
    $info = pathinfo($_FILES['file']['name']);
    $i = 0;
    do {
        $file_name = $info['filename'] . ($i ? "_($i)" : "") . "." . $info['extension'];
        $i++;
        $path = $dir .'/'. $file_name;
    } while (file_exists($path));

    if (!move_uploaded_file($_FILES['file']['tmp_name'], './' . $path)) {
        echo "file upload error";
    }
    if(isset($_GET['upload'])){
        header('location: ../index.php/?page='. $_GET['upload']);
    }else {
        header('location: ../index.php');
    }
}



