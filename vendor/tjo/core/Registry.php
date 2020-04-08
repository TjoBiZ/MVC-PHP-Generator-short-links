<?php
/**
 * pattern registry - https://designpatternsphp.readthedocs.io/ru/latest/Structural/Registry/README.html for set property our aplication and take parameters from url query. Need use anti-pattern Singleton - only one object any time
 */

namespace tjo;


class Registry {

	use TSingleton;

	protected static $properties = [];

	public static function setProperty($name, $value) {
		self::$properties[$name] = $value;
	}

	public function getProperty($name) {
		if (isset(self::$properties[$name])) {
			return self::$properties[$name];
		}
		return null;
	}

	public function getProperties(){
		return self::$properties;
	}

}