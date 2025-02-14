<?php

    namespace App\Models;

    use MF\Model\Model;

    class User extends Model{

        private $id;
        private $email;
        private $password;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            return $this->$atributo = $valor;
        }


        public function getUsuarioPorEmail(){
            $query = 'SELECT email FROM user where email = :email';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':email', $this->email);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function autenticar(){
            
            $query = 'SELECT id, email FROM user WHERE email = :email AND password = :password';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':email', $this->__get('email'));

            $stmt->bindValue(':password', md5($this->password));

            $stmt->execute();

            $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($usuario['id'] != '' and $usuario['email'] != '') {
                $this->__set('email',$usuario['email']);
                $this->__set('id',$usuario['id']);
            }

            return $this;
        }


    }


?>