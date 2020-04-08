<?php

namespace tjo\base;

use tjo\Da;

abstract class Model {

	public $attributes = [];
	public $errors = [];
	public $rules = [];

	public function __construct() {
		Da::instance();
	}

}