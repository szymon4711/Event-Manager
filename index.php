<?php

require 'Routing.php';
session_start();
//session_destroy();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('like', 'EventController');
Routing::get('events', 'EventController');
Routing::get('dislike', 'EventController');
Routing::get('myEvents', 'EventController');
Routing::get('uncertain', 'EventController');
Routing::get('notices', 'FriendNotificationController');

Routing::post('admin', 'EventController');
Routing::post('search', 'EventController');
Routing::post('login', 'SecurityController');
Routing::post('addEvent', 'EventController');
Routing::post('logout', 'SecurityController');
Routing::post('settings', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('checkEvents', 'EventController');
Routing::post('deleteEvent', 'EventController');
Routing::post('friends', 'FriendNotificationController');
Routing::post('addFriends', 'FriendNotificationController');

Routing::run($path);