<?php

require('config.php');

function autoloader($class){
	require LIBS.'/'.strtolower($class).'.php';
}
spl_autoload_register('autoloader');

$bootstrapper = new Bootstrapper();