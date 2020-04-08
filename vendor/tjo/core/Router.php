<?php

namespace tjo;

class Router {
		protected static $routes = [];
		protected static $route = [];

		public static function add($regexp, $route = []) {
				self::$routes[$regexp] = $route;
		}

		//This method for test, return table routes.
		public static function getRoutes() {
				return self::$routes;
		}

		//This method for test, return current route.
		public static function getRoute() {
		return self::$route;
	}

		//This method get url address, then do logic. If matchRoute return true then run Conttroller and method if not then return 404
		public static function dispatch($url) {
			$url = self::removeQueryString($url);
			if(self::matchRoute($url)) {
				$controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
					if (class_exists($controller)) {
						$controllerObject = new $controller(self::$route);
						$action = self::lowerCamelCase(self::$route['action']) . 'Action';
						if (method_exists($controllerObject, $action)) {
							$controllerObject->$action();
							$controllerObject->getView();
						} else {
							throw new \Exception("Method $controller::$action not found", 404); //If class not exist
						}
					} else {
						throw new \Exception("Controller $controller not found", 404); //If class not exist
					}
			} else {
				throw new \Exception("Page not found", 404);
			}
		}

		//This method find route in table routes. If find route then return true, If not exist then return false
		public static function matchRoute($url) {
			foreach (self::$routes as $pattern => $route) {
					if(preg_match("#{$pattern}#", $url, $matches)) {
							foreach ($matches as $k => $v) {
								if(is_string($k)) {
									$route[$k] = $v;
								}
							}
							if (empty($route['action'])) {
								$route['action'] = 'index';
							}
							if (!isset($route['prefix'])) {
								$route['prefix'] = '';
							} else {
								$route['prefix'] .= '\\';
							}
							$route['controller'] = self::upperCamelCase($route['controller']);
							self::$route = $route;
							return true;
					}
			}
			return false;
		}

		//Format to CamelCase for Controller name
		protected static function upperCamelCase($name) {
			  return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
		}

		//Format to camelCase for Action name
		protected static function lowerCamelCase($name) {
				return lcfirst(self::upperCamelCase($name));
		}

		//delete Get parameters in url
		protected static function removeQueryString($url) {
			if ($url) {
				$params = explode('&', $url, 2);
				if(strpos($params[0], '=') === false) {
					return rtrim($params[0], '/');
				} else {
					return '';
				}
			}
		}

}