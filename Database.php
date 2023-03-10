<?php

require_once 'vendor/autoload.php';

class Database
{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct()
    {
        Dotenv\Dotenv::createImmutable(__DIR__)->load();

        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->host = $_ENV['DB_HOST'];
        $this->database = $_ENV['DB_NAME'];
    }

    public function connect()
    {
        try {
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}