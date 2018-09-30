<?php require_once 'components/resources.php';

if(isset($_POST['jour-contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    // TODO send mail
}
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
        <h1> Bli Jourhem </h1>
        <p> <?php echo($database->getContent('jour-header')); ?> </p>
    </header>

    <!-- Section for "How it is to be an emergency home?" -->
    <section class="blue-background general-grid" id="how">
        <h2> Hur är det att vara jourhem? </h2>
        <div class="blue-paragraph how-text">
            <?php echo($database->getContent('jour-how')); ?>
        </div>
    </section>

    <!-- Section for advice when you take care of a cat -->
    <section class="white-background general-grid" id="tips">
        <h2> Tips för dig med skygg jourhemskatt </h2>
        <div class="white-paragraph">
            <div class="tips-img">
                <img src="uploads/images/ashild.jpg">
            </div>
            <ol>
                <li>
                    <span class="left-num"> 1 </span>
                    <h5 class="adjust-main-left second-row-heading"> Förberedelser innan katten kommer hem </h5>
                    <p class="adjust-main-left">
                        Ställ i ordning en tom kartong med något att ligga på. Ta en modell större och vänd den så att det blir en liten öppning fram och ett krypin att dra sig undan i. Obs! Ej banankartong, dessa är besprutade med gift!
                        Ställ fram en låda med kattsand och matskålar. Ta bort mattor från golvet och blommor från fönster.
                    </p>
                </li>
                <li>
                    <span class="left-num"> 2 </span>
                    <h5 class="adjust-main-left second-row-heading"> När katten kommer </h5>
                    <p class="adjust-main-left">
                        Ställ in kattburen i rummet och öppna och gå ut från rummet så katten får gå ut i lugn och ro och inte blir stressad. Dra gärna för gardiner eller dra ned persienner. En katt som kommer direkt utifrån har aldrig sett ett fönster och tror att den kan ta sig ut där och kan hoppa mot rutan och skada sig.
                    </p>
                </li>
                <li>
                    <span class="left-num"> 3 </span>
                    <h5 class="adjust-main-left second-row-heading"> Första tiden </h5>
                    <p class="adjust-main-left">
                        Katten kommer antagligen att fräsa åt dig och springa in i sin kartong och gömma sig när du kommer in i rummet. Prata ändå med katten och låt den bli van vid din röst. Skapa gärna rutiner, t ex att tömma lådan först och sedan fylla på mat. Prata med mjuk röst och gör inga häftiga rörelser som skrämmer katten.

                        Får du ögonkontakt med katten så kom ihåg att blinka långsamt med ögonen. Det betyder på kattspråk att du är snäll. Att stirra en katt stint i ögonen betyder att man är aggressiv och utmanande. Träng absolut inte in katten i ett hörn utan gå undan så att katten får passera och springa in i sitt trygga bo. Det går aldrig att tvinga katter, bara att locka till umgänge på kattens villkor.
                    </p>
                </li>
                <li>
                    <span class="left-num"> 4 </span>
                    <h5 class="adjust-main-left second-row-heading"> När katten börjar sluta fräsa </h5>
                    <p class="adjust-main-left">
                        Efter en tid börjar katten bli lite nyfiken på dig när du kommer in i rummet och stannar kvar utanför kartongen även när du finns i rummet. Är det en yngre katt kan man nu försöka få igång katten att leka. Prova med vippa, pälsmöss eller att försiktigt rulla med en liten boll.
                    </p>
                </li>
                <li>
                    <span class="left-num"> 5 </span>
                    <h5 class="adjust-main-left second-row-heading"> Mat </h5>
                    <p class="adjust-main-left">
                        De flesta hittekatter föredrar våtfoder och förstår sig ibland inte på torrfoder. De brukar äta det allra mesta. De äter massor i början då de tror att de kanske inte kommer att få något mer på ett tag och bäst att äta när det finns. Detta brukar lugna ner sig efter ett tag. Första tiden äter de bara på natten, när allt är lugnt.
                    </p>
                </li>
                <li>
                    <span class="left-num adjusting-num-down"> 6 </span>
                    <h5 class="adjust-main-left second-row-heading"> Hygien </h5>
                    <p class="adjust-main-left">
                        De allra flesta katter som levt ute en längre tid klarar att gå på låda alldeles galant. Sandlådan är ju det som är mest likt att göra i naturen. Har man tagit bort mjuka material från rummet innan, går katten på låda redan första natten.
                    </p>
                </li>
                <li>
                    <span class="left-num"> 7 </span>
                    <h5 class="adjust-main-left second-row-heading"> Att stryka på katten </h5>
                    <p class="adjust-main-left">
                        Man kan försiktigt börja stryka katten över ryggen när katten äter. Nudda den lite i början och träna sedan varje dag på att stryka lite mer. Efter ett tag kommer katten på att det faktiskt är skönt och börjar då försiktigt nosa mer och mer.
                    </p>
                </li>
                <li>
                    <span class="left-num adjusting-num-down"> 8 </span>
                    <h5 class="adjust-main-left second-row-heading"> Träna på att lyfta </h5>
                    <p class="adjust-main-left">
                        Att träna att lyfta en katt går till på samma vis som när man börjar stryka på den. Börja med att bara greppa om den och släpp. Försök sedan lyfta lite mer och mer.
                    </p>
                </li>
                <li>
                    <span class="left-num"> 9 </span>
                    <h5 class="adjust-main-left second-row-heading"> Att få in en skygg katt i transportbur </h5>
                    <p class="adjust-main-left">
                        Det här är bland det svåraste, särskilt med tanke på att stressa katten så lite som möjligt. Ett bra sätt är att utrusta sig med handskar och en stor badhandduk. Det är bra om man är två personer som hjälps åt. En person kastar badhandduken över katten, greppar runt och lyfter in den i buren. Den andra personen håller buren och håller den så tätt som möjligt så att det hela sker så fort som möjligt. Stoppa in handduken med katten. När katten väl är inne i buren brukar den lugna sig ganska fort och kryper under badhandduken. Måste man t ex till veterinär är det ett bra sätt.
                    </p>
                </li>
                <li>
                    <span class="left-num adjusting-num-left"> 10 </span>
                    <h5 class="adjust-main-left second-row-heading"> Hur lång tid tar det? </h5>
                    <p class="adjust-main-left">
                        Detta är ju individuellt för varje katt. Man får räkna med 3-4 månader och i bland mer för vissa individer. För katter som haft ett hem och sedan gått hemlösa går det oftast mycket snabbare.
                    </p>
                </li>
                <li>
                    <span class="left-num adjusting-num-left"> 11 </span>
                    <h5 class="adjust-main-left second-row-heading"> Det viktigaste </h5>
                    <p class="adjust-main-left">
                        Att katten får känna att den är "älskad för det den är". Som min veterinär så klokt säger: "-Det är bara kärlek dom behöver." Katter är mycket känsliga för sinnesstämningar så de vet precis om man är på dåligt humör. De "läser av" en redan i dörren.
                    </p>
                </li>
            </ol>
        </div>
    </section>

    <!-- Double sided, report-form on left and contact on right -->
    <section class="blue-background general-grid" id="report">
        <h2>Anmälning</h2>
        <div class="report-info blue-paragraph">
            <form method="post">
                <label for="name" class="second-row-heading">
                    Ditt namn
                </label>
                <input type="text" id="name" name="name" placeholder="Ditt namn här..."/>

                <label for="email" class="second-row-heading">
                    Din emailadress
                </label>
                <input type="text" id="email" name="email" placeholder="Din e-post här..."/>

                <label for="msg" class="second-row-heading">
                    Meddelande
                </label>
                <textarea id="msg" name="msg" placeholder="Skriv ditt meddelande här..."></textarea>

                <input type="submit" name="jour-contact" value="Skicka" class="submit-button">
            </form>
            <div class="report-contact">
                <h5 class="second-row-heading"> Eller ring till </h5>
                <p> <i class="fas fa-phone"></i> 0580-125 69 </p>
                <small> Kikki </small>
            </div>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/components/footer.php') ?>
</body>
</html>