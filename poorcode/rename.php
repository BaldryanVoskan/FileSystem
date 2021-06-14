<?php

$mydir = '../folders/';

if (isset($_GET['name'])) {
    $mydir = $mydir . $_GET['name'];
}
$old_name = $_POST['old_name'];
$new_name = $_POST['new_name'];
$dir = scandir($mydir);
$extension = pathinfo($old_name, PATHINFO_EXTENSION);
if ($extension) {
    $condition = $new_name . '.' . $extension;
    if ($old_name === $condition) {
        rename($mydir . '/' . $old_name, $mydir . '/' . $old_name);
    } elseif (in_array($condition, $dir)) {
        rename($mydir . '/' . $old_name, $mydir . '/' . $new_name . '1.' . $extension);
    } else {
        rename($mydir . '/' . $_POST['old_name'], $mydir . '/' . $new_name . '.' . $extension);
    }
} else {
    rename($mydir . '/' . $_POST['old_name'], $mydir . '/' . $new_name);
}

if (empty($_POST['new_name'])) {
    header("Location: ../index.php");
} else {
    header("Location:../index.php?page=" . $_GET['name']);
}