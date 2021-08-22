<?php

//in public/.htaccess needs to be updated correct path (Rewrite Base)

// update this to .env and exclude this file to repo to hide db info

// db params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shareposts');

// App root
define('APPROOT',  dirname(dirname(__FILE__)));
// URL root
define('URLROOT', 'http://localhost/PostItNow');
// Site Name
define('SITENAME', 'PostItNow');
//App version
define('APPVERSION', '1.0.2');
