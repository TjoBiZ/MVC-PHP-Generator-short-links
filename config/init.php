<?php

define("DEBUG", 0); //Settings: develop mode or production mode. 1 - show errors, 0 - hide errors
define("ROOT", dirname(__DIR__));
define("SITEFILES", ROOT . '/public');
define("APP", ROOT . '/app'); //The classes for develop functional site
define("CORE", ROOT . '/vendor/tjo/core'); //The kernel Application
define("LIBS", ROOT . '/vendor/tjo/core/libs'); //OUR libs //In folder ...core/base - our bases classes
define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config'); //Some configs for future application extend
define("LAYOUT", 'default'); //Template option
define("HTTPS", 'https://'); //Site with SSL
define("HTTP", 'http://'); //Site without SSL
define("PATH", HTTPS . $_SERVER['HTTP_HOST']); //Url site
define("ADMINPANEL", PATH . '/admin'); //Admin panel

require_once ROOT . "/vendor/autoload.php"; //Autoloader composer packages and namespaces