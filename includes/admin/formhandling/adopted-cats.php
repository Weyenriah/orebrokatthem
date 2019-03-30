<?php
// Remove Cat
if (isset($_POST['removeCat'])) {
    $removedCat = $database->deleteCat($_POST['removeCat']);
    $goToPage = 'adopted-cats';
}

// Change adoptable
if(isset($_POST['adoptableCat'])) {
    $adoptedCat = NULL;

    $changedAdoptness = $database->makeAdoptable($adoptedCat, $_POST['adoptableCat']);

    $goToPage = 'adopted-cats';
}