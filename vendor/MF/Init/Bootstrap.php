<?php

	namespace MF\Init;

	abstract class Bootstrap {

		private $routes;

		abstract protected function initRoutes(); 

		public function __construct() {

			$this->initRoutes();
			$this->run($this->getUrl());

		}

		public function getRoutes() {

			return $this->routes;

		}

		public function setRoutes(array $routes) {

			$this->routes = $routes;

		}

		protected function run($url) {

			$routeFounded = false;

			foreach ($this->getRoutes() as $key => $route) {

				if($url == $route['route']) {

					$routeFounded = true;

					$class = "App\\Controllers\\".ucfirst($route['controller']);

					$controller = new $class;
					
					$action = $route['action'];

					$controller->$action();
					
					break;

				}

			}

			if (!$routeFounded) {

				require_once(ROOTDIRECTORY . "/../App/Views/fallback.php");
				return;

			}
		}

		protected function getUrl() {

			return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		}
	}

?>