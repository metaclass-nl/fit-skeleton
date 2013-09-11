<?php

/*
NOT TESTED this script.
Original script see vendor/metaclass.nl/phpfit/phpfit-fitnesse.php (does not support composer).
Maybe fitnesse-configurable namespaces can be obtained through $argv[1] instead of fixture dir 

http://fitnesse.org/FitNesse.FitServerProtocol
https://fitnesse.svn.sourceforge.net/svnroot/fitnesse/trunk/srcFitServerTests

put this in your wiki pages:
!define COMMAND_PATTERN {php /path/to/fit-skeleton/run-fitnesse.php}
If you use a custom fixture path, put this in your wiki pages:
!define COMMAND_PATTERN {php /path/to/fit-skeleton/run-fitnesse.php /your/fixture/path}
or add the path(s) to config.php

*/
$loader = require 'vendor/autoload.php';

require_once 'PHPFIT/FitServer.php';
require_once 'PHPFIT/FixtureLoader.php';

require('config/config.php');

//add additional namespaces from config to Composers ClassLoader
forEach($fitConfig->nameSpacedMap as $prefix => $path)
{
    $loader->add($prefix, (array) $path);
}

if (count($argv) == 5) {
    PHPFIT_FixtureLoader::addFixturesDirectory($argv[1]); ;
	array_shift($argv); //passing the fixture path through the args overrides the other paths added by config.php
}

$fitserver = new PHPFIT_FitServer(new PHPFIT_Socket());
$out = $fitserver->run($argv);
exit($out);

