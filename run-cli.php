<?php
//example: php run-cli.php vendor/metaclass-nl/fit-shelf/script/book/tests/Fig1TestDisconnect.html
require('config/config.php');

require_once 'vendor/autoload.php';
require_once 'PHPFIT.php';
require_once 'PHPFIT/FixtureLoader.php';

if( count( $argv ) < 2 ) {
	fwrite( STDERR, "Invalid number of arguments!!!\nUsage: php run-cli.php path/to/input.html [path/to/output.html] [paths/to/fixtures]\n" );
	return 1;
}

if (isset($argv[3])) {
	PHPFIT_FixtureLoader::addFixturesDirectory($argv[3]); ;
}
forEach($fitConfig->fixtureDirs as $eachDir) 
{
	PHPFIT_FixtureLoader::addFixturesDirectory($eachDir);
}


$output = isset($argv[2]) ? $argv[2] : fitConfig->output;

echo PHPFIT::run($argv[1], $output) . "\n";

?>