<?php require_once 'components/resources.php'?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include('components/head.php') ?>

<body>
    <!-- Calls for main navigation -->
    <?php include('components/navigation.php') ?>

    <!-- Specific navigation for this page -->
    <nav class="second-navbar">
        <ul class="second-nav-list">
            <li><a class="active" href="#how"> Hur </a></li>
            <li><a href="#our-cats"> Våra Katter </a></li>
            <li><a href="#advice"> Tips </a></li>
            <li><a href="#prices"> Pris </a></li>
        </ul>
    </nav>

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
        <div class="filter white-paragraph">
            <div class="searches">
                <label for="search"> <i class="fas fa-search"></i> </label>
                <input type="text" name="search" id="search" value="Sök efter katt...">
                <button type="button" id="filters" onclick="filter()">
                    Filter
                </button>
            </div>
            <div id="filter-choices">
                <div class="choices"> Hanar </div>
                <div class="choices"> Honor </div>
                <div class="choices"> 0 - 10 år </div>
                <div class="choices"> 10+ år </div>
            </div>
        </div>
        <!-- Cat-cards -->
        <div class="white-paragraph" id="cats">
            <article class="cat">
                <div class="cat-img">
                    <img src="images/ashild.jpg">
                </div>
                <div class="cat-text">
                    <h3> <img src="images/paw-icon-darker.png"> Åshild </h3>
                    <small> Troligen född 2017 | Hona | Bruntigré med lite vitt </small>
                    <p> Blyg och försiktig och behöver tid på sig att bli bekväm med människor.
                        Gått hemlös i Åmmeberg utanför Askersund.  </p>
                    <a href="#"> Adoptera mig! </a>
                </div>
            </article>

            <hr/>

            <article class="cat">
                <div class="cat-img">
                    <img src="images/mollyblom.jpg">
                </div>
                <div class="cat-text">
                    <h3> <img src="images/paw-icon-darker.png"> Molly Blom </h3>
                    <small> Född 2006 | Hona | Svart och vit </small>
                    <p> Social och kelig. Van utekatt. Kommer från samma hem som sitt syskon Mimmi Blom. Inkom på grund av att ägare ska flytta till äldreboende och kan inte ta sina katter med sig. Kommer från Lindesberg.
                        Vill ha samma hem som sitt syskon Mimmi Blom.
                        <br/> </p>
                        <h5 class="second-row-heading">180223:</h5> <p> "Mimmi och Molly söker ett hem där blivande husse eller matte är hemma om dagarna då de är väldigt sociala och vill ha mycket närhet. De tycker mycket om att ligga i knät eller på magen. De behöver en trygg och lugn miljö, så ett hem utan små barn är att föredra. De är utekatter och vill gärna ha tillgång till många små träd att klättra i." /Tidigare ägare  </p>
                    <a href="#"> Adoptera mig! </a>
                </div>
            </article>
        </div>
        <!-- Hide/show content -->
        <div id="hide-show">
            <button id="my-button" onclick="show()"> Visa mer </button>
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
    // HIDE AND SHOW FILTER CHOICES
    let element = document.getElementById('filter-choices');

    function filter() {
        if (element.style.display === "block") {
            element.style.display = "none";
        } else {
            element.style.display = "block";
        }
    }

    // === HIDE AND SHOW CATS ===
    let button = document.getElementById('hide-show');
    let container = document.getElementById('cats');
    let buttonText = document.getElementById('my-button');

    /* Checks if container contains class expanded, "if" it'll remove the class "else" it'll add it */
    button.onclick = function show(){
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
    </script>
</body>
</html>