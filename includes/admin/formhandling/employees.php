<?php
// Remove employee
if (isset($_POST['removeEmployee'])) {
    $removed = $database->deleteEmployee($_POST['removeEmployee']);
    $goToPage = 'employees';
}

// Add employee
if(isset($_POST['add-employee'])) {
    $name = htmlentities(trim($_POST['human-name']));
    $title = htmlentities(trim($_POST['title']));
    $email = htmlentities(trim($_POST['email']));
    $password = $_POST['password'];
    $show = isset($_POST['add-show-employee']);
    $canLogin = isset($_POST['login']);
    $file = isset($_FILES['human-image']) ? $_FILES['human-image'] : null;

    // Sets valid to true
    $valid = true;

    // Check name
    if(!is_string($name) || strlen($name) === 0) {
        $valid = false;
    }

    // Check title
    if(!is_string($name) || strlen($title) === 0) {
        $title = '-';
    }

    // Check email-input
    if(!is_string($email) || strlen($email) === 0 || count(explode('@', $email)) != 2) {
        $valid = false;
    }

    // Checks password
    if($canLogin) {
        if(!is_string($password) || strlen($password) === 0) {
            $password = null;
        } else {
            $password = password_hash($password . PASSWORD_SALT, PASSWORD_DEFAULT);
        }
    } else {
        $password = null;
    }

    // Adds if everything checks out
    if($valid) {
        $image = SaveFile($file);
        $addEmployee = $database->addEmployee($name, $title, $email, $password, !$show, $image);

        $goToPage = 'employees';
    } else {
        echo('Fel');
    }
}

// Change Employee
if(isset($_POST['change-employee'])) {
    $id = $_POST['id'];
    $name = htmlentities(trim($_POST['human-name']));
    $title = htmlentities(trim($_POST['human-title']));
    $email = htmlentities(trim($_POST['email']));
    $password = $_POST['password'];
    $show = isset($_POST['show']);
    $canLogin = isset($_POST['log-in']);
    $file = isset($_FILES['human-image']) ? $_FILES['human-image'] : null;

    // Sets valid to true
    $valid = true;

    // Check name
    if(!is_string($name) || strlen($name) === 0) {
        $valid = false;
    }

    // Check title
    if(!is_string($name) || strlen($title) === 0 || $title === NULL) {
        $title = '-';
    }

    // Check email-input
    if(!is_string($email) || strlen($email) === 0 || count(explode('@', $email)) != 2) {
        $valid = false;
    }

    // Checks password
    if($canLogin) {
        if(!is_string($password) || strlen($password) === 0) {
            $password = null;
        } else {
            $password = password_hash($password . PASSWORD_SALT, PASSWORD_DEFAULT);
        }
    } else {
        $password = null;
    }

    if($valid) {
        $image = SaveFile($file);

        $changeEmployee = $database->changeEmployee($id, $name, $title, $email, $canLogin, $password, $show ? 0 : 1, $image);

        $goToPage = 'employees';
    } else {
        $changeEmployee = false;
    }

}