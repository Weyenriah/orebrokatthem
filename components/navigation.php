<?php

$navigationLinks = array(
    array(
        'uri' => BASE_URL . 'index.php',
        'name' => 'Hem',
    ),
    array(
        'uri' => BASE_URL . 'adopt.php',
        'name' => 'Adoptera',
    ),
    array(
        'uri' => BASE_URL . 'jour.php',
        'name' => 'Bli Jourhem',
    ),
    array(
        'uri' => BASE_URL . 'about.php',
        'name' => 'Om Oss',
    ),
    array(
        'uri' => BASE_URL . 'support.php',
        'name' => 'Stöd Oss',
    ),
);
?>

<!-- General navigation -->
<nav class="navbar">
    <ul class="nav-list">
        <li id="logo"> <img src="images/logo.png"> </li>
        <?php
        foreach ($navigationLinks as $navigationPage) {
            $active = $_SERVER['REQUEST_URI'] == $navigationPage['uri'];
            $activeString = $active ? ' active ' : '';
        ?>
        <li>
            <a class="<?php echo($activeString); ?>" href="<?php echo($navigationPage['uri']); ?>">
                <?php echo($navigationPage['name']); ?>
            </a>
        </li>
        <?php } ?>
    </ul>
</nav>