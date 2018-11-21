<?php
define('APP_FOLDER', dirname(__DIR__));

require_once APP_FOLDER . '/functions/database.php';
require_once APP_FOLDER . '/components/settings.php';

$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);