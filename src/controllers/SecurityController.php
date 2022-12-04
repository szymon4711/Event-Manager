<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login() {
        $user = new User('sjura@gmail.com', 'haslo', 'Szymon', 'Yura');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        // TODO zamienic mail z username
        $email = $_POST["username"];
        $password = $_POST["password"];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exists!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        //return $this->render('events');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/events");
    }
}