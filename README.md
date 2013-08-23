Fit Skeleton package 
====================

For installing [PHPFIT](https://github.com/metaclass-nl/phpfit) and [Fit Shelf](https://github.com/metaclass-nl/fit-shelf) using Composer. 

Requires PHP >= 5.3.2 for Composer to run.

Readily configured, with scripts using composers vendor/autoload.php


SECURITY
--------
Do not install in a production environment.

WARNING: Fit Shelf allows tests to access arbitrary properties and methods on the object under test. 
It has no notion of authorization. Allowing end users to run self-modified tests may expose sensitive 
data, cause fatal errors and leave the system in an undefined state. 


INSTALLATION
------------

1. If you want your own tests and fixtures under version control check out an empty working copy in your development environment

2. Download this package as a zip file from Github (button at the bottom right) and extract its content. 

3. Move the content of the resulting fit-skeleton folder into the working copy / your development environment

4. Open a command shell (in windows use Git Bash) and change its current directory to the folder you just moved composer.json to (further called the skeleton folder).

5. Enter:  

		php composer.phar install
  

USAGE
-----

1. From a Browser: 
   - Add an empty file named output.html to the skeleton folder and make it writable for PHP on your development server
     or edit config/config.php to point to a file that is writable for PHP on your development server,  
   - Enter the url to index.php in the skeleton folder on your development server into a browser  
   - Click on one of the hyperlinks  
   
2. From the CLI:

	    php run-cli.php path/to/input.html [path/to/output.html] [path/to/fixtures]  
	
	Note: if you enter the path/to/fixtures argument the default fixture paths will also be checked unless you remove them from config.config.php

3) From Fitnesse! (http://fitnesse.org/) (SCRIPT NOT TESTED)

   put this in your wiki pages:  
	
      !define COMMAND_PATTERN {php /path/to/fit-skeleton/run-fitnesse.php [/path/to/fixtures]}  

    Note: if you use the path/to/fixtures argument the default fixture paths will also be checked  
    unless you remove them from config.config.php

4) From your own scripts:  

   Take a look at run-web.php or run-cli.php and config/config.php. 


DEVELOPING YOUR OWN TESTS AND FIXTURES
--------------------------------------

You may add your own tests to the tests folder and your own fixtures to the fixtures folder.
 
To load your own system under test classes you may autoload them, require_once them relative to the skeleton folder
or require_once them relative to the fixture class file using &#95;&#95;DIR&#95;&#95;. 

You may add more tests and fixtures folders in config/config.php. 

Currently autoloading fixtures through the PSR-0 autoloaders is not supported. You need to specify the fixtures folders in config.php.  


DATA TYPES
----------
Fit Shelf fixtures handle all data types as 'Mixed'. You may override this for your own fixtures 
for specific properties and/or methods, see PHPFIT_TypeAdapter_PhpTolerant.

Fit Shelf fixtures access properties as member variables. You may override this from your start fixture class 
by first loading an other type adapter class and then call for example:

	shelf_ClassHelper::adapterType('BeanTolerant');
	
This will make all shelf fixtures use PHPFIT_TypeAdapter_BeanTolerant which will first try 
getter and setter methods for accessing properties.

PHPFIT fixtures require you to specify datatypes for each fixture property and method that is
used from test tables.  You can use PHPFIT_TypeAdapter_PhpTolerant, 
just include PHPFIT_TypeAdapter_PhpTolerant explicitly:

    require_once('PHPFIT_TypeAdapter_PhpTolerant.php');
    
and add a method getType to your fixture so that it is allways used:

    class YourClass extends aPHPFIT_Fixture {
        static function getType($classOrObject, $name, $property) {
            return 'PhpTolerant';
        }
    }


RELEASE NOTES
-------------

Making PHPFIT and Fit Shelf available under composer is a work in progress. 

Currently composers depricated "include-path" configuration is used for both PHPFIT and Fit Shelf.

Class loading and name spacing of Fit Shelf will be adapted to PSR-0 name spacing and class loading.
This requires a reorganization of the folder structure and locations of the classes, 
and therefore will break existing code.  

Also see the readme's of [PHPFIT](https://github.com/metaclass-nl/phpfit) and [Fit Shelf](https://github.com/metaclass-nl/fit-shelf).

   
SUPPORT (Dutch)
---------------

MetaClass biedt hulp en ondersteuning binnen Nederland bij onderhoud 
en ontwikkeling van software, tests en fixtures. 
Voor meer informatie kijk op http://www.metaclass.nl/

LICENSE
-------

Licensed under the GNU General Public License version 3 or later.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MODIFIES AND/OR CONVEYS
THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY
GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE
USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED TO LOSS OF
DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD
PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS),
EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF
SUCH DAMAGES.

