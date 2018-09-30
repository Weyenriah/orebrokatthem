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
        <p> <?php echo($database->getContent('support-header')); ?> </p>
    </header>

    <section class="blue-background general-grid" id="membership">
        <h2> Bli medlem </h2>
        <p class="blue-paragraph"> <?php echo($database->getContent('support-member')); ?> </p>
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
                <p> <?php echo($database->getContent('support-insurance-name')); ?> <br/>
                    <i class="fas fa-envelope"></i> <a href="mailto:<?php echo($database->getContent('support-insurance-email')); ?>">
                        <?php echo($database->getContent('support-insurance-email')); ?>
                    </a>
                    <br/>
                    <i class="fas fa-phone"></i> <?php echo($database->getContent('support-insurance-tele')); ?> <br/>
                    <?php echo($database->getContent('support-insurance-availab')); ?> </p>
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
                        <?php echo($database->getContent('support-catneed')); ?>
                    </ul>
                </div>
                <div class="human-need">
                    <h5 class="second-row-heading"> Personalen önskar sig </h5>
                    <ul>
                        <?php echo($database->getContent('support-humanneed')); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/components/footer.php') ?>

</body>
</html>
