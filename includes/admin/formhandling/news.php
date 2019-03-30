<?php
// Remove news
if (isset($_POST['removeNewsPost'])) {
    $removedNews = $database->deleteNewsPost($_POST['removeNewsPost']);
    $goToPage = 'news';
}

// Add news
if(isset($_POST['add-news'])) {
    //Security and checks files
    $desc = htmlentities(trim($_POST['desc']));
    $file = isset($_FILES['news-image']) ? $_FILES['news-image'] : null;
    // If everything is fine, add to database
    if(is_string($desc) == true && $desc !== '' && strlen($desc) < 10000) {
        $image = SaveFile($file);

        $newsAdded = $database->addNews($desc, $image);

        $goToPage = 'news';
    } else {
        $newsAdded = false;

        $goToPage = 'news';
    }
}

// Change news
if(isset($_POST['change-news'])) {
    //Security and checks files
    $id = $_POST['id'];
    $desc = htmlentities(trim($_POST['desc']));
    $file = isset($_FILES['news-image']) ? $_FILES['news-image'] : null;
    // If everything is fine, change in database
    if(is_string($desc) == true && $desc !== '' && strlen($desc) < 10000) {
        $image = SaveFile($file);

        $newsChanged = $database->changeNews($id, $desc, $image);

        $goToPage = 'news';
    } else {
        $newsChanged = false;

        $goToPage = 'news';
    }
}