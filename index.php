<?php

require 'Routing.php';
session_start();
//session_destroy();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('events', 'EventController');
Routing::get('myEvents', 'EventController');
Routing::get('notices', 'FriendNotificationController');
Routing::post('settings', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('addEvent', 'EventController');
Routing::post('register', 'SecurityController');
Routing::post('search', 'EventController');
Routing::post('checkEvents', 'EventController');
Routing::post('friends', 'FriendNotificationController');
Routing::get('like', 'EventController');
Routing::get('dislike', 'EventController');
Routing::get('uncertain', 'EventController');

Routing::run($path);