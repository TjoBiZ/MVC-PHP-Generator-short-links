<?php

namespace app\controllers;

class NewurlController extends AppController {

		public function generationAction() {
			//debug($this->route);
			//debug($this->view);
			//debug($this->controller );
			//echo __METHOD__;
			//Delete 'space' and new rows 'enter' - /n
			$reallink = str_replace(PHP_EOL, ' ', $_POST['reallink']);
			if (strpos($reallink, ' ')) {
				$rl = stristr($reallink, ' ', true);
				preg_match('/(?<=:\/\/).*/', $rl, $reallink);
			} else {
				$rl = $reallink;
				//Regex inversion - example (?<=r)find - this find word "find" before letter 'r'.
				preg_match('/(?<=:\/\/).*/', $_POST['reallink'], $reallink);
				if(empty($reallink[0])) {
					$reallink[0] = htmlspecialchars($rl);
				}
			}
			if(!isset($reallink[0])) {
			$reallink[0] = htmlspecialchars($rl);
				}
			//Prohibit does link to site generation links, because any people can do loops
			$regex_host = str_replace('.', '\\.', $_SERVER['HTTP_HOST']);
			preg_match('/'.$regex_host.'/', $reallink[0], $checkloop);
				if ($checkloop[0]) {
					die();
				}
			//"SELECT * FROM slinks.slinks WHERE shortlink LIKE '%$shortlink%'"
			$resultlinks = \R::getRow( "SELECT * FROM slinks.slinks WHERE reallink LIKE ? LIMIT 1", [ "$reallink[0]" ]);

			if(isset($resultlinks['reallink'])) {
				echo json_encode(['reallink' => $resultlinks['reallink'], 'shortlink' => $resultlinks['shortlink']]);
				die();
			} else {
				$slink = $this->generatorSortLink();
				$ip = $this->getIpUser();
				//check short link about exist in SQL base
				$resultlinks = \R::getRow( "SELECT * FROM slinks.slinks WHERE shortlink LIKE ? LIMIT 1", [ "$slink" ]);
				if (isset($resultlinks['shortlink'])) {
					$count = 0;
					while ($count < 100) {
						$count++;
						$slink = $this->generatorSortLink();
						$resultlinks = \R::getRow( "SELECT * FROM slinks.slinks WHERE shortlink LIKE ? LIMIT 1", [ "$slink" ]);
						if (!isset($resultlinks['shortlink'])) {
							\R::exec("INSERT INTO `slinks`.`slinks` (`reallink`, `shortlink`, `ipuser`) VALUES ('$reallink[0]', '$slink', '$ip')");
							echo json_encode(['reallink' => $reallink[0], 'shortlink' => $slink]);
							die();
						}
					}
					echo json_encode(['reallink' => $reallink[0], 'shortlink' => 'Pls, try again generation link']);
					die();
				}
				\R::exec("INSERT INTO `slinks`.`slinks` (`reallink`, `shortlink`, `ipuser`) VALUES ('$reallink[0]', '$slink', '$ip')");
				echo json_encode(['reallink' => $reallink[0], 'shortlink' => $slink]);
			}
			die();
		}

		//This method does generation short link
		public function generatorSortLink() {
			$symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$count = 0;
			while ($count < 100) {
				$count++;
				$randomlink = array(); //remember to declare $pass as an array
				$symbolLength = strlen($symbols) - 1; //put the length -1 in cache
				for ($i = 0; $i < 6; $i++) {
					$n = rand(0, $symbolLength);
					$randomlink[] = $symbols[$n];
				}
				$resultlink = implode($randomlink);
				preg_match('/^[a-z]{6}$/', $resultlink, $forbidenlink);
				if (!isset($forbidenlink[0])) {
					return implode($randomlink); //turn the array into a string
				}
			}
		}

		//This method get ip address user.
		public function getIpUser() {
			$keys = [
				'HTTP_CLIENT_IP',
				'HTTP_X_FORWARDED_FOR',
				'REMOTE_ADDR'
			];
			foreach ($keys as $key) {
				if (!empty($_SERVER[$key])) {
					//$ip = trim(end(explode(',', $_SERVER[$key])));
					$ip = htmlspecialchars($_SERVER[$key]);
					if (filter_var($ip, FILTER_VALIDATE_IP)) {
						return $ip;
					}
				}
			}
		}

}