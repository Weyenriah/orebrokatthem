<?php
    require_once '../../functions/load.php';

    session_start();
    session_unset();
    session_destroy();

    header('Location: ' . BASE_URL);
    exit();