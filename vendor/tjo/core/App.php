<?php


namespace tjo;


class App {

	public static $app; //this property use pattern registry - https://designpatternsphp.readthedocs.io/ru/latest/Structural/Registry/README.html for set property our aplication and take parameters. Need use anti-pattern Singleton -  only one object any time

	public function __construct() {
		$query = trim($_SERVER['QUERY_STRING'], '/'); //take url for parse controller and action
		session_start();
		self::$app = Registry::instance();
		$this->getParams();
		new ErrorHeandler();
		Router::dispatch($query);
	}

	protected function getParams() {
		$parms = require_once CONFIG . '/params.php';
		if (!empty($parms)) {
			foreach ($parms as $key => $value) {
				self::$app->setProperty($key, $value);
			}
		}
	}

}