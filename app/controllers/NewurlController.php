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
			} else {
				$slink = $this->generatorSortLink();
				//check short link about exist in SQL base
				$resultlinks = \R::getRow( "SELECT * FROM slinks.slinks WHERE shortlink LIKE ? LIMIT 1", [ "%$slink%" ]);
				if (isset($resultlinks['shortlink'])) {
					$count = 0;
					while ($count < 100) {
						$count++;
						$slink = $this->generatorSortLink();
						$resultlinks = \R::getRow( "SELECT * FROM slinks.slinks WHERE shortlink LIKE ? LIMIT 1", [ "%$slink%" ]);
						if (!isset($resultlinks['shortlink'])) {
							echo json_encode(['reallink' => $resultlinks['reallink'], 'shortlink' => $resultlinks['shortlink']]);
							break;
						}
					}
				} else {
					echo json_encode(['reallink' => $resultlinks['reallink'], 'shortlink' => $resultlinks['shortlink']]);
				}
			}
			die();
		}

		//This method does generation short link
		public function generatorSortLink() {
			$symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$randomlink = array(); //remember to declare $pass as an array
			$symbolLength = strlen($symbols) - 1; //put the length -1 in cache
			for ($i = 0; $i < 6; $i++) {
				$n = rand(0, $symbolLength);
				$randomlink[] = $symbols[$n];
			}
			return implode($randomlink); //turn the array into a string
		}

}