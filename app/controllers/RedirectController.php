<?php

namespace app\controllers;

class RedirectController {

	public function indexAction() {
		$db = require CONFIG . "/config_db.php";
		$conn = mysqli_connect('localhost', $db['user'], $db['pass']);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$shortlink = $_SERVER['QUERY_STRING'];
		$reallink = mysqli_fetch_assoc($conn->query("SELECT * FROM slinks.slinks WHERE shortlink LIKE '%$shortlink%'"));
		header("Location: http://" . $reallink['reallink']);
		die;
	}

}