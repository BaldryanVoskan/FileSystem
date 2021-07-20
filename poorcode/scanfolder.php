<?php


$folder_path = './folders';
if (isset($_GET['page'])) {
    $folder_path = './folders/' . $_GET['page'];
}

if (!file_exists($folder_path)) {
    mkdir($folder_path, 0777, true);
}

if (is_array(scandir($folder_path)) && count(scandir($folder_path)) > 2) {
    foreach (scandir($folder_path) as $folder) {
        if ($folder != '.' && $folder != '..') {
            if (is_dir($folder_path . '/' . $folder)) {
                $arr[] = [
                    'name' => $folder,
                    'size' => filesize($folder_path . '/' . $folder),
                    'date' => filectime($folder_path . '/' . $folder), //date ("Y-m-d H:i:s", filectime('./folders/' .$folder)),
                    'type' => 'folder'
                ];
            } else {
                $path_parts = pathinfo($folder_path . '/' . $folder, PATHINFO_EXTENSION);
                $arr[] = [
                    'name' => $folder,
                    'size' => filesize($folder_path . '/' . $folder),
                    'date' => filectime($folder_path . '/' . $folder), //date ("Y-m-d H:i:s", filectime('./folders/' .$folder)),
                    'type' => $path_parts
                ];
            }
        }
    }
}
