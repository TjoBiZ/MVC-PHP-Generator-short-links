<?php

namespace app\controllers;

class NewurlController extends AppController {

		public function generationAction() {
			//debug($this->route);
			//debug($this->view);
			//debug($this->controller );
			//echo __METHOD__;
			//Regex inversion - example (?<=r)find - this find word "find" before letter 'r'.
			preg_match('/(?<=:\/\/).*/', $_POST['reallink'], $reallink);
			if (!isset($reallink[0])) {
				$reallink[0] = $_POST['reallink'];
			}
			$reallink[0] = htmlspecialchars($reallink[0]);
			//"SELECT * FROM slinks.slinks WHERE shortlink LIKE '%$shortlink%'"
			$resultlinks = \R::getRow( "SELECT * FROM slinks.slinks WHERE reallink LIKE ? LIMIT 1", [ "%$reallink[0]%" ]);

			if(isset($resultlinks['shortlink'])) {
				echo json_encode(['reallink' => $resultlinks['reallink'], 'shortlink' => $resultlinks['shortlink']]);
				die();
			} else {
				echo 'generation new link';
			}

			echo 'This is generator links';
		}

}