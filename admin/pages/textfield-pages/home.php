<section class="textfield page" id="home">
    <div class="textfield-header">
        <h2> Ändra på sida: Hem </h2>
        <button type="button" id="code-help-home" onclick="commandoHome()"> Kodhjälp </button>
    </div>
    <div id="commando-home">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('home-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra text i Minneslunden </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('home-remember')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoHome() {
        let commando = document.getElementById('commando-home');
        let button = document.getElementsByClassName('code-help-home');

        if (commando.classList.contains('display-home')) {
            commando.classList.remove('display-home');
            button.classList.remove('active-button-home');
        } else {
            commando.classList.add('display-home');
            button.classList.add('active-button-home');
        }
    }
</script>