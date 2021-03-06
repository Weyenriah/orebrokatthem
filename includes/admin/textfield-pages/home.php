<?php
// All the changeable fields
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
        'element' => 'form-found',
        'text' => 'Ändra länk till formulär (Hittad katt)',
        'rows' => 3
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
        'text' => 'Ändra information för omplacering',
        'fields' => [
            [
                'element' => 'form-replacement',
                'text' => 'Ändra länk till formulär (Omplacering)',
                'rows' => 3
            ],
            [
                'element' => 'mail-replacement',
                'text' => 'Ändra mail',
                'rows' => 1
            ]
        ]
    ],
    [
        'element' => 'home-remember',
        'text' => 'Ändra text i Minneslunden',
        'rows' => 10
    ]
];

// Change fields
foreach ($fields as $field) {
    if (isset($field['fields'])){
        foreach ($field['fields'] as $f) {
            if(isset($_POST[$f['element']])) {
                if(is_string($_POST[$f['element']])) {
                    $data = htmlentities(trim($_POST[$f['element']]));

                    $textConfirmed = $database->changeTextfield($f['element'], $data);

                    $goToPage = 'home';
                }
            }
        }
    } else {
        if(isset($_POST[$field['element']])) {
            if(is_string($_POST[$field['element']])) {
                $data = htmlentities(trim($_POST[$field['element']]));

                $textConfirmed = $database->changeTextfield($field['element'], $data);

                $goToPage = 'home';
            }
        }
    }
}
?>
<section class="textfield page" id="home">
    <div class="textfield-header">
        <h2> Ändra på sida: Hem </h2>
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