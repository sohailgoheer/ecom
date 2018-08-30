<?php
/**
 * Created by PhpStorm.
 * User: Sohail
 * Date: 8/28/2018
 * Time: 5:13 PM
 */
ob_start();

//define path
defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
defined("TEMPLATE_BACK")? null : define("TEMPLATE_BACK", __DIR__.DS."templates/back");

defined("DB_HOST")? null : define("DB_HOST", "127.0.1.1");
defined("DB_USER")? null : define("DB_USER", "root");
defined("DB_PASS")? null : define("DB_PASS", "goheer");
defined("DB_NAME")? null : define("DB_NAME", "ecom_db");


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

require_once ('functions.php');

