<?php
$defaults = [
    'BASE_URL' => "/orebrokatthem/public/",
    'DB_HOST' => "localhost",
    'DB_NAME' => "okh",
    'DB_PREFIX' => "okh_",
    'DB_USER' => "root",
    'DB_PASSWORD' => "",
    'UPLOADS_FOLDER' => "storage" . DIRECTORY_SEPARATOR,
    'PASSWORD_SALT' => "",
    'SEND_EMAIL_FROM' => "",
    'SEND_EMAIL_TO' => "",
];

define("BASE_URL", (isset($_ENV['BASE_URL'])) ? $_ENV['BASE_URL'] : $defaults['BASE_URL']);

// Define constants for database connection
define('DB_HOST', (isset($_ENV['DB_HOST'])) ? $_ENV['DB_HOST'] : $defaults['DB_HOST']);
define('DB_NAME', (isset($_ENV['DB_NAME'])) ? $_ENV['DB_NAME'] : $defaults['DB_NAME']);
define('DB_PREFIX', (isset($_ENV['DB_PREFIX'])) ? $_ENV['DB_PREFIX'] : $defaults['DB_PREFIX']);
define('DB_USER', (isset($_ENV['DB_USER'])) ? $_ENV['DB_USER'] : $defaults['DB_USER']);
define('DB_PASSWORD', (isset($_ENV['DB_PASSWORD'])) ? $_ENV['DB_PASSWORD'] : $defaults['DB_PASSWORD']);

define('UPLOADS_FOLDER', (isset($_ENV['UPLOADS_FOLDER'])) ? $_ENV['UPLOADS_FOLDER'] : $defaults['UPLOADS_FOLDER'] );

define('PASSWORD_SALT', (isset($_ENV['PASSWORD_SALT'])) ? $_ENV['PASSWORD_SALT'] : $defaults['PASSWORD_SALT']);


define('SEND_EMAIL_FROM', (isset($_ENV['SEND_EMAIL_FROM'])) ? $_ENV['SEND_EMAIL_FROM'] : $defaults['SEND_EMAIL_FROM']);
define('SEND_EMAIL_TO', (isset($_ENV['SEND_EMAIL_TO'])) ? $_ENV['SEND_EMAIL_TO'] : $defaults['SEND_EMAIL_TO']);