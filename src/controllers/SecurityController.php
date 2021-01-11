<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        //Weryfikacja metody post/get
        if ( !$this->isPost() ){
            return $this->render('login');
        }

        //Przechwycenie danych z formularza logowania
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Wyszukanie użytkownika o danym adresie w bazie
        $user = $userRepository->getUser($email);

        //Sprawdzenie czy taki użytkownik istnieje
        if(!$user){
            return $this->render('login',['messages'=>['User dosn\'t exist']]);
        }

        //Sprawdzenie poprawność danych
        if ($user->getEmail() != $email){
            return $this->render('login',['messages'=>['User with this email dosn\'t exist']]);
        }
        if ($user->getPassword() != $password){
            return $this->render('login',['messages'=>['Wrong password!']]);
        }

        //Jezeli istnieje przejdz na strone home
        //return $this->render('home');     //Alternatywnie przejscie na strone home

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/home");
    }
}