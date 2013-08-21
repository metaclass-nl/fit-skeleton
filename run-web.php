<?php
//to test: enter url in your browser to run-web.php?input_filename=vendor/metaclass-nl/phpfit/examples/input/arithmetic.html

require('config/config.php');

require_once 'vendor/autoload.php';
require_once 'PHPFIT.php';
require_once 'PHPFIT/FixtureLoader.php';
forEach($fitConfig->fixtureDirs as $eachDir) 
{
	PHPFIT_FixtureLoader::addFixturesDirectory($eachDir);
}

if(!isset($_GET['input_filename'])) {
    die('no input file received!');
}
if ($_GET['input_filename'][0]=='/'
	|| strPos($_GET['input_filename'], '..') !== false 
	|| preg_match("'[^A-Za-z0-9_\-./]'", $_GET['input_filename']))
	die("Unsafe file name: ". $_GET['input_filename']);

PHPFIT::run($_GET['input_filename'], $fitConfig->output);

echo file_get_contents( $fitConfig->output, true );
?>
