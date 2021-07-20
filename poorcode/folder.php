<?php
        if( isset($_POST['button'])){
            $link = '../folders/';
            if (!empty($_POST['folder_name'])) {
                $link = '../folders/' . $_POST['folder_name'];
            }
               mkdir($link. '/' . $_POST['folderName'], 0777);
            if (empty($_POST['folder_name'])) {
                header("Location: ../index.php");
            } else {
                header("Location: ../index.php?page=". $_POST['folder_name']);
            }
        }