<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login() {

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        try{
            $user = $userRepository->getUser($username);
        } catch (Exception $error) {
            return $this->render('login', ["messages" => [$error]]);
        }

        //TODO validate user function
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