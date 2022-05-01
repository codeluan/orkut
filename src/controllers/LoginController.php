<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class LoginController extends Controller {

   public function signin() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
             $flash = $_SESSION['flash'];
             $_SESSION['flash'] = '';
          }
       $this->render('login', [
            'flash' => $flash
       ]);
   }

   public function signinAction() {
     $email = addslashes(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING));
     $password = addslashes(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
     if($email && $password) {
          $token = UserHandler::verifyLogin($email, $password);
          if($token) {
               $_SESSION['token'] = $token;
               $this->redirect('/');
          } else {
               $_SESSION['flash'] = 'Email e ou senha não conferem.';
               $this->redirect('/login');
          }
     } else {
               $this->redirect('/login');
     }
   }

   public function signup() {
     $flash = '';
     if(!empty($_SESSION['flash'])) {
          $flash = $_SESSION['flash'];
          $_SESSION['flash'] = '';
       }
    $this->render('cadastro', [
         'flash' => $flash
    ]);
   }

     public function signupAction() {
          $name = addslashes(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
          $email = addslashes(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING));
          $password = addslashes(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
          $birthdate = addslashes(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING));

          if($name && $email && $password && $birthdate) {
               $birthdate = explode('/', $birthdate);
               if(count($birthdate) != 3) {
                    $_SESSION['flash'] = 'Data de nacimento inválida!';
                    $this->redirect('/cadastro');
               }
               
               $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
               if(strtotime($birthdate) === false) {
                    $_SESSION['flash'] = 'Data de nacimento inválida!';
                    $this->redirect('/cadastro');
               }

               if(UserHandler::emailExists($email) === false) {
                    $token = UserHandler::addUser($name, $email, $password, $birthdate);
                    $_SESSION['token'] = $token;
                    $this->redirect('/');
               } else {
                    $_SESSION['flash'] = 'E-mail já Cadastrado!';
                    $this->redirect('/cadastro');
               }

          } else {
               $this->redirect('/cadastro');
          }
     }

     public function logout() {
          $_SESSION['token'] = '';
          $this->redirect('/login');
     }


}