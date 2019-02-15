<?php require_once dirname(__FILE__).'/../functions/load.php';

if(isset($_POST['jour-contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $mailSent = mail(SEND_EMAIL_TO, "OKH-Jourhem: $name", str_replace("\n.", "\n..", $msg), ['From' => SEND_EMAIL_FROM, 'Reply-To' => $email]);
}
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
        <h1> Bli Jourhem </h1>
        <p> <?php echo(nl2br($database->getContent('jour-header'))); ?> </p>
    </header>

    <!-- Section for "How it is to be an emergency home?" -->
    <section class="general-grid text-box blue-background">
        <h2> Hur är det att vara jourhem? </h2>
        <div class="paragraph-position how-text">
            <?php
            $jourHow = nl2br($database->getContent('jour-how'));
            $howItems = explode("*", $jourHow);

            for ($i = 1; $i < count($howItems); $i++) {
                $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $howItems[$i], 2);
                $header = count($pieces) > 0 ? $pieces[0] : '';;
                $text = count($pieces) > 1 ? $pieces[1] : '';
                echo("
                    <h5 class='second-row-heading'>
                        $header
                    </h5>
                    <p>
                        $text
                    </p>
                ");
            } ?>
        </div>
    </section>

    <!-- Section for advice when you take care of a cat -->
    <section class="general-grid text-box">
        <h2> Tips för dig med skygg jourhemskatt </h2>
        <div class="paragraph-position">
            <div class="decor-img">
                <img src="<?php echo(BASE_URL) ?>assets/images/ashild.jpg" alt="">
            </div>
            <ol>
                <?php
                $jourTips = nl2br($database->getContent('jour-tips'));
                $tipsItems = explode("*", $jourTips);

                for ($i = 1; $i < count($tipsItems); $i++) {
                    $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $tipsItems[$i], 2);
                    $header = count($pieces) > 0 ? $pieces[0] : '';
                    $text = count($pieces) > 1 ? $pieces[1] : '';
                    echo("
                        <li>
                            <h5>
                                $header
                            </h5>
                            <p>
                                $text
                            </p>
                        </li>
                    ");
                } ?>
            </ol>
        </div>
    </section>

    <!-- Double sided, report-form on left and contact on right -->
    <section class="general-grid text-box blue-background">
        <h2>Anmälning</h2>
        <div class="paragraph-position">
            <p> <?php echo($database->getContent('jour-report')); ?> </p>
            <div class="paragraph-double-text">
                <div>
                    <h5 class="second-row-heading"> Fyll i formulär </h5>
                    <a class="link-calibri" target="_blank" href="<?php echo($database->getContent('jour-form')); ?>" rel="noopener">
                        <i class="fas fa-external-link-alt"></i> Formulär för att bli jourhem
                    </a>
                </div>
                <div>
                    <h5 class="second-row-heading"> Kontakt </h5>
                    <p> <i class="fas fa-phone"></i> <?php echo($database->getContent('jour-contact-name')); ?>: <?php echo($database->getContent('jour-contact-tele')); ?> <br/>
                    <i class="fas fa-envelope"></i> <?php echo(displayEmail($database->getContent('jour-contact-email'))) ?> </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/includes/footer.php') ?>
</body>
</html>