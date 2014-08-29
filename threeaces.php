<?php
session_start();

define('APP_FOLDER', 'mvc/');
define('M', APP_FOLDER . 'model/');
define('V', APP_FOLDER . 'view/');
define('C', APP_FOLDER . 'controller/');

// start controller
require(C . "controller.php");

?>
