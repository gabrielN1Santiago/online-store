<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class AuthController extends Action {

        public function showAdminLogin() {

            $this->view->route = "/admin";
            $this->render('showAdminLogin');

        }

        public function auth() {

            $user = Container::getModel('User');

            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');


            $user->__set('email', $email);
            $user->__set('password', $password);

            $user->autenticar();

            if ($user->__get('id') != '' && $user->__get('email') != '') {

                session_start();

                $_SESSION['id'] = $user->__get('id');
                $_SESSION['email'] = $user->email;

                header('Location: /adminPage');

            }else{

                header('Location: /admin?erro=Email ou senha incorretos.');

            }

        }

        public function logout() {

            session_start();
            session_destroy();
            header('Location: /admin');

        }

    }

?>
