<?php
// All the changeable fields
$fields = [
    [
        'element' => 'support-header',
        'text' => 'Ändra Header',
        'rows' => 10
    ],
    [
        'element' => 'support-member',
        'text' => 'Ändra "Bli Medlem"',
        'rows' => 10
    ],
    [
        'text' => 'Ändra betalningsmetodsinformation',
        'fields' => [
            [
                'element' => 'support-member-post',
                'text' => 'Postgiro',
                'rows' => 1
            ],
            [
                'element' => 'support-member-swish',
                'text' => 'Swish',
                'rows' => 1
            ],
        ]
    ],
    [
        'element' => 'support-member-mail',
        'text' => 'Ändra mail för kassör',
        'rows' => 1
    ],
    [
        'element' => 'support-insuranceinfo',
        'text' => 'Ändra text i "Försäkra din katt"',
        'rows' => 10
    ],
    [
        'text' => 'Ändra kontaktinformation för "Anmälning"',
        'fields' => [
            [
                'element' => 'support-insurance-name',
                'text' => 'Namn',
                'rows' => 1
            ],
            [
                'element' => 'support-insurance-email',
                'text' => 'E-post',
                'rows' => 1
            ],
            [
                'element' => 'support-insurance-tele',
                'text' => 'Telefonnummer',
                'rows' => 1
            ],
            [
                'element' => 'support-insurance-availab',
                'text' => 'Tillgänglighet',
                'rows' => 1
            ]
        ]
    ],
    [
        'element' => 'support-catneed',
        'text' => 'Ändra önskelista för katter',
        'rows' => 10
    ],
    [
        'element' => 'support-humanneed',
        'text' => 'Ändra önskelista för personalen',
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

                    $goToPage = 'support';
                }
            }
        }
    } else {
        if(isset($_POST[$field['element']])) {
            if(is_string($_POST[$field['element']])) {
                $data = htmlentities(trim($_POST[$field['element']]));

                $textConfirmed = $database->changeTextfield($field['element'], $data);

                $goToPage = 'support';
            }
        }
    }
}
?>

<section class="textfield page" id="support">
    <div class="textfield-header">
        <h2> Ändra på sida: Stöd Oss </h2>
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