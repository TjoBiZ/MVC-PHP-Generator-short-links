<?php


namespace tjo;


class ErrorHeandler {

	public function __construct() {
		if (DEBUG) {
			error_reporting( -1);
		} else {
			error_reporting(0);
		}
		set_exception_handler([$this, 'exceptionHandler']);
	}

	public function exceptionHandler($e) {
		$this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
		$this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
	}

	protected function logErrors($message = '', $file = '', $line = '') {
			error_log("[". date('Y-m-d H:i:s') ."] Text error: {$message} | Файл: {$file} | Строка: {$line} \n_________________________\n", 3, ROOT . '/tmp/errors.log');
	}

	protected function displayError($errono, $errstr, $errfile, $errline, $responce = 404) {
			http_response_code($responce);
			if($responce == 404 && !DEBUG) {
				require SITEFILES . '/errors/404.php';
				die;
			}
			if (DEBUG) {
				require SITEFILES . '/errors/develop.php';
			} else {
				require SITEFILES . '/errors/production.php';
			}
			die;
	}

}