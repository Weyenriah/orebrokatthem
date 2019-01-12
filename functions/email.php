<?php
// For email security
function displayEmail($email) {
    $explodeMail = explode('@', $email);

    $BASE_URL = BASE_URL;

    // If no email return blank
    if(count($explodeMail) < 2) {
        return '';
    }

    return "<span class='hidden-email'>$explodeMail[0]<img src='${BASE_URL}assets/images/snabela.svg' alt='snabela'>$explodeMail[1]</span>";
}