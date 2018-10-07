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
        <p> <?php echo($database->getContent('adopt-header')); ?> </p>
    </header>

    <section class="blue-background general-grid" id="how">
        <h2> Hur adopterar jag? </h2>
        <div class="blue-paragraph">
            <p> <?php echo($database->getContent('adopt-how')); ?> </p>
        </div>
    </section>

    <!-- Advice section -->
    <section class="white-background general-grid" id="advice">
        <h2> Tips </h2>
        <div class="white-paragraph">
            <div class="tips-img">
                <img src="uploads/images/ashild.jpg">
            </div>
            <ol>
                <?php echo($database->getContent('adopt-tips')); ?>
            </ol>
        </div>
    </section>

    <!-- Prices section -->
    <section class="blue-background general-grid" id="prices">
        <h2> Adoptionspriser </h2>
        <div class="blue-paragraph price-info">
            <div class="prices">
                <div class="price">
                    <h5 class="second-row-heading"> Katter upp till 12 år </h5>
                    <p> <?php echo($database->getContent('adopt-up-to')); ?> </p>
                </div>
                <div class="price">
                    <h5 class="second-row-heading"> Två katter vid samtidig adoption </h5>
                    <p> <?php echo($database->getContent('adopt-two-cats')); ?> </p>
                </div>
                <div class="price">
                    <h5 class="second-row-heading"> Katter 12 år eller äldre </h5>
                    <p> <?php echo($database->getContent('adopt-older')); ?> </p>
                </div>
            </div>
            <br/>
            <h5 class="second-row-heading"> Vad som ingår </h5>
            <ul> <?php echo($database->getContent('adopt-includes')); ?> </ul>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/components/footer.php') ?>
</body>
</html>