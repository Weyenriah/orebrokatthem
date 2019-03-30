<?php
// Remove Cat
if (isset($_POST['removeCat'])) {
    $removedCat = $database->deleteCat($_POST['removeCat']);
    $goToPage = 'cats';
}

// Add cat
if(isset($_POST['add-cat'])) {
    $catName = htmlentities(trim($_POST['catname']));
    $gender = $_POST['gender'];
    $age = htmlentities(trim($_POST['age']));
    $color = htmlentities(trim($_POST['color']));
    $description = htmlentities(trim($_POST['desc']));
    $contact = htmlentities(trim($_POST['contact']));
    $contactTele = htmlentities(trim($_POST['contact-tele']));
    $show = isset($_POST['show-slide']);
    $home = $_POST['home'];
    $hide = isset($_POST['add-adoptable']) ? 1 : 0;

    $files = [];
    $files[] = isset($_FILES['cat-image0']) ? $_FILES['cat-image0'] : null;
    $files[] = isset($_FILES['cat-image1']) ? $_FILES['cat-image1'] : null;
    $files[] = isset($_FILES['cat-image2']) ? $_FILES['cat-image2'] : null;

    // Sets valid to true
    $valid = true;

    // Check name
    if(!is_string($catName) || strlen($catName) === 0) {
        $valid = false;
    }

    // Check age
    if(!is_string($age) || strlen($age) === 0 || strlen($age) > 4) {
        $valid = false;
    }

    // Check color
    if(!is_string($color) || strlen($color) === 0) {
        $valid = false;
    }

    // Check description
    if(!is_string($description) || strlen($description) === 0) {
        $valid = false;
    }

    // Check email
    if(!is_string($contact) || strlen($contact) === 0 || count(explode('@', $contact)) != 2) {
        $valid = false;
    }

    if($show == false) {
        $show = 0;
    } else {
        $show = 1;
    }

    $addCat = false;

    // Adds if everything checks out
    if($valid) {
        $id = $database->addCat($catName, $gender, $color, $age, $description, $home, $contact, $contactTele, $show, $hide);
        if ($id !== null) {
            $addCat = true;

            $filenames = [];

            foreach ($files as $file) {
                if($file !== null) {
                    $filenames[] =  SaveFile($file);
                } else {
                    $file[] = null;
                }
            }

            foreach ($filenames as $key => $filename) {
                if ($filename !== null)
                    $database->addCatImage($id, $filename, $key);
            }

        }
    }
    $goToPage = 'cats';
}

// Change cat
if(isset($_POST['change-cat'])) {
    $id = $_POST['id'];
    $name = htmlentities(trim($_POST['catname']));
    $gender = $_POST['gender'];
    $age = htmlentities(trim($_POST['age']));
    $color = htmlentities(trim($_POST['color']));
    $description = htmlentities(trim($_POST['desc']));
    $contact = htmlentities(trim($_POST['contact']));
    $contactTele = htmlentities(trim($_POST['contact-tele']));
    $show = isset($_POST['show-slide']);
    $home = $_POST['home'];
    $adoptedCat = isset($_POST['adopted']) ? date('Y/m/d h:i:s') : null;
    $hide = isset($_POST['change-adoptable']) ? 1 : 0;

    $files = [];
    $files[] = isset($_FILES['cat-image0']) ? $_FILES['cat-image0'] : null;
    $files[] = isset($_FILES['cat-image1']) ? $_FILES['cat-image1'] : null;
    $files[] = isset($_FILES['cat-image2']) ? $_FILES['cat-image2'] : null;

    // Sets valid to true
    $valid = true;

    // Check name
    if(!is_string($name) || strlen($name) === 0) {
        $valid = false;
    }

    // Check age
    if(!is_string($age) || strlen($age) === 0 || strlen($age) > 4) {
        $valid = false;
    }

    // Check color
    if(!is_string($color) || strlen($color) === 0) {
        $valid = false;
    }

    // Check description
    if(!is_string($description) || strlen($description) === 0) {
        $valid = false;
    }

    // Check email
    if(!is_string($contact) || strlen($contact) === 0 || count(explode('@', $contact)) != 2) {
        $valid = false;
    }

    if($show == false) {
        $show = '0';
    } else {
        $show = '1';
    }

    if($valid) {
        $changeCat = $database->changeCat($id, $name, $age, $gender, $color, $description, $home, $contact, $contactTele, $show, $adoptedCat, $hide);
        $filenames = [];

        foreach ($files as $file) {
            if($file !== null) {
                $filenames[] =  SaveFile($file);
            } else {
                $file[] = null;
            }
        }

        foreach ($filenames as $key => $filename) {
            if ($filename !== null)
                $database->addCatImage($id, $filename, $key);
        }
    } else {
        $changeCat = false;
    }

    $goToPage = 'cats';
}