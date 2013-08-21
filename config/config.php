<?php
$fitConfig = new StdClass();

$fitConfig->exampleDirs["Skeleton"] = "tests";
$fitConfig->exampleDirs["Fit Shelf"] = "vendor/metaclass-nl/fit-shelf/script/book/tests";
$fitConfig->exampleDirs["PHPFIT"] = "vendor/metaclass-nl/phpfit/examples/input";
//add your own input folders here

//add relateve paths from the run scripts to your own fixtures folders 
$fitConfig->fixtureDirs = array('src/fixtures', 'vendor/metaclass-nl/fit-shelf/script/book/src');

$fitConfig->output = 'output.html';

error_reporting( E_ALL | E_STRICT);
?>