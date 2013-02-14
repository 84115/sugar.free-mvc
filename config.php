<?php

//NEVER provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost/classy');

//Directories
define('LIBS', 'libs');
define('APP', 'app');
define('PUB', 'pub');
define('MODEL', 'model');
define('CACHE', 'cache');
define('VIEW', 'view');
define('CONTROLLER', 'controller');

//Filenames
define('LOG', 'error.log');

//Metadata
define('TITLE', 'title');
define('DESC', 'description');
define('AUTHOR', 'author');
define('KEYWORDS', '1,2,3,4,5');

//Database
define('DB_TYPE', 'mysql');//sqlite not supported yet
define('DB_HOST', 'localhost');
define('DB_NAME', 'classy');
define('DB_USER', 'root');
define('DB_PASS', '');

//Don't change this after installing!
define('HASH_PASSWORD_KEY', 'thatsRightTheMascaraSnakeFastAndBulbous');