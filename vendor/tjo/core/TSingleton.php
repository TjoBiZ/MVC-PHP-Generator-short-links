<?php
/**
 * https://designpatternsphp.readthedocs.io/ru/latest/Creational/Singleton/README.html
 * https://refactoring.guru/ru/design-patterns/singleton
 **/

namespace tjo;


trait TSingleton {
	private static $instance;

	public static function instance() {
		if (self::$instance === null) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}