<?php
// Page selector
$footerLinks = array(
    array(
        'uri' => array(BASE_URL . 'index.php', substr(BASE_URL,0, -1), BASE_URL),
        'name' => 'Hem',
        'class' => 'home',
    ),
    array(
        'uri' => array(BASE_URL . 'adopt.php'),
        'name' => 'Adoptera',
        'class' => 'adopt-footer',
    ),
    array(
        'uri' => array(BASE_URL . 'our-cats.php'),
        'name' => 'Våra katter',
        'class' => 'cats',
    ),
    array(
        'uri' => array(BASE_URL . 'jour.php'),
        'name' => 'Bli Jourhem',
        'class' => 'jour',
    ),
    array(
        'uri' => array(BASE_URL . 'about.php'),
        'name' => 'Om Oss',
        'class' => 'about',
    ),
    array(
        'uri' => array(BASE_URL . 'support.php'),
        'name' => 'Stöd Oss',
        'class' => 'support',
    ),
);

function any_array(array $array, callable $fn) {
    foreach ($array as $value) {
        if($fn($value)) {
            return true;
        }
    }
    return false;
};

?>

<!-- The outside companies that ÖKH linked on their first page -->
<div class="outsiders">
    <a href="http://www.svekatt.se/" target="_blank" rel="noopener">
        <img class="svekatt" src="<?php echo(BASE_URL) ?>assets/images/svekatt-etisk.png" alt="Bild på Svekatts Logga som går till deras hemsida">
    </a>
    <a href="http://www.vilse.nu/" target="_blank" rel="noopener">
        <img class="vilse" src="<?php echo(BASE_URL) ?>assets/images/vilse.png" alt="Bild på Vilse.nus Logga som går till deras hemsida">
    </a>
    <a href="http://www.sverak.se/id-register/sok-din-katt-har/" target="_blank" rel="noopener">
        <img class="sverak" src="<?php echo(BASE_URL) ?>assets/images/sverak.png" alt="Bild på SVERAKs Logga som går till deras hemsida">
    </a>
    <a href="https://hundar.skk.se/agarreg/katt_sok.aspx" target="_blank" rel="noopener">
        <img class="skk" src="<?php echo(BASE_URL) ?>assets/images/skk.gif" alt="Bild på SKKs Logga som går till deras hemsida">
    </a>
    <a href="https://www.if.se/privat/forsakringar/djurforsakring/kattforsakring" target="_blank" rel="noopener">
        <img class="sverak" src="<?php echo(BASE_URL) ?>assets/images/if.png" alt="Bild på IFs Logga som går till deras hemsida">
    </a>
</div>

<!-- Footer for the whole page -->
<footer class="first-footer">
    <section class="contact">
        <h2>Kontakt</h2>
        <p class="contact-p"> <?php echo(nl2br($database->getContent('footer-visit'))); ?></p>
        <p class="contact-p">
            <i class="fas fa-envelope"></i>
            <?php echo(displayEmail($database->getContent('footer-visit-email'))); ?>
        </p>
        <p class="contact-p">
            <i class="fas fa-phone"></i> <?php echo($database->getContent('footer-visit-tele')); ?>
        </p>
    </section>
    <section class="social-media">
        <h2>Hitta oss på sociala medier!</h2>
        <a href="<?php echo($database->getContent('footer-fb-link')); ?>" target="_blank" rel="noopener">
            <i class="fab fa-facebook-square" title="Länk till Facebooksida"></i>
        </a>
        <a href="<?php echo($database->getContent('footer-ig-link')); ?>" target="_blank" rel="noopener">
            <i class="fab fa-instagram" title="Länk till Instagramsida"></i>
        </a>
    </section>
    <section class="explore">
        <h2>Utforska</h2>
        <ul>
            <?php
            $request_uri = explode('?', $_SERVER['REQUEST_URI'])[0];

            foreach ($footerLinks as $footerPage) {
                $active = any_array($footerPage['uri'], function ($val) use($request_uri) {
                    return $val == $request_uri;
                });
                $activeString = $active ? ' active-foot ' : '';
                ?>
                <li class="footer-item <?php echo($footerPage['class']); ?>">
                    <a class="footer-link<?php echo($activeString); ?>" href="<?php echo($footerPage['uri'][0]); ?>">
                        <?php echo($footerPage['name']); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </section>
</footer>
<footer class="second-footer">
    <p> Copyright © av Örebro Katthem 2018 | <a class="link-calibri" href="<?php echo(BASE_URL) ?>humans.txt">Utvecklad av Felicia Wallin</a>  </p>
</footer>