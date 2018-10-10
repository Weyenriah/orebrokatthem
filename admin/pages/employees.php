<?php
require_once '../components/resources.php';

$employees = $database->getEmployees();

?>

<section class="page" id="employees">
    <h2>Hantera Anställda</h2>
    <button type="button" onclick="showPopupEmployee()"> Lägg till </button>
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
                        <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra anställd </a>
                        <a href="#"> <i class="fas fa-times"></i> Ta bort anställd </a>
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