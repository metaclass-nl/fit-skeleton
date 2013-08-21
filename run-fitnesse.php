<?php

/*
NOT TESTED this script
original script see vendor/metaclass.nl/phpfit/phpfit-fitnesse.php (does not support composer)

http://fitnesse.org/FitNesse.FitServerProtocol
https://fitnesse.svn.sourceforge.net/svnroot/fitnesse/trunk/srcFitServerTests

put this in your wiki pages:
!define COMMAND_PATTERN {php /path/to/fit-skeleton/run-fitnesse.php}
If you use a custom fixture path, put this in your wiki pages:
!define COMMAND_PATTERN {php /path/to/fit-skeleton/run-fitnesse.php /your/fixture/path}
or add the path(s) to config.php

*/
require('config/config.php');

require_once 'vendor/autoload.php';
require_once 'PHPFIT/FitServer.php';
require_once 'PHPFIT/FixtureLoader.php';

if (count($argv) == 5) {
    PHPFIT_FixtureLoader::addFixturesDirectory($argv[1]); ;
	array_shift($argv); //passing the fixture path through the args overrides the other paths from $fitConfig
}
forEach($fitConfig->fixtureDirs as $eachDir) 
{
    PHPFIT_FixtureLoader::addFixturesDirectory($eachDir);
}

$fitserver = new PHPFIT_FitServer(new PHPFIT_Socket());
$out = $fitserver->run($argv);
exit($out);

