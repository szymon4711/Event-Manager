<?php

require 'Routing.php';
session_start();
//session_destroy();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('events', 'EventController');
Routing::get('myEvents', 'DefaultController');
Routing::get('notices', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addEvent', 'EventController');
Routing::post('register', 'SecurityController');
Routing::post('search', 'EventController');

Routing::run($path);