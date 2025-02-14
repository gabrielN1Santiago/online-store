<?php

    namespace App\Models;

    use MF\Model\Model;

    class Product extends Model{

        private $id;
        private $name;
        private $category;
        private $image;
        private $description;
        private $price;



        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            return $this->$atributo = $valor;
        }

        public function FindAllProducts(){

            $query = 'SELECT * FROM products';

            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);

        }

        public function findAProduct($id){

            $query = 'SELECT * FROM products where id = :id';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(":id", $id);

            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_OBJ);

        }

        public function includeProduct() {

            $query = 'INSERT INTO products (name, category, image, description, price) 
                      VALUES (:name, :category, :image, :description, :price)';
        
            $stmt = $this->db->prepare($query);
        
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':category', $this->category);
            $stmt->bindValue(':image', $this->image);
            $stmt->bindValue(':description', $this->description);
            $stmt->bindValue(':price', $this->price);
        
            $stmt->execute();

        }

        public function generateImageName() {

            return bin2hex(random_bytes(60)) . ".jpg";

        }

        public function getProductById($id) {

            $query = "SELECT * FROM products WHERE id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(":id", $id);

            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function getProductsByCategory($category) {

            $query = 'SELECT * FROM products WHERE category = :category';
        
            $stmt = $this->db->prepare($query);
        
            $stmt->bindValue(':category', $category);
        
            $stmt->execute();
        
            return $stmt->fetchAll(\PDO::FETCH_OBJ);

        }

        public function deleteProduct($id){

            $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");

            $stmt->bindValue(":id", $id);

            $stmt->execute();

        }

    }

?>