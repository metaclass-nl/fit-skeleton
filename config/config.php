<?php
$fitConfig = new StdClass();

$fitConfig->exampleDirs["Skeleton"] = "tests";
$fitConfig->exampleDirs["Fit Shelf"] = "vendor/metaclass-nl/fit-shelf/examples/tests";
$fitConfig->exampleDirs["PHPFIT"] = "vendor/metaclass-nl/phpfit/examples/input";
//add your own input folders here

//extra namespace mappings to set to Composers ClassLoader
//keys may be namespaces including trailing \, PEAR style prefixes with trailing _, or '' for unnamespaced
//values may be string or array of string referring to the directory to load from.
$fitConfig->nameSpacedMap = array(
    'MetaClass\FitSkeleton' => 'src',
    //'yourNameSpace' => 'yourDirectoryPath'  
    );

//may add relative paths from the run scripts to your own fixtures folders 
//if (class_exists('Composer\Autoload\ClassLoader')) {
//    PHPFIT_FixtureLoader::addFixturesDirectory('src/fixtures');
//}

$fitConfig->output = 'output.html';

error_reporting( E_ALL | E_STRICT);
?>