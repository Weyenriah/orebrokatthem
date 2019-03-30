<?php
// Remove Cat
if (isset($_POST['removeRememberCat'])) {
    $removedRemember = $database->deleteRememberCat($_POST['removeRememberCat']);
    $goToPage = 'remem-cats';
}

// Add Cat
if(isset($_POST['add-remember-cat'])) {
    $name = htmlentities(trim($_POST['catname']));
    $born = htmlentities(trim($_POST['born']));
    $came = htmlentities(trim($_POST['came']));
    $adopted = htmlentities(trim($_POST['adopted']));
    $death = htmlentities(trim($_POST['died']));
    $description = htmlentities(trim($_POST['desc']));
    $cause = htmlentities(trim($_POST['cause']));
    $file = isset($_FILES['cat-image']) ? $_FILES['cat-image'] : null;

    $valid = true;

    if(!is_string($name) || strlen($name) === 0) {
        $valid = false;
    }

    if(empty($born) || $born === '-') {
        $born = null;
    }

    if(empty($came) || $came === '-') {
        $came = null;
    }

    if(empty($adopted) || $adopted === '-') {
        $adopted = null;
    }

    if(empty($death)) {
        $valid = false;
    }

    if(!is_string($description) || strlen($description) === 0) {
        $valid = false;
    }

    if(!is_string($cause) || strlen($cause) === 0) {
        $valid = false;
    }

    if($valid) {
        $image = SaveFile($file);

        $addRememCat = $database->addRememberCat($name, $born, $came, $adopted, $death, $description, $cause, $image);
    } else {
        $addRememCat = false;
    }

    $goToPage = 'remem-cats';
}

// Change Cat
if(isset($_POST['change-remember-cat'])) {
    $id = $_POST['id'];
    $name = htmlentities(trim($_POST['catname']));
    $born = htmlentities(trim($_POST['born']));
    $came = htmlentities(trim($_POST['came']));
    $adopted = htmlentities(trim($_POST['adopted']));
    $death = htmlentities(trim($_POST['died']));
    $description = htmlentities(trim($_POST['desc']));
    $cause = htmlentities(trim($_POST['cause']));
    $file = isset($_FILES['cat-image']) ? $_FILES['cat-image'] : null;

    $valid = true;

    if(!is_string($name) || strlen($name) === 0) {
        $valid = false;
    }

    if(empty($born) || $born === '-') {
        $born = null;
    }

    if(empty($came) || $came === '-') {
        $came = null;
    }

    if(empty($adopted) || $adopted === '-') {
        $adopted = null;
    }

    if(empty($death)) {
        $valid = false;
    }

    if(!is_string($description) || strlen($description) === 0) {
        $valid = false;
    }

    if(!is_string($cause) || strlen($cause) === 0) {
        $valid = false;
    }

    if($valid) {
        $image = SaveFile($file);

        $changeRememCat = $database->changeRememberCat($id, $name, $born, $came, $adopted, $death, $description, $cause, $image);
    } else {
        $changeRememCat = false;
    }

    $goToPage = 'remem-cats';
}