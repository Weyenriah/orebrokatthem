<?php

function SaveFile($file, $prefix = "") {
    $imageFileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
    $id = uniqid($prefix, true);
    $target_file = realpath(dirname(getcwd())) . DIRECTORY_SEPARATOR  . UPLOADS_FOLDER . "images". DIRECTORY_SEPARATOR  . $id . '.' . $imageFileType;

    if(empty($file["tmp_name"])) {
        return null;
    }

    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return null;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        return null;
    }

    if ($file["size"] > 500000) {
        return null;
    }

    $success = move_uploaded_file($file["tmp_name"], $target_file);

    if ($success) {
        return $id . '.' . $imageFileType;
    } else {
        return null;
    }
}