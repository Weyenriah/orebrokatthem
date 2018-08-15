<?php
$navigationLinks = array(
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

<!-- General navigation -->
<nav class="navbar">
    <ul class="responsive">
        <span class="divide-menu-elements">
            <a href="index.php" id="logo"> <img src="images/white-logo.png"> </a>
            <button type="button" class="menu-icons" id="collapsing" onclick="collapse(); addSize()"> <span> MENY </span> <i class="fas fa-bars"></i> </button>
            <hr/>
        </span>
    </ul>
</nav>
<!-- Container that pops up with all the links -->
<nav class="toggle-menu">
    <div id="showing-up">
        <button type="button" class="menu-icons" id="close-menu" onclick="collapse();"> <span> STÄNG </span> <i class="fas fa-times"></i> </button>
        <hr/>
        <ul class="nav-list">
            <?php
            foreach ($navigationLinks as $navigationPage) {
                $active = $_SERVER['REQUEST_URI'] == $navigationPage['uri'];
                $activeString = $active ? ' active-nav ' : '';
                ?>
                <li class="list-item <?php echo($navigationPage['class']); ?>">
                    <a class="<?php echo($activeString); ?>" href="<?php echo($navigationPage['uri']); ?>">
                        <?php echo($navigationPage['name']); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="toning-down" onclick="collapse()"></div>
</nav>



<script>
    function addSize() {
        let needsSize = document.getElementsByClassName('navbar')[0];

        console.log(needsSize);

        if(needsSize.classList.contains('add-size')) {
            needsSize.classList.remove('add-size');
        } else {
            needsSize.classList.add('add-size');
        }
    }

    function collapse() {
        let collapseElements = document.getElementsByClassName("toggle-menu");

        for (let i = 0; i < collapseElements.length; i++) {
            collapseElements[i].classList.toggle('display');
        }
    }
</script>