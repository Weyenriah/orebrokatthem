<!DOCTYPE html>
<html lang="en">

<!-- Calls for head -->
<?php include('../components/head.php') ?>

<body>
    <!-- Calls for main navigation -->
    <?php include('../components/navigation.php') ?>

    <!-- Specific navigation for this page -->
    <nav class="second-navbar">
        <ul class="second-nav-list">
            <li><a class="active" href="#"> Hur </a></li>
            <li><a href="#"> Våra Katter </a></li>
            <li><a href="#"> Tips </a></li>
            <li><a href="#"> Pris </a></li>
        </ul>
    </nav>

    <header class="header">
        <h1> Adoptera </h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu ex in nulla feugiat sollicitudin. Morbi feugiat facilisis enim quis aliquet. Nunc eu massa sit amet nisl euismod sollicitudin at sit amet est. Fusce vitae rhoncus ante, quis mattis dui. Nunc commodo pellentesque tortor, a ultrices ligula tincidunt quis. Nunc imperdiet sapien id sapien interdum, nec interdum odio convallis. Vestibulum id odio tortor.
        </p>
    </header>

    <section class="red-background general-grid">
        <h2> Hur adopterar jag? </h2>
        <div class="red-paragraph">
            <p> Om du vill adoptera en katt, ta kontakt med kontaktperson/katthemmet om att få komma på besök. Vi hjälper dig att finna rätt katt som passar dig och din vardag. Bestämmer du dig för att adoptera katten gör du en överenskommelse med kontaktpersonen alt. fyller i vår adoptionsansökan på katthemmet. Detta för att bestämma om du verkar vara det rätta hemmet för katten. När du blivit godkänd som adoptivhem sätter du in adoptionsavgiften på vårt postgirokonto; 288867-5, Swishkonto; 123 082 215 5 eller i undantagsfall betalar kontant. Köpeavtal skrivs när katten hämtas och detta avtal gäller även som kvitto.<br/>
                <br/>
                När katten är leveransklar (färdigvaccinerad, avmaskad och ID-märkt, samt kastrerad om katten är könsmogen) hämtas den när det passar bäst enligt överenskommelse mellan nya ägaren och ansvarig för katten.<br/>
                <br/>
                Innan dess, passa på att fundera över om det verkligen är den katten du vill tillbringa 15-20 år med framöver. Om du ångrar dig är det bara att ringa och säga det, en adoptionsansökan är ej bindande. Det är dock viktigt för oss att snarast få veta om du ångrat dig. </p>
        </div>
    </section>

    <section class="our-cats">
        <div class="top">
            <h2> Våra katter </h2>
            <div class="filter">

            </div>
        </div>
        <div class="cats">
            <div class="cat">
                <div class="cat-info">
                    <img src="../images/ashild.jpg">
                    <div class="cat-text">
                        <h3> Åshild </h3>
                        <small> Ålder | Kön | Färg </small>
                        <p> fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff </p>
                        <a href="#"> Adoptera mig! </a>
                    </div>
                </div>
            </div>

            <div class="cat">
                <div class="cat-info">
                    <img src="../images/ashild.jpg">
                    <div class="cat-text">
                        <h3> Åshild </h3>
                        <small> Ålder | Kön | Färg </small>
                        <p> Text </p>
                        <a href="#"> Adoptera mig! </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include('../components/footer.php') ?>
</body>
</html>