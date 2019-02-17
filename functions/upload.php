<?php

function SaveFile($file, $prefix = "") {
    $imageFileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
    $path = realpath(dirname(getcwd())) . DIRECTORY_SEPARATOR  . UPLOADS_FOLDER . "images". DIRECTORY_SEPARATOR  . date('Y') . DIRECTORY_SEPARATOR . date('m');
    if ( ! is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $id = date('Y/m/') . uniqid($prefix, true);
    $target_file = realpath(dirname(getcwd())) . DIRECTORY_SEPARATOR  . UPLOADS_FOLDER . "images". DIRECTORY_SEPARATOR  . $id . '.' . $imageFileType;
    // Checks TMP_NAME
    if(empty($file["tmp_name"])) {
        return null;
    }
    // Checks image size
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return null;
    }
    // Check file type
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        return null;
    }
    /* Checks size
    if ($file["size"] > 2000000) {
        return null;
    } */
    // Move uploaded file
    $success = move_uploaded_file($file["tmp_name"], $target_file);
    // If success!
    if ($success) {
        return $id . '.' . $imageFileType;
    } else {
        return null;
    }
}
// Deleting file
function DeleteFile($file) {
    return unlink(realpath(dirname(getcwd())) . DIRECTORY_SEPARATOR  . UPLOADS_FOLDER . "images". DIRECTORY_SEPARATOR  . $file);
}