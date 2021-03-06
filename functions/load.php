<?php
define('APP_FOLDER', dirname(__DIR__));

// All settings and other "outside"-PHP
require_once APP_FOLDER . '/functions/database/database.php';
require_once APP_FOLDER . '/settings.php';
require_once APP_FOLDER . '/functions/upload.php';
require_once APP_FOLDER . '/functions/email.php';

$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, DB_PREFIX);