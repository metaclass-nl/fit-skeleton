<?php
$loader = require 'vendor/autoload.php';

require_once 'PHPFIT.php';
require('config/config.php');

//add additional namespaces from config to Composers ClassLoader
forEach($fitConfig->nameSpacedMap as $prefix => $path)
{
    $loader->add($prefix, (array) $path);
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
