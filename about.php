<?php require_once 'components/resources.php';

$employees = $database->getEmployees();
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include('components/head.php') ?>

<body>
    <!-- Calls for main navigation -->
    <?php include('components/navigation.php') ?>

    <!-- Specific navigation for this page -->
    <nav class="second-navbar">
        <ul class="second-nav-list">
            <li><a class="active" href="#workers"> Vi som jobbar här </a></li>
            <li><a href="#contact"> Kontakta oss </a></li>
            <li><a href="#volonteer"> Bli volontär </a></li>
        </ul>
    </nav>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1> Om Oss </h1>
        <p> Örebro Katthem drivs helt och hållet ideellt med privata medel och alla föreningsaktiva har mycket att göra och har höga telefonräkningar. Alla utom Christina använder helst mailkontakt i första hand. Vi ber er därför att sköta så mycket som möjligt av ärendet med mail i den mån ni har möjlighet till det. Välkommen att ta kontakt med oss!
        </p>
    </header>

    <!-- Section for employees -->
    <section class="red-background general-grid" id="workers">
        <h2> Vi som jobbar här! </h2>
        <div class="employee-cards">
            <!-- Employee cards -->
            <?php foreach ($employees as $employee) { ?>
                <article class="employee-card">
                    <?php if ($employee['image'] !== '') { ?>
                        <div class="employee-pic">
                            <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $employee['image']); ?>">
                        </div>
                    <?php } ?>
                    <div class="employee-info">
                        <h3> <?php echo($employee['name']); ?> </h3>
                        <small> <?php echo($employee['title']); ?> </small>
                        <p class="tele"><i class="fas fa-phone"></i> <?php echo($employee['telephone']); ?> </p>
                        <p><i class="fas fa-envelope"></i> <?php echo($employee['email']); ?> </p>
                    </div>
                </article>
            <?php } ?>
        </div>
    </section>

    <!-- Contact section -->
    <section class="white-background double-sided-grid" id="contact">
        <h2>Kontakta oss</h2>
        <form>
            <label for="firstname" class="second-row-heading">
                Ditt namn
            </label>
            <input type="text" id="firstname" name="firstname" placeholder="Ditt namn här..."/>

            <label for="firstname" class="second-row-heading">
                Din emailadress
            </label>
            <input type="text" id="firstname" name="firstname" placeholder="Ditt namn här..."/>

            <label for="subject" class="second-row-heading">
                Meddelande
            </label>
            <textarea id="subject" name="subject" placeholder="Skriv ditt meddelande här..."></textarea>

            <input type="submit" value="Skicka" class="submit-button">
        </form>

        <!-- Information where to contact otherwise -->
        <div class="contact-info">
            <section>
                <h5 class="second-row-heading"> Besök oss </h5>
                <p> Örebro Katthem <br/>
                    Sockengatan 5 <br/>
                    702 16 <br/>
                    <i class="fas fa-phone"></i> 019-26 00 86
                </p>
            </section>
            <section>
                <h5 class="second-row-heading"> Anmälning av hemlös katt </h5>
                <p> <i class="fas fa-phone"></i> 0580-125 69 </p>
                <small> Christina "Kicki" Åbladh </small>
            </section>
            <section>
                <h5 class="second-row-heading"> Adoptera katt </h5>
                <p> Kontakta respektive kontaktperson i kattens annons. </p>
            </section>
        </div>
    </section>

    <!-- Section for how to apply to be a volonteer -->
    <section class="red-background general-grid" id="volonteer">
        <h2> Bli volontär </h2>
        <div class="red-paragraph">
            <div class="volonteer-img">
                <img src="images/ashild.jpg">
            </div>
            <p> Vill du ha någon sysselsättning på din fritid så har Örebro Katthem drygt 30 katter som väldigt gärna vill ha sällskap och omvårdnad! Vi har ont om volontärer och behöver ha mer arbetskraft. En perfekt sysselsättning för dig som älskar katter och lärorikt för dig som vill lära dig mer om beteende, hälsa, skötsel och skygga katter.
            </p>
            <h5 class="second-row-heading"> Krav </h5>
            <ul>
                <li> Du är myndig, ska helst ha fyllt 20 år.
                </li>
                <li> Du är ansvarstagande. Det är oerhört viktigt, eftersom du ska ta hand om levande djur.
                </li>
                <li> Du kan ta minst ett arbetspass var 14:e dag. Helst fasta pass (samma pass varje gång).
                </li>
                <li> Du är inte rädd att slita lite - det är mycket städning.
                </li>
                <li> Du har kattvana, och är lugn och sansad. Det är viktigt, eftersom vi ständigt har många olika katter, varav många är skygga/blyga som behöver ha lugna och trygga människor omkring sig.
                </li>
            </ul>
            <p> <br/>
                Varje dag har vi morgonpass och kvällspass på katthemmet och du bestämmer själv när och hur ofta du kan hjälpa till.
                Om du inte varit på katthemmet tidigare är det jättebra att börja med att komma dit någon dag och se hur det ser ut och prata med personalen där. Antingen att du hoppar in på öppet hus (söndagar eller onsdagar) eller så bestämmer du med någon som jobbar att du kommer dit någon annan tid när det kanske är lite lugnare. </p>

            <!-- Contact information -->
            <div class="contact-become">
                <div>
                    <h5 class="second-row-heading"> Ring till katthemmet </h5>
                    <p> 019-26 00 86 </p>
                </div>
                <div>
                    <h5 class="second-row-heading"> Mejla personalansvarige </h5>
                    <a href="#"> intro@orebrokatthem.com </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include('components/footer.php') ?>
</body>
</html>