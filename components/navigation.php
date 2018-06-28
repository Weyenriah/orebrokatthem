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
    <ul class="nav-list responsive">
        <span class="divide-menu-elements">
            <span id="logo"> <img src="images/logo.png"> </span>
            <button type="button" id="collapsing" onclick="collapse(); addSize()"> <i class="fas fa-bars"></i> </button>
        </span>
        <?php
        foreach ($navigationLinks as $navigationPage) {
            $active = $_SERVER['REQUEST_URI'] == $navigationPage['uri'];
            $activeString = $active ? ' active ' : '';
        ?>
        <li class="list-item">
            <a class="<?php echo($activeString); ?>" href="<?php echo($navigationPage['uri']); ?>">
                <?php echo($navigationPage['name']); ?>
            </a>
        </li>
        <?php } ?>
    </ul>

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
        let collapseElements = document.getElementsByClassName("list-item");

        for (let i = 0; i < collapseElements.length; i++) {
            collapseElements[i].classList.toggle('display');
        }
    }

</script>