<?php
// All the changeable fields
$fields = [
    [
        'text' => 'Ändra "Kontakt"',
        'fields' => [
            [
                'element' => 'footer-visit',
                'text' => 'Adress',
                'rows' => 4
            ],
            [
                'element' => 'footer-visit-email',
                'text' => 'E-post',
                'rows' => 1
            ],
            [
                'element' => 'footer-visit-tele',
                'text' => 'Telefonnummer',
                'rows' => 1
            ]
        ]
    ],
    [
        'text' => 'Ändra sociala medier-länkar',
        'fields' => [
            [
                'element' => 'footer-fb-link',
                'text' => 'Facebook',
                'rows' => 1
            ],
            [
                'element' => 'footer-ig-link',
                'text' => 'Instagram',
                'rows' => 1
            ]
        ]
    ]
];

// Change fields
foreach ($fields as $field) {
    foreach ($field['fields'] as $f) {
        if(isset($_POST[$f['element']])) {
            if(is_string($_POST[$f['element']])) {
                $data = htmlentities(trim($_POST[$f['element']]));

                $database->changeTextfield($f['element'], $data);

                $goToPage = 'footer';
            }
        }
    }
}
?>

<section class="textfield page" id="footer">
    <div class="textfield-header">
        <h2> Ändra på sida: Footer </h2>
    </div>
    <div class="forms">
        <!-- PHP puts in everything in the fields -->
        <?php foreach ($fields as $field) {
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
        } ?>
    </div>
</section>