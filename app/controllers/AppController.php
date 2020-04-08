<?php
//Share controller for application. All Classes extend this controller instead of abstract class "Controller" for flexible settings

namespace app\controllers;

use app\models\AppModel;
use tjo\base\Controller;

class AppController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		new AppModel();
	}

}