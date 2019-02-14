<?php require_once dirname(__FILE__).'/../functions/load.php';
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/includes/head.php') ?>

<body id="body">
<!-- Calls for main navigation -->
<?php include(APP_FOLDER . '/includes/navigation.php');

    if(isset($mailSent)) {
        if($mailSent) { ?>
            <p class="sent-mail"> Mejl skickat! </p>
        <?php } else { ?>
            <p class="mail-not-sent"> Mejl ej skickat. </p>
        <?php }
    }
    ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1> Bli Kontaktperson </h1>
        <p> <?php echo(nl2br($database->getContent('contactperson-header'))); ?> </p>
    </header>

    <section class="general-grid text-box blue-background" id="workers">
        <h2> Vad gör en kontaktperson? </h2>
        <div class="paragraph-position">
            <p> <?php echo(nl2br($database->getContent('contactperson-doing'))); ?> </p>
        </div>
    </section>

    <section class="general-grid text-box" id="workers">
        <h2> Vad behöver en kontaktperson klara? </h2>
        <div class="paragraph-position">
            <div class="decor-img">
                <img src="<?php echo(BASE_URL) ?>assets/images/ashild.jpg" alt="">
            </div>
             <ul>
                <?php
                $contactWhat = nl2br($database->getContent('contactperson-what'));
                $contactWhatItem = explode("*", $contactWhat);

                for ($i = 1; $i < count($contactWhatItem); $i++) {
                    $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $contactWhatItem[$i], 2);
                    $text = count($pieces) > 0 ? $pieces[0] : '';
                    echo("
                            <li>
                                $text
                            </li>
                        ");
                } ?>
            </ul>
            <br/>
            <h5 class="second-row-heading"> Det är fördelar om du har... </h5>
            <p> <?php echo(nl2br($database->getContent('contactperson-pros'))); ?> </p>
            <h5 class="second-row-heading"> Krav </h5>
            <p> <?php echo(nl2br($database->getContent('contactperson-musthaves'))); ?> </p>
        </div>
    </section>

    <section class="general-grid text-box blue-background" id="workers">
        <h2>Anmälning</h2>
        <div class="general-form paragraph-position">
            <form method="post">
                <label for="firstname" class="second-row-heading">
                    Ditt namn
                </label>
                <input type="text" id="firstname" name="firstname" placeholder="Ditt namn här..."/>

                <label for="email" class="second-row-heading">
                    E-postadress
                </label>
                <input type="text" id="email" name="email" placeholder="Din e-postadress..."/>

                <label for="email" class="second-row-heading">
                    Telefonnummer
                </label>
                <input type="text" id="email" name="email" placeholder="Ditt telefonnummer..."/>

                <label for="email" class="second-row-heading">
                    Ort
                </label>
                <input type="text" id="email" name="email" placeholder="Var du bor..."/>

                <input type="submit" name="about-contact" value="Skicka" class="button submit-button">
            </form>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/includes/footer.php') ?>
</body>
</html>