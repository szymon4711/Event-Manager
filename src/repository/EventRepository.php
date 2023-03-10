<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Event.php';

class EventRepository extends Repository
{
    public function addEvent(Event $event): void
    {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO events (title, description, id_assigned_by, date, image, location) 
                    VALUES (?, ?, ?, ?, ?, ?)'
        );

        $stmt->execute([
            $event->getTitle(),
            $event->getDescription(),
            $_SESSION['user_id'],
            $event->getDate(),
            $event->getImage(),
            $event->getLocation()
        ]);
    }

    public function getEvents(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM events ORDER BY date'
        );
        return $this->getArrayOfEvents($stmt, $result);
    }

    public function getMyEvents(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM events WHERE id_assigned_by = :id OR id IN (SELECT id_event FROM users_events WHERE id_user = :id AND flag = true) ORDER BY date'
        );
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        return $this->getArrayOfEvents($stmt, $result);
    }


    public function getEventByTitle(string $searchString): false|array
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM events WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search'
        );
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersEvents(): false|array
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT id_event FROM users_events WHERE id_user = :user_id'
        );
        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function like(int $id)
    {
        $stmt = $this->database->connect()->prepare(
            'UPDATE events SET "like" = "like" + 1 WHERE id = :id'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO users_events VALUES(:user_id, :id, true)'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function dislike(int $id)
    {
        $stmt = $this->database->connect()->prepare(
            'UPDATE events SET dislike = dislike + 1 WHERE id = :id'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO users_events VALUES(:user_id, :id)'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function uncertain(int $id)
    {
        $stmt = $this->database->connect()->prepare(
            'UPDATE events SET uncertain = uncertain + 1 WHERE id = :id'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO users_events VALUES(:user_id, :id)'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteEvent(int $id)
    {
        $stmt = $this->database->connect()->prepare(
            'DELETE FROM events WHERE id = :id'
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}