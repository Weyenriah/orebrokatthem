<?php
require_once dirname(__FILE__).'/../../../functions/load.php';

$employees = $database->getEmployees(true);

?>

<section class="page" id="employees">
    <h2 class="page-title">Hantera Anställda</h2>
    <button class="add-button employee-add-button" type="button" onclick="showPopupAddEmployee()"> Lägg till </button>
    <!-- Removed/Added/Changed Text -->
    <?php if (isset($removed)) { ?>
        <div class="removed">
            <p>
                <?php echo(($removed)? "Anställd borttagen" : "Kunde inte ta bort den anställda"); ?>
            </p>
        </div>
    <?php }

    if(isset($addEmployee)) { ?>
        <div class="added employee-confirm">
            <p>
                <?php if($addEmployee = true) {
                    echo("Anställd tillagd!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($addEmployee = false) {
                    echo("Kunde inte lägga till anställd");
                } ?>
            </p>
        </div>
    <?php }

    if(isset($changeEmployee)) { ?>
        <div class="added employee-confirm">
            <p>
                <?php if($changeEmployee = true) {
                    echo("Anställd ändrad!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($changeEmployee = false) {
                    echo("Anställd kunde inte ändras");
                } ?>
            </p>
        </div>
    <?php } ?>
    <!-- Employee-flow -->
    <div class="page-display">
        <?php
        foreach ($employees as $employee) {
            $title = ($employee['title'] === NULL) ? '-' : ($employee['title']);
        ?>
            <article class="employee" id="employees-<?php echo($employee['id']) ?>">
                <?php if ($employee['image'] !== '' && $employee['image'] !== NULL) { ?>
                    <div class="employee-img">
                        <img class="employee-img" src="<?php echo(BASE_URL . UPLOADS_FOLDER . 'images/' . $employee['image']); ?>" alt="Bild på en från personalen">
                    </div>
                <?php } ?>
                <div class="employee-text">
                    <div class="two-buttons-fix">
                        <button class="two-buttons" type="button" onclick="showPopupChangeEmployee(<?php echo($employee['id']) ?>)">
                            <i class="fas fa-pencil-alt"></i> Ändra Anställd
                        </button>
                        <form method="post">
                            <button class="two-buttons" type="submit" formmethod="post" name="removeEmployee" value="<?php echo($employee['id']); ?>">
                                <i class="fas fa-times"></i> Ta bort Anställd
                            </button>
                        </form>
                    </div>
                    <div class="employee-information">
                        <div class="employee-title">
                            <h3 class="human-name"><?php echo($employee['name']); ?></h3>
                            <div class="login-accept">
                                <?php if($employee['password'] !== null) {
                                    echo('<i class="fas fa-key"></i>');
                                } ?>
                                <span class="able-to-login" hidden><?php echo($employee['password'] !== null); ?></span>
                            </div>
                        </div>
                        <div class="employee-admininfo">
                            <small class="human-title"><?php echo($title) ?></small>
                            <a class="email" href="mailto:<?php echo($employee['email']) ?>"><i class="fas fa-envelope"></i><?php echo($employee['email']) ?></a>
                        </div>
                    </div>
                    <div>
                        <p class="showcase">
                            <?php if($employee['hidden'] == 0) {
                                echo('Visas på hemsidan');
                            } ?>
                            <span class="hidden-employee" hidden><?php echo($employee['hidden']) ?></span>
                        </p>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>

<script>
    /* === SHOW NEW CAT-POPUP === */
    function showPopupAddEmployee() {
        let popup = document.getElementById('popup-add-employee');

        popup.style.display = 'block';
    }

    function showPopupChangeEmployee(id) {
        let popup = document.getElementById('popup-change-employee');

        /* Selects the right newspost */
        let employee = document.getElementById("employees-" + id);

        /* Matches the information from popup with employee */
        popup.getElementsByClassName('human-name')[0].value = employee.getElementsByClassName("human-name")[0].textContent;
        popup.getElementsByClassName('human-title')[0].value = employee.getElementsByClassName("human-title")[0].textContent;
        popup.getElementsByClassName('email')[0].value = employee.getElementsByClassName("email")[0].textContent;
        popup.getElementsByClassName('show-employ')[0].checked = employee.getElementsByClassName("hidden-employee")[0].textContent === '0';
        popup.getElementsByClassName('log-in')[0].checked = employee.getElementsByClassName("able-to-login")[0].textContent === '1';

        popup.getElementsByClassName('id-field')[0].value = id;

        popup.style.display = 'block';

        /* Scrolls up to top when button is clicked */
        window.scroll(0, 0);

        showChangePassword(false);
    }
</script>