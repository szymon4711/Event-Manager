<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    /**
     * @throws Exception
     */
    public function getUser(string $username): ?User {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM public.users u LEFT JOIN user_details ud
                   ON u.id_user_details = ud.id WHERE username = :username'
        );
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("User not found");
        }

        return new User(
            $user['username'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }
}