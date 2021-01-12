<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); // trim pozwala pozbyć się / ze zmiennej globalnej $_SERVER
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('home','DefaultController');
Routing::get('profile','DefaultController');
Routing::get('addActivity','DefaultController');
Routing::get('search','EventController');
Routing::post('login','SecurityController');
Routing::post('signup','SecurityController');
Routing::post('addEvent','EventController');

Routing::run($path);



