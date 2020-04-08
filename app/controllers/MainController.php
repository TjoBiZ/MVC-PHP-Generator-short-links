<?php


namespace app\controllers;

use tjo\App;

class MainController extends AppController {

	public function indexAction() {
//		debug($this->route);
//		debug($this->view);
//		debug($this->controller );
//		echo __METHOD__;
		$links = \R::findAll('slinks');
		$slink  = \R::findOne( 'slinks', ' id = ? ', [2] );
		$this->setMeta(App::$app->getProperty('site_name'), 'This form does generation short links, put you link and get short link', 'short link, generator short link, PHP MVC generator short links');
		$this->set($links);
		foreach ($links as $k => $v) {
			$link = $v->getProperties();
			$this->set(['shortlink' => $link["shortlink"], 'link' => $link["reallink"]]);
		}
	}

}