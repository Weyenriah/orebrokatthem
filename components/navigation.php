<?php
$navigationLinks = array(
    array(
        'uri' => array(BASE_URL . 'index.php', substr(BASE_URL,0, -1), BASE_URL),
        'name' => 'Hem',
        'class' => 'home',
    ),
    array(
        'uri' => array(BASE_URL . 'adopt.php'),
        'name' => 'Adoptera',
        'class' => 'adopt',
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

function array_any(array $array, callable $fn) {
    foreach ($array as $value) {
        if($fn($value)) {
            return true;
        }
    }
    return false;
}
?>

<!-- General navigation -->
<nav class="navbar">
    <ul class="responsive">
        <span class="divide-menu-elements">
            <a href="index.php" id="logo"> <img src="images/white-logo.png"> </a>
            <button type="button" class="menu-icons" id="collapsing" onclick="collapse(); "> <span> MENY </span> <i class="fas fa-bars"></i> </button>
        </span>
    </ul>
</nav>
<!-- Container that pops up with all the links -->
<nav class="toggle-menu">
    <div id="toning-down" onclick="collapse();"></div>
    <div class="navigation-grid">
        <div class="showing-up-ani" id="showing-up">
            <div class="buttons-and-dividers">
                <button type="button" class="menu-icons" id="close-menu" onclick="collapse();"> <span> STÄNG </span> <i class="fas fa-times"></i> </button>
            </div>
            <ul class="nav-list">
                <?php
                $request_uri = explode('?', $_SERVER['REQUEST_URI'])[0];

                foreach ($navigationLinks as $navigationPage) {
                    $active = array_any($navigationPage['uri'], function ($val) use($request_uri) {
                        return $val == $request_uri;
                    });
                    $activeString = $active ? ' active-nav ' : '';
                ?>
                    <li class="list-item <?php echo($navigationPage['class']); ?>">
                        <a class="<?php echo($activeString); ?>" href="<?php echo($navigationPage['uri'][0]); ?>">
                            <?php echo($navigationPage['name']); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>



<script>
    /* Show and collapse navigation */
    let collapsed = true;

    function collapse() {
        collapsed = !collapsed;
        let collapseElements = document.getElementsByClassName("toggle-menu");

        for (let i = 0; i < collapseElements.length; i++) {
            collapseElements[i].classList.toggle('display');
        }

        webpageHidden();
    }

    // Add Overflow: Hidden to body when navigation is covering page
    let body = document.getElementById("body");

    window.matchMedia("(max-width: 517px)").addListener(webpageHidden);

    function webpageHidden() {
        if(window.matchMedia("(max-width: 517px)").matches && !collapsed ) {
            body.classList.add("bodyOverflow");
        } else {
            body.classList.remove("bodyOverflow");
        }
    }
</script>