<?php ob_start();
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 8/28/2018
 * Time: 5:13 PM
 */
session_start();
//session_destroy();
//define path
defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
defined("TEMPLATE_BACK")? null : define("TEMPLATE_BACK", __DIR__.DS."templates/back");

defined("UPLOAD_DIRECTORY")? null : define("UPLOAD_DIRECTORY", __DIR__.DS."uploads");

defined("DB_HOST")? null : define("DB_HOST", "localhost");
defined("DB_USER")? null : define("DB_USER", "root");
defined("DB_PASS")? null : define("DB_PASS", '');
defined("DB_NAME")? null : define("DB_NAME", "ecom_db");
//defined("DB_NAME")? null : define("DB_NAME", "ghonline");


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

require_once ('functions.php');
require_once ('cart.php');





//echo __FILE__;
//echo "<br>";
//echo $_SERVER['REQUEST_URI'] ;
//echo "<br>";
//echo $_SERVER['PHP_SELF'];
//echo "<br>";
//echo __DIR__;

