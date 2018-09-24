<?php
define("BASE_URL", (isset($_ENV['BASE_URL'])) ? $_ENV['BASE_URL'] : "/orebrokatthem/");

// Define constants for database connection
define('DB_HOST', (isset($_ENV['DB_HOST'])) ? $_ENV['DB_HOST'] : 'localhost');
define('DB_NAME', (isset($_ENV['DB_NAME'])) ? $_ENV['DB_NAME'] : 'okh');
define('DB_USER', (isset($_ENV['DB_USER'])) ? $_ENV['DB_USER'] : 'root');
define('DB_PASSWORD', (isset($_ENV['DB_PASSWORD'])) ? $_ENV['DB_PASSWORD'] : '');

define('UPLOADS_FOLDER', (isset($_ENV['UPLOADS_FOLDER'])) ? $_ENV['UPLOADS_FOLDER'] : 'uploads/');