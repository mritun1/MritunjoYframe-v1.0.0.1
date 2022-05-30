<?php 
session_start();
require_once realpath(__DIR__ . '/vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Retrive env variable
define('DATABASE_NAME',$_ENV['DATABASE_NAME']);
define('DATABASE_USER_NAME',$_ENV['DATABASE_USER_NAME']);
define('DATABASE_PASS',$_ENV['DATABASE_PASS']);

define('ADMIN_USERNAME',$_ENV['ADMIN_USERNAME']);
define('ADMIN_PASSWORD',$_ENV['ADMIN_PASSWORD']);

define('SMTP_EMAIL_USERNAME',$_ENV['SMTP_EMAIL_USERNAME']);
define('SMTP_EMAIL_PASSWORD',$_ENV['SMTP_EMAIL_PASSWORD']);
?>