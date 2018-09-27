<?php
    require_once 'components/resources.php';
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/components/head.php') ?>

<body id="body">
    <!-- Calls for main navigation -->
    <?php include(APP_FOLDER . '/components/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1> Adoptera </h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu ex in nulla feugiat sollicitudin. Morbi feugiat facilisis enim quis aliquet. Nunc eu massa sit amet nisl euismod sollicitudin at sit amet est. Fusce vitae rhoncus ante, quis mattis dui. Nunc commodo pellentesque tortor, a ultrices ligula tincidunt quis. Nunc imperdiet sapien id sapien interdum, nec interdum odio convallis. Vestibulum id odio tortor.
        </p>
    </header>

    <section class="blue-background general-grid" id="how">
        <h2> Hur adopterar jag? </h2>
        <div class="blue-paragraph">
            <p> Om du vill adoptera en katt, ta kontakt med kontaktperson/katthemmet om att få komma på besök. Vi hjälper dig att finna rätt katt som passar dig och din vardag. Bestämmer du dig för att adoptera katten gör du en överenskommelse med kontaktpersonen alt. fyller i vår adoptionsansökan på katthemmet. Detta för att bestämma om du verkar vara det rätta hemmet för katten. När du blivit godkänd som adoptivhem sätter du in adoptionsavgiften på vårt postgirokonto; 288867-5, Swishkonto; 123 082 215 5 eller i undantagsfall betalar kontant. Köpeavtal skrivs när katten hämtas och detta avtal gäller även som kvitto.<br/>
                <br/>
                När katten är leveransklar (färdigvaccinerad, avmaskad och ID-märkt, samt kastrerad om katten är könsmogen) hämtas den när det passar bäst enligt överenskommelse mellan nya ägaren och ansvarig för katten.<br/>
                <br/>
                Innan dess, passa på att fundera över om det verkligen är den katten du vill tillbringa 15-20 år med framöver. Om du ångrar dig är det bara att ringa och säga det, en adoptionsansökan är ej bindande. Det är dock viktigt för oss att snarast få veta om du ångrat dig. </p>
        </div>
    </section>

    <!-- Advice section -->
    <section class="white-background general-grid" id="advice">
        <h2> Tips </h2>
        <div class="white-paragraph">
            <p> Text </p>
        </div>
    </section>

    <!-- Prices section -->
    <section class="blue-background general-grid" id="prices">
        <h2> Adoptionspriser </h2>
        <div class="blue-paragraph price-info">
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
    <?php include(APP_FOLDER . '/components/footer.php') ?>
</body>
</html>