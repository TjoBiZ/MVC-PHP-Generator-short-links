<?php

namespace tjo;

class CheckSLinks {

//This method find short link in base
	public static function checkShortLinksInBase() {
		preg_match('/^[A-Za-z0-9]{6}$/', $_SERVER['QUERY_STRING'], $matches);
		if (isset($matches[0])) {
			$db = require_once CONFIG . '/config_db.php';
			$conn = mysqli_connect('localhost', $db['user'], $db['pass']);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$slink = $conn->query("SELECT * FROM slinks.slinks WHERE shortlink LIKE '$matches[0]'");
			if ($slink->num_rows) {
				return array('controller' => 'Redirect', 'action' => 'index');
			}
		}
		return ['controller' => 'Main', 'action' => 'index'];
	}

}