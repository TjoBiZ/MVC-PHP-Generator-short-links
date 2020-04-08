<?php

namespace tjo;

class CheckSLinks {

	//This method find short link in base
	public static function checkShortLinksInBase() {
		preg_match('/^[A-Za-z0-9]{6}$/', $_SERVER['QUERY_STRING'], $matches);
		if ($matches[0]) {
			return ['controller' => 'Redirect', 'action' => 'index'];
		}
		return ['controller' => 'Redirect', 'action' => 'index'];
	}

}