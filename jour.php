<?php require_once 'components/resources.php';

if(isset($_POST['jour-contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    // TODO send mail
}

$jourListitems = $database->getJourList();
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
                <?php foreach($jourListitems as $jourListitem) { ?>
                    <li>
                        <h5 class="adjust-main-left second-row-heading"> <?php echo($jourListitem['title']) ?> </h5>
                        <p class="adjust-main-left"> <?php echo($jourListitem['content']) ?> </p>
                    </li>
                <?php } ?>
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