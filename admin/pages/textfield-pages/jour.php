<?php
    $jourListitems = $database->getJourList();
?>
<section class="textfield page" id="jour">
    <div class="textfield-header">
        <h2> Ändra på sida: Bli Jourhem </h2>
        <button type="button" id="code-help-jour" onclick="commandoCats()"> Kodhjälp </button>
    </div>
    <div id="commando-jour">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('jour-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>

    <div class="not-forms">
        <div class="list-handler">
            <h3> Ändra listan i "Tips" </h3>
            <ol>
                <?php foreach($jourListitems as $jourListitem) { ?>
                    <li>
                        <div class="change-list">
                            <a href="#"> <i class="fas fa-pencil-alt"></i> </a>
                            <a href="#"> <i class="fas fa-times"></i> </a>
                        </div>
                        <h5 class="adjust-main-left"> <?php echo($jourListitem['title']) ?> </h5>
                        <p class="adjust-main-left"> <?php echo($jourListitem['content']) ?> </p>
                    </li>
                <?php } ?>
            </ol>
            <button type="button" class="add-to-list"> Lägg till i listan </button>
        </div>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoCats() {
        let commando = document.getElementById('commando-jour');
        let button = document.getElementsByClassName('code-help-jour');

        if (commando.classList.contains('display-jour')) {
            commando.classList.remove('display-jour');
            button.classList.remove('active-button-jour');
        } else {
            commando.classList.add('display-jour');
            button.classList.add('active-button-jour');
        }
    }
</script>