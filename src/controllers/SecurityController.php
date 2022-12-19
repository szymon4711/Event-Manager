<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login() {
        $user = new User('sjura', 'haslo', 'Szymon', 'Yura');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        // TODO zamienic mail z username
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with this username not exists!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        //return $this->render('events');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/events");
    }
}