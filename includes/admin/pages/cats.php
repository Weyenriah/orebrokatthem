<?php
require_once dirname(__FILE__).'/../../../functions/load.php';

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
    $show = isset($_POST['show-slide']);
    $home = $_POST['home'];

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
        $id = $database->addCat($catName, $gender, $color, $age, $description, $home, $contact, $show);
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
    $show = isset($_POST['show-slide']);
    $home = $_POST['home'];

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
        $changeCat = $database->changeCat($id, $name, $age, $gender, $color, $description, $home, $contact, $show);
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

// Pagination Cats
$catsPages = $database->countCats();
// Get page
$catsPage = 0;

if(isset($_GET['catspage'])) {
    $catsPage = $_GET['catspage'];
    $goToPage = 'cats';
}

// Get cats from DB
$cats = $database->getAdminCats($catsPage);

?>

<section class="page" id="cats">
    <h2 class="page-title">Hantera Katter</h2>
    <button class="add-button" type="button" onclick="showPopupCats()"> Lägg till </button>
    <div class="pagination">
        <!-- Pagination -->
        <?php if($catsPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?catspage=<?php echo $catsPage - 1 ?>#catsflow">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($catsPage < $catsPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?catspage=<?php echo $catsPage + 1 ?>#catsflow">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
    <!-- Added/Removed text -->
    <?php if(isset($removedCat)) { ?>
        <div class="removed">
            <p>
                <?php if($removedCat === true) {
                    echo("Katt borttagen");
                } ?>

                <?php if($removedCat === false) {
                    echo("Kunde inte ta bort katten");
                } ?>
            </p>
        </div>
    <?php } ?>
    <?php if(isset($addCat)) { ?>
        <div class="added">
            <p>
                <?php if($addCat === true) {
                    echo("Katt tillagd!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($addCat === false) {
                    echo("Kunde inte lägga till katten");
                } ?>
            </p>
        </div>
    <?php } ?>
    <?php if(isset($changeCat)) { ?>
        <div class="added">
            <p>
                <?php if($changeCat === true) {
                    echo("Katt ändrad!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($changeCat === false) {
                    echo("Katten kunde inte ändras");
                } ?>
            </p>
        </div>
    <?php } ?>

    <!-- Show Cat-flow -->
    <div class="page-display">
        <?php
        foreach ($cats as $cat) {

            $images = $database->getCatImages($cat['id']);
        ?>
        <article class="cat" id="cat-<?php echo($cat['id']) ?>">
            <div class="cat-display-images">
                <div class="cat-img big-cat-img">
                    <img src="<?php echo(BASE_URL . ((count($images) > 0) ? UPLOADS_FOLDER . 'images/' . $images[0]['image'] : "assets/images/cat-placeholder.jpg"));  ?>" alt="En bild på en katt">
                </div>
                <div class="small-cat-pics">
                    <div class="cat-img">
                        <img src="<?php echo(BASE_URL . ((count($images) > 1) ? UPLOADS_FOLDER . 'images/' . $images[1]['image'] : "assets/images/cat-placeholder.jpg"));  ?>" alt="">
                    </div>
                    <div class="cat-img">
                        <img src="<?php echo(BASE_URL . ((count($images) > 2) ? UPLOADS_FOLDER . 'images/' . $images[2]['image'] : "assets/images/cat-placeholder.jpg"));  ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="cat-text">
                <div class="two-buttons-fix">
                    <button class="two-buttons" type="button" onclick="showPopupChangeCat(<?php echo($cat['id']) ?>)">
                        <i class="fas fa-pencil-alt"></i> Ändra Katt
                    </button>
                    <form method="post">
                        <button class="two-buttons" type="submit" formmethod="post" name="removeCat" value="<?php echo($cat['id']); ?>">
                            <i class="fas fa-times"></i> Ta bort Katt
                        </button>
                    </form>
                </div>
                <div class="cat-information">
                    <h3 class="catname"><?php echo($cat['name']) ?></h3>
                    <small>
                        <span class="age"><?php echo($cat['age']) ?></span>
                        | <span class="cat-gender"><?php if($cat['gender'] === 1) {
                                echo('Hane');
                            } else {
                                echo('Hona');
                            } ?></span>
                        | <span class="color"><?php echo($cat['color']) ?></span>
                    </small>
                    <!-- Hidden element for JavaScript -->
                    <span class="gender" hidden><?php echo($cat['gender']) ?></span>
                    <p class="description"><?php echo($cat['description']) ?></p>
                    <div class="contact-cat">
                        <div class="cat-home">
                            <i class="fas fa-home"></i>
                            <p>
                                <?php
                                if($cat['home'] === 1) {
                                    echo('Katthemmet');
                                } else {
                                    echo('Jourhem');
                                } ?>
                            </p>
                        </div>
                        <!-- Hidden element for JavaScript -->
                        <span class="home" hidden><?php echo($cat['home']); ?></span>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <a class="cat-contact" href="mailto:<?php echo($cat['contact']); ?>"><?php echo ($cat['contact']); ?></a>
                        </p>
                    </div>
                    <p class="showcase">
                        <?php if($cat['showcase'] === 1) {
                            echo('Visas på framsidan');
                        } ?>
                    </p>
                    <!-- Hidden element for JavaScript -->
                    <span class="showcase-cat" hidden><?php echo($cat['showcase']) ?></span>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>
    <!-- Pagination -->
    <div class="pagination">
        <?php if($catsPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?catspage=<?php echo $catsPage - 1 ?>#catsflow">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($catsPage < $catsPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?catspage=<?php echo $catsPage + 1 ?>#catsflow">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
</section>

<script>
    function showPopupChangeCat(id) {
        let popup = document.getElementById('popup-change-cat');

        /* Selects the right newspost */
        let cat = document.getElementById("cat-" + id);

        /* Matches the information from popup with employee */
        popup.getElementsByClassName('catname')[0].value = cat.getElementsByClassName("catname")[0].textContent;
        popup.getElementsByClassName('age')[0].value = cat.getElementsByClassName("age")[0].textContent;
        popup.getElementsByClassName('gender')[0].value = cat.getElementsByClassName('gender')[0].textContent;
        popup.getElementsByClassName('color')[0].value = cat.getElementsByClassName("color")[0].textContent;
        popup.getElementsByClassName('description')[0].value = cat.getElementsByClassName("description")[0].textContent;
        popup.getElementsByClassName('home')[0].value = cat.getElementsByClassName('home')[0].textContent;
        popup.getElementsByClassName('contact')[0].value = cat.getElementsByClassName("cat-contact")[0].textContent;
        popup.getElementsByClassName('showcase')[0].checked = cat.getElementsByClassName("showcase-cat")[0].textContent === '1';

        popup.getElementsByClassName('id-field')[0].value = id;

        popup.style.display = 'block';

        /* Scrolls up to top when button is clicked */
        window.scroll(0, 0);
    }
</script>