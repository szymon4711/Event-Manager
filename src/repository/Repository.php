<?php


require_once __DIR__.'/../../Database.php';
class Repository
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    protected function executeDisplayEvents(false|PDOStatement $stmt, array $result): array
    {
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event) {
            $result[] = new Event(
                $event['title'],
                $event['description'],
                $event['image'],
                $event['date'],
                $event['like'],
                $event['dislike'],
                $event['uncertain'],
                $event['id']
            );
        }

        return $result;
    }
}