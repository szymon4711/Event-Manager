<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function logout() {
        session_destroy();
        return $this->render('login', ['messages' => ['You have been logged out successfully']]);
    }

    public function login() {

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        try{
            $user = $this->userRepository->getUser($username);
        } catch (Exception $error) {
            return $this->render('login', ["messages" => [$error->getMessage()]]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $_SESSION['user_id'] = $this->userRepository->getId();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/events");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $email = $_POST['email'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        if (password_needs_rehash($hashedPassword, PASSWORD_BCRYPT))
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $user = new User($username, $hashedPassword, $name, $surname);
        $user->setEmail($email);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been successfully registered!']]);
    }
}