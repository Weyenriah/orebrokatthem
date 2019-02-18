<?php
// All the changeable fields
$fields = [
    [
        'element' => 'ourcats-header',
        'text' => 'Ändra Header',
        'rows' => 10
    ]
];

// Change fields
foreach ($fields as $field) {
    if(isset($_POST[$field['element']])) {
        if(is_string($_POST[$field['element']])) {
            $data = htmlentities(trim($_POST[$field['element']]));

            $textConfirmed = $database->changeTextfield($field['element'], $data);

            $goToPage = 'our-cats';
        }
    }
}
?>

<section class="textfield page" id="our-cats">
    <div class="textfield-header">
        <h2> Ändra på sida: Våra Katter </h2>
    </div>
    <?php
    // Feedback for user when text change
    if(isset($textConfirmed)) { ?>
        <div class="added">
            <p>
                <?php if($textConfirmed = true) {
                    echo("Text ändrad!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($textConfirmed = false) {
                    echo("Text kunde inte ändras");
                } ?>
            </p>
        </div>
    <?php } ?>
    <div class="forms">
        <!-- PHP puts in everything in the fields -->
        <?php foreach ($fields as $field) {
            echo "<form class='form' method='post'>
            <div class='text-form'>
                <label for='{$field['element']}'>{$field['text']}</label>
                <textarea 
                    id='{$field['element']}' 
                    name='{$field['element']}' 
                    rows='{$field['rows']}' 
                    cols='50'>{$database->getContent($field['element'])}</textarea>
                <button type='submit' value='Ändra'> Ändra </button>
            </div>
        </form>";
        } ?>
    </div>
</section>