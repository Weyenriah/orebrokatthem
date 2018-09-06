<?php
    require_once 'components/resources.php';

    // Reverse cat page flow
    $reversed = isset($_GET['oa']) ? $_GET['oa'] === "true" : false;

    // Get page
    $page = isset($_GET['page']) ? $_GET['page'] : 0;

    $filter = array();

    // Filter
    $gender = 0; // Gender filter
    if(isset($_GET['male'])) {
        $gender += 1;
        $filter[] = 'male=true';
    }
    if (isset($_GET['female'])) {
        $gender += 2;
        $filter[] = 'female=true';
    }

    $living = 0; // Living filter
    if(isset($_GET['jourhome'])) {
        $living += 1;
        $filter[] = 'jourhome=true';
    }
    if (isset($_GET['cathome'])) {
        $living += 2;
        $filter[] = 'cathome=true';
    }

    // Search cats according to name
    $name = "";

    $search = isset($_GET['search']) && $_GET['search'] != '';
    if($search) {
        $name = $_GET['search'];
        $filter[] = 'search=' . $name;
    }

    // Glue
    $filterString = implode('&', $filter);

    // Get cats
    $cats = $database->getCats($page, $gender, $living, $name);
    $pages = $database->countCatPages($gender, $living, $name);

    // Keep the expanded page throughout actions with cat flow
    $expanded = isset($_GET['page']) || $search || isset($_GET['cathome']) ||
        isset($_GET['jourhome']) || isset($_GET['female']) || isset($_GET['male']) ||
        count($cats) ;
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include('components/head.php') ?>

<body id="body">
    <!-- Popup for cats -->
    <?php include('cat-page.php') ?>

    <!-- Calls for main navigation -->
    <?php include('components/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1> Adoptera </h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu ex in nulla feugiat sollicitudin. Morbi feugiat facilisis enim quis aliquet. Nunc eu massa sit amet nisl euismod sollicitudin at sit amet est. Fusce vitae rhoncus ante, quis mattis dui. Nunc commodo pellentesque tortor, a ultrices ligula tincidunt quis. Nunc imperdiet sapien id sapien interdum, nec interdum odio convallis. Vestibulum id odio tortor.
        </p>
    </header>

    <section class="red-background general-grid" id="how">
        <h2> Hur adopterar jag? </h2>
        <div class="red-paragraph">
            <p> Om du vill adoptera en katt, ta kontakt med kontaktperson/katthemmet om att få komma på besök. Vi hjälper dig att finna rätt katt som passar dig och din vardag. Bestämmer du dig för att adoptera katten gör du en överenskommelse med kontaktpersonen alt. fyller i vår adoptionsansökan på katthemmet. Detta för att bestämma om du verkar vara det rätta hemmet för katten. När du blivit godkänd som adoptivhem sätter du in adoptionsavgiften på vårt postgirokonto; 288867-5, Swishkonto; 123 082 215 5 eller i undantagsfall betalar kontant. Köpeavtal skrivs när katten hämtas och detta avtal gäller även som kvitto.<br/>
                <br/>
                När katten är leveransklar (färdigvaccinerad, avmaskad och ID-märkt, samt kastrerad om katten är könsmogen) hämtas den när det passar bäst enligt överenskommelse mellan nya ägaren och ansvarig för katten.<br/>
                <br/>
                Innan dess, passa på att fundera över om det verkligen är den katten du vill tillbringa 15-20 år med framöver. Om du ångrar dig är det bara att ringa och säga det, en adoptionsansökan är ej bindande. Det är dock viktigt för oss att snarast få veta om du ångrat dig. </p>
        </div>
    </section>

    <section class="white-background general-grid" id="our-cats">
        <h2> Våra katter </h2>
        <!-- Filter -->
        <section class="filter-search white-paragraph">
            <div class="search-field">
                <form class="searches" method="GET" action="#our-cats" id="search-form">
                    <label for="search"> <i class="fas fa-search"></i> </label>
                    <input type="search" name="search" id="search" placeholder="Sök efter katt..." aria-label="Sök" value="<?php echo($name) ?>">
                    <button class="search-button" type="submit"> Sök </button>
                </form>

                <div class="filter">
                    <button type="button" name="all-filters" class="filters" id="all-filters" onclick="filter()">
                        <i class="fas fa-sliders-h"></i>
                    </button>
                </div>
            </div>
            <div id="filter-choices" class="not-display">
                <form class="filter-form" method="get" action="#our-cats" id="filter-form">
                    <span class="gender checkbox">
                        <h3 class="checkbox-title"> Kön </h3>
                        <input type="checkbox" name="female" value="true" id="female">
                        <label for="female"> Hona </label>
                        <input type="checkbox" name="male" value="true" id="male">
                        <label for="male"> Hane </label>
                    </span>

                    <span class="living checkbox">
                        <h3 class="checkbox-title"> Boende </h3>
                        <input type="checkbox" name="cathome" value="true" id="cathome">
                        <label for="cathome"> Katthem </label>
                        <input type="checkbox" name="jourhome" value="true" id="jour">
                        <label for="jour"> Jourhem </label>
                    </span>

                    <input hidden name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" >

                    <button class="filter-submit" type="submit" value="submit"> Filtrera </button>
                </form>
            </div>
        </section>
        <!-- Cat-cards -->
        <div class="white-paragraph<?php if($expanded) echo(' expanded'); ?>" id="cats">
            <?php
            if(count($cats) < 1) {
                echo('Inga katter hittades');
            }

            foreach ($cats as $cat => $kitten) {
                // Single out the last cat in array
                end($cats);
                if($cat === key($cats)) {
                    if(count($cats) < 9) {
                        $noMargin = ' no-margin';
                    }
                }
            ?>
                <div class="small-change <?php echo($noMargin); ?>">
                    <article class="cat-style" id="cat-<?php echo($kitten['id']); ?>">
                        <div class="cat-img">
                            <img class="image-to-cat" src="<?php echo(UPLOADS_FOLDER . 'images/' . $kitten['image']); ?>">
                        </div>
                        <div class="cat-text">
                            <div class="cat-title">
                                <img src="images/paw-icon-darker.png">
                                <h3 class="cat-name"> <?php echo($kitten['name']); ?> </h3>
                            </div>

                            <div class="small-info">
                                <small class="cat-age"> <?php echo($kitten['age']) ?> | </small>
                                <small class="cat-gender"> <?php echo($kitten['gender'] ? 'Hane': 'Hona') ?> | </small>
                                <small class="color"> <?php echo($kitten['color']) ?> </small>
                            </div>
                            <p class="desc"> <?php echo(explode("<br/>", $kitten['description'], 2)[0]) ?> </p>
                            <p class="desc-long" hidden> <?php echo(explode("<br/>", $kitten['description'], 2)[1]) ?> </p>
                            <div class="links">
                                <button class="read-more" type="button" onclick="showCat(<?php echo($kitten['id']); ?>)"> Läs mer om mig! </button>
                                <a class="adopt" href="mailto:<?php echo($kitten['contact']) ?>"> Adoptera mig! </a>
                            </div>
                        </div>
                    </article>
                </div>
            <?php } ?>
            <div class="prev-next">
                <?php if($page > 0 && !$search) { ?>
                    <div class="previous-page">
                        <a class="prev-arrow prev-arrow-white" href="?page=<?php echo $page - 1; if($filterString !== '') echo '&' . $filterString; ?>#our-cats">
                            <i class="fas fa-angle-left"></i> Föregående
                        </a>
                    </div>
                <?php }
                if($page < $pages - 1 && !$search) { ?>
                    <div class="next-page">
                        <a class="next-arrow next-arrow-white" href="?page=<?php echo $page + 1; if($filterString !== '') echo '&' . $filterString; ?>#our-cats">
                            Nästa <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Hide/show content -->
        <div id="hide-show">
            <button class="<?php if (count($cats) < 2) echo('hidden'); ?>" id="my-button" onclick="show()"> <?php echo($expanded ? 'Dölj' : 'Visa mer') ?> </button>
        </div>
    </section>

    <!-- Advice section -->
    <section class="red-background general-grid" id="advice">
        <h2> Tips </h2>
        <div class="red-paragraph">
            <p> Text </p>
        </div>
    </section>

    <!-- Prices section -->
    <section class="white-background general-grid" id="prices">
        <h2> Adoptionspriser </h2>
        <div class="white-paragraph">
            <div class="prices">
                <div class="price">
                    <h5 class="second-row-heading"> Katter upp till 12 år </h5>
                    <p> 1.000 kr </p>
                </div>
                <div class="price">
                    <h5 class="second-row-heading"> Två katter vid samtidig adoption </h5>
                    <p> 1.800 kr </p>
                </div>
                <div class="price">
                    <h5 class="second-row-heading"> Katter 12 år eller äldre </h5>
                    <p> 800 kr </p>
                </div>
            </div>
            <br/>
            <h5 class="second-row-heading"> Vad som ingår </h5>
            <ul>
                <li> Vuxna katter är grundvaccinerade två gånger mot kattpest och kattsnuva, kastrerade och ID-märkta.  </li>
                <li> Kattungar är grundvaccinerade två gånger mot kattpest och kattsnuva. Örebro Katthem bekostar dessutom kastrering och ID-märkning förutsatt att det utförs så snart katten blir könsmogen, senast det datum katten fyller tio månader (gäller både honor och hanar). En veterinärrekvisition som gäller hos en viss veterinär följer med adoptionsavtalet.  </li>
                <li> Näst intill alla våra katter är försäkrade i Agria, med eller utan reservationer.  </li>
            </ul>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include('components/footer.php') ?>

<script>
    // === HIDE AND SHOW FILTER CHOICES ===
    let element = document.getElementById('filter-choices');

    function filter() {
        if (element.classList.contains("not-display")) {
            element.classList.remove("not-display");
        } else {
            element.classList.add("not-display");
        }
    }

    // === HIDE AND SHOW CATS ===
    let container = document.getElementById('cats');
    let buttonText = document.getElementById('my-button');

    /* Checks if container contains class expanded, "if" it'll remove the class "else" it'll add it */
    function show() {
        if(container.classList.contains("expanded")) {
            container.classList.remove("expanded");
            /* Adds text so that the button is correct */
            buttonText.innerHTML = 'Visa mer';
        } else {
            container.classList.add("expanded");
            /* Adds text so that the button is correct */
            buttonText.innerHTML = 'Dölj';
        }
    }

    // == SHOW POPUP ===
    function showCat(id) {
        let popup = document.getElementById("cat-page");
        let background = document.getElementById("toned-down");

        let cat = document.getElementById("cat-" + id);

        /* Matches the information from popup with cat */
        popup.getElementsByClassName("cat-name")[0].textContent = cat.getElementsByClassName("cat-name")[0].textContent;
        popup.getElementsByClassName("cat-age")[0].textContent = cat.getElementsByClassName("cat-age")[0].textContent;
        popup.getElementsByClassName("cat-gender")[0].textContent = cat.getElementsByClassName("cat-gender")[0].textContent;
        popup.getElementsByClassName("color")[0].textContent = cat.getElementsByClassName("color")[0].textContent;
        popup.getElementsByClassName("adopt")[0].href = cat.getElementsByClassName("adopt")[0].href;
        popup.getElementsByClassName("desc")[0].textContent = cat.getElementsByClassName("desc")[0].textContent + '\r\n' + cat.getElementsByClassName("desc-long")[0].textContent;

        /* Show popup */
        popup.style.display = "block";
        background.style.display = "block";
    }

    /* === HIDE POPUP === */
    function hideCat() {
        let popup = document.getElementById("cat-page");
        let background = document.getElementById("toned-down");

        popup.style.display = "none";
        background.style.display = "none";
    }
    </script>
</body>
</html>