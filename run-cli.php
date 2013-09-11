<?php
//example: php run-cli.php tests/PhpVersion.html

$loader = require 'vendor/autoload.php';

require_once 'PHPFIT.php';

require('config/config.php');

//add additional namespaces from config to Composers ClassLoader
forEach($fitConfig->nameSpacedMap as $prefix => $path)
{
    $loader->add($prefix, (array) $path);
}

if( count( $argv ) < 2 ) {
	fwrite( STDERR, "Invalid number of arguments!!!\nUsage: php run-cli.php path/to/input.html [path/to/output.html] [paths/to/fixtures]\n" );
	return 1;
}

$fixturesDir = isset($argv[3]) ? $argv[3] : null;

$output = isset($argv[2]) ? $argv[2] : $fitConfig->output;

echo PHPFIT::run($argv[1], $output, $fixturesDir) . "\n";

?>