<section class="textfield page" id="home">
    <div class="textfield-header">
        <h2> Ändra på sida: Hem </h2>
        <button type="button" id="code-help" onclick="commando()"> Kodhjälp </button>
    </div>
    <div id="commando">
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
    function commando() {
        let commando = document.getElementById('commando');
        let button = document.getElementById('code-help');

        if(commando.classList.contains('display')) {
            commando.classList.remove('display');
            button.classList.remove('active-button');
        } else {
            commando.classList.add('display');
            button.classList.add('active-button');
        }
    }
</script>