<?php

namespace tjo;

require_once 'rb.php';

use \RedBeanPHP\R as R;

class Da {

	use TSingleton;

	protected function __construct() {
		$db = require_once CONFIG . '/config_db.php';
		\R::setup($db['dsn'], $db['user'], $db['pass']);
		if (!\R::testConnection()) {
			throw new \Exception("Doesn't connect to base {$db['dsn']}", 500);
		}
		\R::freeze(true);
		if(DEBUG) {
			\R::debug(true, 1);
		}
	}

}