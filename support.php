<?php require_once 'components/resources.php'?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/components/head.php') ?>

<body id="body">
    <!-- Calls for main navigation -->
    <?php include(APP_FOLDER . '/components/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1> Stöd oss </h1>
        <p> Utöver att adoptera katter, bli jourhem och arbeta hos oss som volontär finns det fler saker du kan göra för att stötta vår verksamhet! </p>
    </header>

    <section class="blue-background general-grid" id="membership">
        <h2> Bli medlem </h2>
        <p class="blue-paragraph"> Att bli medlem i Örebro Katthem kostar 200 kr för huvudmedlem, 50 kr per övrig familjemedlem och 25 kr per husdjur. Medlemskapet gäller för 1 kalenderår i taget. Betalar du efter 1 november gäller medlemskapet även påföljande år. Betala in medlemsavgiften på vårt postgirokonto: 28 88 67-5 eller Swish-konto: 123 082 21 55 och märk insättningen med "medlemsavgift". Glöm inte att skriva ditt namn, adress och gärna mailadress. Om du inte får plats med informationen på avin, skicka ett kompletterande mail till vår kassör. </p>
    </section>

    <section class="white-background general-grid" id="insurance">
        <h2> Försäkra din katt </h2>
        <div class="white-paragraph insurance">
            <div class="insurance-img">
                <img src="uploads/images/ashild.jpg">
            </div>
            <div class="insurance-text">
                <p> Ska du försäkra din katt? Om du tecknar försäkringen via vårt ombud på Agria och uppger att du vill stödja Örebro Katthem så får vi en viss provision. Katten behöver inte vara adopterad från oss!</p>
                <br/>
                <h5 class="second-row-heading"> Kontakt </h5>
                <p> Marina Walström <br/>
                    <i class="fas fa-envelope"></i> <a href="mailto:marina.walstrom@ombud.agria.se"> marina.walstrom@ombud.agria.se </a> <br/>
                    <i class="fas fa-phone"></i> 073-33 10 709 / 021-35 74 35 <br/>
                    Tillgänglig alla dagar kl 09-21</p>
            </div>
        </div>
    </section>

    <section class="blue-background general-grid" id="wishlist">
        <h2> Önskelista </h2>
        <div class="blue-paragraph">
            <p> Det är också möjligt att skänka saker till oss på Örebro Katthem. Detta är vad vi behöver just nu. </p>
            <div class="needs">
                <div class="cat-need">
                    <h5 class="second-row-heading"> Katterna önskar sig </h5>
                    <ul>
                        <li> Kattsand <br/> <small> Helst klumpbildande då vi använder det på katthemmet, men annat går också bra </small> </li>
                        <li> Våtfoder <br/> <small> Alla sorter uppskattas! Men vi föredrar de med hög kötthalt, t.ex. Mjau och Bozita </small> </li>
                        <li> Avmaskningsmedel <br/> <small> T.ex. Milbemax, Dronsit och Banminth </small></li>
                        <li> Feliway <br/> <small> Ger blyga kissar självförtroende </small> </li>
                        <li> Godsaker <br/> <small> Räkor, tonfisk (ej i olja), laktosfri mjölk och annat smaskens </small> </li>
                        <li> Klöspelare <br/> <small> Gärna modell större </small> </li>
                        <li> Öronskabbmedel </li>
                        <li> Ampelliljor <br/> <small> Bra för att få upp hårbollar </small> </li>
                        <li> Torrfoder <br/> <small> Av bra kvalité med hög protein- och fetthalt, t.ex. Eukanuba som används åt katterna som bor på katthemmet </small> </li>
                        <li> Kattungefoder <br/> <small> Av bra kvalité med hög protein- och fetthalt. Går åt som smör i solsken för alla dräktiga honor och kattungar vi får in  </small> </li>
                    </ul>
                </div>
                <div class="human-need">
                    <h5 class="second-row-heading"> Personalen önskar sig </h5>
                    <ul>
                        <li> Stålfällor </li>
                        <li> Toapapper </li>
                        <li> Sopsäckar <br/> <small> Stora och små </small> </li>
                        <li> Frimärken, kontorstejp och tipp-ex </li>
                        <li> Sårrengöring <br/> <small> Exempelvis Alsolsprit, Jodopax och handsprit </small> </li>
                        <li> Tvättmedel <br/> <small> Katterna vill ju ha rena filtar </small> </li>
                        <li> Rengöringsmedel <br/> <small> Klorin, såpa, ytdesinfektion m.m. </small> </li>
                        <li> Disktrasor och diskmedel </li>
                        <li> Kaffe, té och socker <br/> <small> Så vi orkar städa alla lådor :) </small> </li>
                        <li> Plasttofflor "Foppatypen" <br/> <small> Till våra gäster att sätta på sig vid besök, gärna olika färger och storlekar  </small> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/components/footer.php') ?>

</body>
</html>
