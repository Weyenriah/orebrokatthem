<?php
$footerLinks = array(
    array(
        'uri' => BASE_URL . 'index.php',
        'name' => 'Hem',
        'class' => 'home',
    ),
    array(
        'uri' => BASE_URL . 'adopt.php',
        'name' => 'Adoptera',
        'class' => 'adopt',
    ),
    array(
        'uri' => BASE_URL . 'jour.php',
        'name' => 'Bli Jourhem',
        'class' => 'jour',
    ),
    array(
        'uri' => BASE_URL . 'about.php',
        'name' => 'Om Oss',
        'class' => 'about',
    ),
    array(
        'uri' => BASE_URL . 'support.php',
        'name' => 'Stöd Oss',
        'class' => 'support',
    ),
);
?>

<!-- The outside companies that ÖKH linked on their first page -->
<section class="outsiders">
    <a href="http://www.svekatt.se/">
        <img class="svekatt" src="images/svekatt-etisk.png">
    </a>
    <a href="http://www.vilse.nu/">
        <img class="vilse" src="images/vilse.png">
    </a>
    <a href="https://hundar.skk.se/agarreg/katt_sok.aspx">
        <img class="skk"  src="images/skk.gif">
    </a>
    <a href="http://www.sverak.se/id-register/sok-din-katt-har/">
        <img class="sverak" src="images/sverak.png">
    </a>
</section>

<!-- Footer for the whole page -->
<footer class="first-footer">
    <section class="contact">
        <h2>Kontakt</h2>
        <p class="contact-p">Örebro Katthem <br/>
            Sockengatan 5 <br/>
            702 16 Örebro <br/>
        </p>
        <a class="footer-link contact-foot-link" href="mailto:info@orebrokatthem.com">
            <i class="fas fa-envelope"></i> info@orebrokatthem.com
        </a>
        <p class="contact-p">
            <i class="fas fa-phone"></i> 019-26 00 86
        </p>
    </section>
    <section class="social-media">
        <h2>Hitta oss på sociala medier!</h2>
        <a href="#"> <i class="fab fa-facebook-square"></i> </a>
        <a href="#"> <i class="fab fa-instagram"></i> </a>
    </section>
    <section class="explore">
        <h2>Utforska</h2>
        <?php
        foreach ($footerLinks as $footerPage) {
            $active = $_SERVER['REQUEST_URI'] == $footerPage['uri'];
            $activeString = $active ? ' active-foot ' : '';
            ?>
            <li class="footer-item <?php echo($footerPage['class']); ?>">
                <a class="footer-link<?php echo($activeString); ?>" href="<?php echo($footerPage['uri']); ?>">
                    <?php echo($footerPage['name']); ?>
                </a>
            </li>
        <?php } ?>
    </section>
</footer>
<footer class="second-footer">
    <p> Copyright © av Örebro Katthem 2018 |  </p>
</footer>