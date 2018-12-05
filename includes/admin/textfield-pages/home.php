<?php

    $fields = [
        [
            'element' => 'home-header',
            'text' => 'Ändra Header',
            'rows' => 10
        ],
        [
            'element' => 'found-important',
            'text' => 'Ändra "Viktig text" för "Har du hittat en katt?',
            'rows' => 5
        ],
        [
            'element' => 'found-text',
            'text' => 'Ändra allmän text för "Har du hittat en katt?"',
            'rows' => 10
        ],
        [
            'element' => 'relocate-important',
            'text' => 'Ändra "Viktig text" för "Omplacering av katt"',
            'rows' => 5
        ],
        [
            'element' => 'relocate-text',
            'text' => 'Ändra allmän text för "Omplacering av katt"',
            'rows' => 10
        ],
        [
            'element' => 'home-remember',
            'text' => 'Ändra text i Minneslunden',
            'rows' => 10
        ]
    ];

    foreach ($fields as $field) {
        if(isset($_POST[$field['element']])) {
            if(is_string($_POST[$field['element']])) {
                $data = htmlentities(trim($_POST[$field['element']]));

                $database->changeTextfield($field['element'], $data);

                $goToPage = 'home';
            }
        }
    }

?>
<section class="textfield page" id="home">
    <div class="textfield-header">
        <h2> Ändra på sida: Hem </h2>
    </div>
    <div class="forms">
        <?php foreach ($fields as $field) {
        echo "<form class='form' method='post'>
            <div class='{$field['type']}'>
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