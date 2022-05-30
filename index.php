<?php 
require_once('auth.php');
require_once('app/autoload.php');
$page_exists = 0;
//..................................................................
//EXECUTE ROUTES START
//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://";
// echo $_SERVER["REQUEST_URI"];

CONFIG::route('','pagecontroller@home'); // Leave empty for Homepage

//.... PAGES - START .....

//.... PAGES - END .....


//.... ADMIN - START .....


//.... ADMIN - END .....
//..................................................................
CONFIG::route404('pagecontroller@func'); //FOR FUNCTIONS

//EXECUTE ROUTES END
//..................................................................
CONFIG::route404('pagecontroller@page404'); //FOR PAGE NOT FOUND


?>