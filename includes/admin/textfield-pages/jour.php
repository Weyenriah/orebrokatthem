<?php
// All the changeable fields
$fields = [
    [
        'element' => 'jour-header',
        'text' => 'Ändra Header',
        'rows' => 10
    ],
    [
        'element' => 'jour-how',
        'text' => 'Ändra "Hur är det att vara jourhem?"',
        'rows' => 10
    ],
    [
        'element' => 'jour-tips',
        'text' => 'Ändra "Tips för dig med skygg jourhemskatt"',
        'rows' => 10
    ],
    [
        'text' => 'Ändra kontaktinformation för "Anmälning"',
        'fields' => [
            [
                'element' => 'jour-contact-name',
                'text' => 'Namn',
                'rows' => 1
            ],
            [
                'element' => 'jour-contact-tele',
                'text' => 'Telefonnummer',
                'rows' => 1
            ]
        ]
    ]
];

// Change fields
foreach ($fields as $field) {
    if (isset($field['fields'])){
        foreach ($field['fields'] as $f) {
            if(isset($_POST[$f['element']])) {
                if(is_string($_POST[$f['element']])) {
                    $data = htmlentities(trim($_POST[$f['element']]));

                    $database->changeTextfield($f['element'], $data);

                    $goToPage = 'jour';
                }
            }
        }
    } else {
        if(isset($_POST[$field['element']])) {
            if(is_string($_POST[$field['element']])) {
                $data = htmlentities(trim($_POST[$field['element']]));

                $database->changeTextfield($field['element'], $data);

                $goToPage = 'jour';
            }
        }
    }
}
?>

<section class="textfield page" id="jour">
    <div class="textfield-header">
        <h2> Ändra på sida: Bli Jourhem </h2>
    </div>
    <div class="forms">
        <?php
        // First check if fields exist, then do multiple fields, if there's none: One field.
        foreach ($fields as $field) {
            if (isset($field['fields'])) {
                echo "
                    <form class='form' method='post'>
                        <div class='text-form multiple'>
                            <h3>{$field['text']}</h3>
                ";
                foreach ($field['fields'] as $f) {
                    echo "
                        <label for='{$f['element']}'>{$f['text']}</label>
                        <textarea 
                            id='{$f['element']}' 
                            name='{$f['element']}' 
                            rows='{$f['rows']}' 
                            cols='50'>{$database->getContent($f['element'])}</textarea>
                    ";
                }
                echo "
                        <button type='submit' value='Ändra'> Ändra </button>
                    </div>
                </form>
                ";
            } else{
                echo "
                    <form class='form' method='post'>
                        <div class='text-form'>
                            <label for='{$field['element']}'>{$field['text']}</label>
                            <textarea 
                                id='{$field['element']}' 
                                name='{$field['element']}' 
                                rows='{$field['rows']}' 
                                cols='50'>{$database->getContent($field['element'])}</textarea>
                            <button type='submit' value='Ändra'> Ändra </button>
                        </div>
                    </form>
                ";
            }
        } ?>
    </div>
</section>