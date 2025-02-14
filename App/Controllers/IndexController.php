<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		$this->view->route = "/";


		$this->render('index');
	}

	public function contact() {

		$this->view->route = "/contact";

		$this->render('contact');
	}


	public function products() {

		$this->view->route = "/products";

		$product = Container::getModel('Product');

		$this->view->products = $product->FindAllProducts();

		$this->render('products');
	}

	public function product(){
		$id = $_GET['id'];

		$product = Container::getModel('Product');

		$this->view->product = $product->getProductById($id);

		$this->render('product');
	}

}


?>