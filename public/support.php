<?php require_once dirname(__FILE__).'/../functions/load.php' ?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/includes/head.php') ?>

<body id="body">
    <!-- Calls for main navigation -->
    <?php include(APP_FOLDER . '/includes/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1> Stöd oss </h1>
        <p> <?php echo(nl2br($database->getContent('support-header'))); ?> </p>
    </header>
    <!-- Become Member -->
    <section class="general-grid text-box blue-background" id="membership">
        <h2> Bli medlem </h2>
        <div class="paragraph-position">
            <p> <?php echo(nl2br($database->getContent('support-member'))); ?> </p>
            <div class="paragraph-double-text">
                <div>
                    <h5 class="second-row-heading"> Betalningsmetoder </h5>
                    <p><i>Postgiro:</i> <?php echo($database->getContent('support-member-post')); ?> </p>
                    <p><i>Swish:</i> <?php echo($database->getContent('support-member-swish')); ?> </p>
                </div>
                <div>
                    <h5 class="second-row-heading"> Kontakt vid kompletterande mejl </h5>
                    <p> <i class="fas fa-envelope"></i> <?php echo(displayEmail($database->getContent('support-member-mail'))); ?> </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Insurance for cat -->
    <section class="general-grid text-box" id="insurance">
        <h2> Försäkra din katt </h2>
        <div class="paragraph-position insurance">
            <div class="decor-img" id="insurance-img">
                <img src="<?php echo(BASE_URL) ?>assets/images/ashild.jpg" alt="">
            </div>
            <div class="insurance-text">
                <p> <?php echo(nl2br($database->getContent('support-insuranceinfo'))); ?> </p>
                <br/>
                <h5 class="second-row-heading"> Kontakt </h5>
                <p> <?php echo($database->getContent('support-insurance-name')); ?> <br/>
                    <i class="fas fa-envelope"></i> <?php echo(displayEmail($database->getContent('support-insurance-email'))); ?>
                    <br/>
                    <i class="fas fa-phone"></i> <?php echo($database->getContent('support-insurance-tele')); ?> <br/>
                    <?php echo($database->getContent('support-insurance-availab')); ?> </p>
            </div>
        </div>
    </section>
    <!-- Wishinglist -->
    <section class="general-grid text-box blue-background" id="wishlist">
        <h2> Önskelista </h2>
        <div class="paragraph-position">
            <p> Det är också möjligt att skänka saker till oss på Örebro Katthem. Detta är vad vi behöver just nu. </p>
            <div class="needs">
                <div class="cat-need">
                    <h5 class="second-row-heading"> Katterna önskar sig </h5>
                    <ul>
                        <?php
                        $catNeeds = $database->getContent('support-catneed');
                        $catNeedItems = explode("*", $catNeeds);

                        for ($i = 1; $i < count($catNeedItems); $i++) {
                            $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', nl2br(trim($catNeedItems[$i])), 2);
                            $header = count($pieces) > 0 ? $pieces[0] : '';
                            $text = count($pieces) > 1 ? $pieces[1] : '';
                            echo("
                                <li>
                                    $header
                                    <small>
                                        $text<br><br>
                                    </small>
                                </li>
                            ");
                        } ?>
                    </ul>
                </div>
                <div class="human-need">
                    <h5 class="second-row-heading"> Personalen önskar sig </h5>
                    <ul>
                        <?php
                        $humanNeeds = $database->getContent('support-humanneed');
                        $humanNeedItems = explode("*", $humanNeeds);

                        for ($i = 1; $i < count($humanNeedItems); $i++) {
                            $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', nl2br(trim($humanNeedItems[$i])), 2);
                            $header = count($pieces) > 0 ? $pieces[0] : '';
                            $text = count($pieces) > 1 ? $pieces[1] : '';

                            echo("
                                <li>
                                    $header
                                    <small>
                                        $text<br><br>
                                    </small>
                                </li>
                            ");
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/includes/footer.php') ?>
</body>
</html>
