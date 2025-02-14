<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['products'] = array(
			'route' => '/products',
			'controller' => 'indexController',
			'action' => 'products'
		);

		$routes['product'] = array(
			'route' => '/product',
			'controller' => 'indexController',
			'action' => 'product'
		);

		$routes['admin'] = array(
			'route' => '/admin',
			'controller' => 'authController',
			'action' => 'showAdminLogin'
		);

		$routes['auth'] = array(
			'route' => '/auth',
			'controller' => 'authController',
			'action' => 'auth'
		);

		$routes['adminPage'] = array(
			'route' => '/adminPage',
			'controller' => 'adminController',
			'action' => 'adminPage'
		);

		$routes['lougout'] = array(
			'route' => '/logout',
			'controller' => 'authController',
			'action' => 'logout'
		);

		$routes['include'] = array(
			'route' => '/include',
			'controller' => 'adminController',
			'action' => 'include'
		);

		$routes['delete'] = array(
			'route' => '/delete',
			'controller' => 'adminController',
			'action' => 'delete'
		);

		$this->setRoutes($routes);
	}

}

?>