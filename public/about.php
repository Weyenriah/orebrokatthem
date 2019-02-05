<?php
    require_once dirname(__FILE__) . '/../functions/load.php';

    $employees = $database->getEmployees();

    if(isset($_POST['about-contact'])) {
        $name = $_POST['firstname'];
        $email = $_POST['email'];
        $msg = $_POST['subject'];

        $mailSent = mail(SEND_EMAIL_TO, "OKH-Kontakt: $name", str_replace("\n.", "\n..", $msg), ['From' => SEND_EMAIL_FROM, 'Reply-To' => $email]);
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
        <h1> Om Oss </h1>
        <p> <?php echo(nl2br($database->getContent('about-header'))); ?> </p>
    </header>

    <!-- Section for employees -->
    <section class="general-grid text-box blue-background " id="workers">
        <h2> Vi som jobbar här! </h2>
        <div class="employee-cards">
            <!-- Employee cards -->
            <?php foreach ($employees as $employee) { ?>
                <article class="employee-card">
                    <?php if ($employee['image'] !== '' && $employee['image'] !== NULL) { ?>
                        <div class="employee-pic">
                            <img src="<?php echo(BASE_URL . UPLOADS_FOLDER . 'images/' . $employee['image']); ?>" alt="En bild på en person ur personalen">
                        </div>
                    <?php } else { ?>
                        <div style="display:none"></div>
                    <?php } ?>
                    <div class="employee-info">
                        <h3> <?php echo($employee['name']); ?> </h3>
                        <small> <?php echo($employee['title']); ?> </small>
                        <p class="tele"><i class="fas fa-phone"></i> <?php echo($employee['telephone']); ?> </p>
                        <p class="employee-mail"><i class="fas fa-envelope"></i> <?php echo(displayEmail($employee['email'])) ?> </p>
                    </div>
                </article>
            <?php } ?>
        </div>
    </section>

    <!-- Contact section -->
    <section class="general-grid text-box" id="contact">
        <h2>Kontakta oss</h2>
        <div class="contact-us">
            <form method="post">
                <label for="firstname" class="second-row-heading">
                    Ditt namn
                </label>
                <input type="text" id="firstname" name="firstname" placeholder="Ditt namn här..."/>

                <label for="email" class="second-row-heading">
                    Din emailadress
                </label>
                <input type="text" id="email" name="email" placeholder="Din e-post här..."/>

                <label for="subject" class="second-row-heading">
                    Meddelande
                </label>
                <textarea id="subject" name="subject" placeholder="Skriv ditt meddelande här..."></textarea>

                <input type="submit" name="about-contact" value="Skicka" class="button submit-button">
            </form>

            <!-- Information where to contact otherwise -->
            <div class="contact-info">
                <section>
                    <h5 class="second-row-heading"> Besök oss </h5>
                    <p> <?php echo(nl2br($database->getContent('about-visit'))); ?> <br/>
                        <i class="fas fa-phone"></i> <?php echo($database->getContent('about-visit-tele')); ?>
                    </p>
                </section>
                <section>
                    <h5 class="second-row-heading"> Anmälning av hemlös katt </h5>
                    <p> <i class="fas fa-phone"></i> <?php echo($database->getContent('about-tell-tele')); ?> </p>
                    <small> <?php echo($database->getContent('about-tell-name')); ?> </small>
                </section>
                <section>
                    <h5 class="second-row-heading"> Adoptera katt </h5>
                    <p> <?php echo($database->getContent('about-adopt-info')); ?> </p>
                </section>
            </div>
        </div>
    </section>

    <!-- Section for how to apply to be a volonteer -->
    <section class="general-grid text-box blue-background" id="volonteer">
        <h2> Bli volontär </h2>
        <div class="paragraph-position become">
            <div class="decor-img">
                <img src="<?php echo(BASE_URL) ?>assets/images/ashild.jpg" alt="">
            </div>
            <div class="become-info">
                <div class="become-text">
                    <p> Vill du ha någon sysselsättning på din fritid så har Örebro Katthem drygt 30 katter som väldigt gärna vill ha sällskap och omvårdnad! Vi har ont om volontärer och behöver ha mer arbetskraft. En perfekt sysselsättning för dig som älskar katter och lärorikt för dig som vill lära dig mer om beteende, hälsa, skötsel och skygga katter.
                    </p>
                    <h5 class="second-row-heading"> Krav </h5>
                    <ul>
                        <?php
                        $aboutDemands = nl2br($database->getContent('about-vol-demands'));
                        $aboutDemand = explode("*", $aboutDemands);

                        for ($i = 1; $i < count($aboutDemand); $i++) {
                            $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $aboutDemand[$i], 2);
                            $text = count($pieces) > 0 ? $pieces[0] : '';
                            echo("
                                <li>
                                    $text
                                </li>
                            ");
                        } ?>
                    </ul>
                    <p> <br/>
                        Varje dag har vi morgonpass och kvällspass på katthemmet och du bestämmer själv när och hur ofta du kan hjälpa till.
                        Om du inte varit på katthemmet tidigare är det jättebra att börja med att komma dit någon dag och se hur det ser ut och prata med personalen där. Antingen att du hoppar in på öppet hus (söndagar eller onsdagar) eller så bestämmer du med någon som jobbar att du kommer dit någon annan tid när det kanske är lite lugnare. </p>
                </div>
                <!-- Contact information -->
                <div class="paragraph-double-text">
                    <div>
                        <h5 class="second-row-heading"> Ring till katthemmet </h5>
                        <p><i class="fas fa-phone"></i> <?php echo($database->getContent('about-vol-tele')); ?> </p>
                    </div>
                    <div>
                        <h5 class="second-row-heading"> Mejla personalansvarige </h5>
                        <p><i class="fas fa-envelope"></i> <?php echo(displayEmail($database->getContent('about-vol-email'))); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/includes/footer.php') ?>
</body>
</html>