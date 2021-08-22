<?php

//load config
require_once 'config/config.php';
// var_dump(APPROOT);
// exit;

//load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

// manually Load livraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

// // autoload core libraries
// spl_autoload_register(function ($className) {
//     require_once "libraries/$className.php";
// });
