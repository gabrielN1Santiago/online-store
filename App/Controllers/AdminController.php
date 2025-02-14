<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class AdminController extends Action {

        public function __construct() {
            $this->view = new \stdClass();
            session_start();

        }

        public function adminPage() {


            if($this->isLoggedin()){
                header('Location: /admin?erro=Faça login para entrar');
                exit;
            }

            $this->view->route = "/adminPage";

            $this->render('adminPage');

        }

        public function include() {

            if ($this->isLoggedin()) {
                echo json_encode(['status' => 'error', 'message' => 'Faça login para incluir!']);
                exit;
            }

            $product = Container::getModel('Product');
            $product->name = filter_input(INPUT_POST, 'name');
            $product->category = filter_input(INPUT_POST, 'category');
            $product->price = filter_input(INPUT_POST, 'price');
            $product->description = filter_input(INPUT_POST, 'description');

            if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
                $image = $_FILES["image"];
                $imageName = $product->generateImageName();
                $uploadPath = ROOTDIRECTORY . "/images/" . $imageName;
        
                if (move_uploaded_file($image["tmp_name"], $uploadPath)) {
                    $product->image = $imageName;
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar a imagem']);
                    exit;
                }
            }

            $product->includeProduct();

            echo json_encode(['status' => 'success', 'message' => 'Produto incluído com sucesso!']);
            exit;

        }

        public function delete(){

            if ($this->isLoggedin()) {
                header('Location: /admin?erro=Faça login!');
                exit;
            }

            $id = $_GET['id'];

            $product = Container::getModel('Product');

            $productData = $product->getProductById($id);

            if ($productData && isset($productData['image'])) {

                $imagePath = ROOTDIRECTORY . "/images/" . $productData['image'];

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $product->deleteProduct($id);
        
            header("Location: /products");
        }
        
        public function isLoggedin(){

            return !isset($_SESSION['id']);

        }
    }

?>