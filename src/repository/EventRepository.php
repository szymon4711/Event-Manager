<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Event.php';
class EventRepository extends Repository
{
    /**
     * @throws Exception
     */
    public function getEvent(int $id): ?Event {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM public.events WHERE id = :id'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$event) {
            throw new Exception("Event not found");
        }

        return new Event(
            $event['title'],
            $event['description'],
            $event['image'],
            $event['date']
        );
    }

    public function addEvent(Event $event): void
    {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO events (title, description, id_assigned_by, date, image)  
                    VALUES (?, ?, ?, ?, ?)'
        );

        $stmt->execute([
            $event->getTitle(),
            $event->getDescription(),
            $_SESSION['user_id'],
            $event->getDate(),
            $event->getImage()
        ]);
    }

    public function getEvents(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM events ORDER BY date'
        );
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

    public function getEventByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM events WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function like(int $id) {
        $stmt = $this->database->connect()->prepare(
            'UPDATE events SET "like" = "like" + 1 WHERE id = :id');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function dislike(int $id) {
        $stmt = $this->database->connect()->prepare(
            'UPDATE events SET dislike = dislike + 1 WHERE id = :id');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function uncertain(int $id) {
        $stmt = $this->database->connect()->prepare(
            'UPDATE events SET uncertain = uncertain + 1 WHERE id = :id');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}