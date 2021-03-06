<?php
    require_once dirname(__FILE__).'/../functions/load.php';

    if(isset($_POST['about-contact'])) {
        $name = $_POST['firstname'];
        $email = $_POST['email'];
        $telephone = $_POST['tele'];
        $city = $_POST['city'];
        $headers = ['From' => SEND_EMAIL_FROM, 'Reply-To' => $email, 'Content-Type' => 'text/plain;charset=utf-8', 'Content-Transfer-Encoding' => '8bit', 'MIME-Version' => '1.0'];

        $mailSent = mail(SEND_EMAIL_TO, "OKH-Kontaktperson: $name", str_replace("\n.", "\n..", $telephone. "\r\n" . $city), $headers);
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
        <h1> Bli kontaktperson </h1>
        <p> <?php echo(nl2br($database->getContent('contactperson-header'))); ?> </p>
    </header>

    <section class="general-grid text-box blue-background">
        <h2> Vad gör en kontaktperson? </h2>
        <div class="contactperson-paragraph paragraph-position">
            <?php
            $doing =  preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', nl2br($database->getContent('contactperson-doing')));
            $openTag = false;
            foreach ($doing as $d) {
                $d = trim($d);
                if (!empty($d)) {
                    $isListItem = substr($d, 0, 1) === '*';
                    if ($isListItem) {
                        $d = substr($d,2);
                        if ($openTag !== false && $openTag != '</ul>') {
                            echo $openTag;
                            $openTag = false;
                        }
                        if ($openTag === false) {
                            echo '<ul>';
                            $openTag = '</ul>';
                        }
                        echo "<li>$d</li>";
                    } else {
                        $firstLine = false;
                        if ($openTag !== false && $openTag != '</p>') {
                            echo $openTag;
                            $openTag = false;
                        }
                        if ($openTag === false) {
                            echo '<p>';
                            $openTag = '</p>';
                            $firstLine = true;
                        }
                        if (!$firstLine) {
                            echo '<br/><br/>';
                        }
                        echo $d;
                    }
                }
            }
            echo $openTag;
            ?>
        </div>
    </section>

    <section class="general-grid text-box">
        <h2> Vad behöver en kontaktperson klara? </h2>
        <div class="paragraph-position">
            <div class="decor-img">
                <img src="<?php echo(BASE_URL) ?>assets/images/what-cat.jpg" alt="">
            </div>
             <ul>
                <?php
                $contactWhat = nl2br($database->getContent('contactperson-what'));
                $contactWhatItems = explode("*", $contactWhat);

                for ($i = 1; $i < count($contactWhatItems); $i++) {
                    $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $contactWhatItems[$i], 2);
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

    <section class="general-grid text-box blue-background">
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

                <label for="tele" class="second-row-heading">
                    Telefonnummer
                </label>
                <input type="text" id="tele" name="tele" placeholder="Ditt telefonnummer..."/>

                <label for="city" class="second-row-heading">
                    Ort
                </label>
                <input type="text" id="city" name="city" placeholder="Var du bor..."/>

                <input type="submit" name="about-contact" value="Skicka" class="button submit-button">
            </form>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/includes/footer.php') ?>
</body>
</html>