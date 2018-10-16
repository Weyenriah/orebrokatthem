<?php
require_once '../components/resources.php';

// Remove employee
if (isset($_POST['removeEmployee'])) {
    $removed = $database->deleteEmployee($_POST['removeEmployee']);
    $goToPage = 'news';
}

$employees = $database->getEmployees();

?>

<section class="page" id="employees">
    <h2>Hantera Anställda</h2>
    <button class="add-button-employee" type="button" onclick="showPopupEmployee()"> Lägg till </button>
    <?php if (isset($removed)) {
        echo(($removed)? "Anställd borttagen": "Kunde inte ta bort den anställda");
    } ?>
    <div class="employees">
        <?php
        foreach ($employees as $employee) {
        ?>
            <article class="employee">
                <?php if ($employee['image'] !== '') { ?>
                    <div class="employee-img">
                        <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $employee['image']); ?>">
                    </div>
                <?php } ?>
                <div class="employee-text">
                    <div class="change-employee">
                        <button type="button"> <i class="fas fa-pencil-alt"></i> Ändra anställd </button>
                        <form method="post">
                            <button type="submit" formmethod="post" name="removeEmployee" value="<?php echo($employee['id']); ?>"> <i class="fas fa-times"></i> Ta bort nyhet </button>
                        </form>
                    </div>
                    <div class="employee-information">
                        <h3> <?php echo($employee['name']) ?> </h3>
                        <small> <?php echo($employee['title']) ?> </small>
                        <p> <i class="fas fa-phone"></i> <?php echo($employee['telephone']) ?> </p>
                        <a href="mailto:<?php echo($employee['email']) ?>">
                            <i class="fas fa-envelope"></i> <?php echo($employee['email']) ?>
                        </a>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>

<script>
    /* === SHOW NEW CAT-POPUP === */
    function showPopupEmployee() {
        let popup = document.getElementById('popup-employee');

        popup.style.display = 'block';
    }
</script>