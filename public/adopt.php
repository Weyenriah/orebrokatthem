<?php
    require_once dirname(__FILE__).'/../functions/load.php';

    function parse_includes_list($content) {
        $content = str_replace(array("\r", "\n"), "\n", $content);
        return '<li>'.implode("</li><li>", explode('\n \n', $content)).'</li>';
    }
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/includes/head.php') ?>

<body id="body">
    <!-- Calls for main navigation -->
    <?php include(APP_FOLDER . '/includes/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1> Adoptera </h1>
        <p> <?php echo(nl2br($database->getContent('adopt-header'))); ?> </p>
    </header>

    <section class="general-grid text-box blue-background" id="how">
        <h2> Hur adopterar jag? </h2>
        <div class="paragraph-position">
            <p> <?php echo(nl2br($database->getContent('adopt-how'))); ?> </p>
        </div>
    </section>

    <!-- Advice section -->
    <section class="general-grid text-box" id="advice">
        <h2> Tips </h2>
        <div class="paragraph-position">
            <div class="decor-img">
                <img src="<?php echo(BASE_URL) ?>assets/images/ashild.jpg" alt="">
            </div>
            <ol>
                <?php
                $adoptTips = nl2br($database->getContent('adopt-tips'));
                $adoptItems = explode("*", $adoptTips);

                for ($i = 1; $i < count($adoptItems); $i++) {
                    $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $adoptItems[$i], 2);
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

    <!-- Prices section -->
    <section class="general-grid text-box blue-background" id="prices">
        <h2> Adoptionspriser </h2>
        <div class="paragraph-position price-info">
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
            <ul>
                <?php
                $adoptIncludes = nl2br($database->getContent('adopt-includes'));
                $adoptInclude = explode("*", $adoptIncludes);

                for ($i = 1; $i < count($adoptInclude); $i++) {
                    $pieces = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $adoptInclude[$i], 2);
                    $text = count($pieces) > 0 ? $pieces[0] : '';
                    echo("
                        <li>
                            $text
                        </li>
                    ");
                } ?>
            </ul>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/includes/footer.php') ?>
</body>
</html>