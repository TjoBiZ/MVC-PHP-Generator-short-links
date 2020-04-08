<?php

	use tjo\Router;

	//This rule check short links in base for then redirection real link (Logic 'then' in the controller)
	Router::add('^.{6}$', ['controller' => 'Redirect', 'action' => 'index']);

	//default routes
	//This rules for admin panel
	Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
	Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

	//This rules for users page in public
	Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
	Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$'); //Take url and trim regex controller/action https://site.com/controller/action