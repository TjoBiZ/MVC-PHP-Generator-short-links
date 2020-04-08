<?php
//main frontend controller - enter point to https://site.com
//Application settings.
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php'; //My functions for debug
require_once CONFIG . '/routes.php';

new tjo\App();
//debug(\tjo\App::$app->getProperties());
//throw new Exception('The page nod found', 404);
//debug(\tjo\Router::getRoutes());