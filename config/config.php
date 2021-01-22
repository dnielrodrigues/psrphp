<?php

// debug mode
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

// basic params
define('BASE_URL', $_SERVER['HTTP_HOST']);
define('BASE_PATH', dirname(__DIR__));
define('SITE_PATH', BASE_PATH.'/public');
define('THEME_PATH', SITE_PATH.'/themes/my-theme');
define('THEME_URL', BASE_URL.'/themes/my-theme');
