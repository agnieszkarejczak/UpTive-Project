<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        //$this->userRepository = new UserRepository();
    }
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

        //TODO Checking role of user + maybe assign cookie somewhere else
        $cookie_name = 'user';
        $cookie_value = $_POST["email"];
        setcookie($cookie_name, $cookie_value, time() + 3600*24*30, '/'); //expires after 30 day


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/home");
    }

    public function logout(){
        if(isset($_COOKIE['user'])){
            setcookie('user', "", time() - 3600, '/');
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/login");

    }
    public function signup(){

        //Weryfikacja metody post/get
        if ( !$this->isPost() ){
            return $this->render('login');
        }

        //Przechwycenie danych z formularza logowania
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $rpassword = $_POST["rpassword"];

        $userRepository = new UserRepository();
        //Check if there is some user with this email already; if no user=null
        $user = $userRepository->getUser($email);
        if($user!=null){
            return $this->render('login',['messages'=>['User with this email already exists'],'signup'=>["true"]]);
        }
        if($password!=$rpassword){
            return $this->render('login',['messages'=>['Passwords must match'],'signup'=>["true"]]);
        }

        //After everything was properly written
        //TODO add user to database
        //TODO zahaszuj hasło
        $userRepository->addUser([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password
        ]);

        $cookie_name = 'user';
        $cookie_value = $_POST["email"];
        setcookie($cookie_name, $cookie_value, time() + 3600*24*30, '/'); //expires after 30 day

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/home");

    }
}