<?php

class FriendNotificationRepository extends Repository
{
    public function getNotifications(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM events WHERE (id_assigned_by = :id OR id IN (SELECT id_event FROM users_events WHERE id_user = :id AND flag = true))
                       AND date_part(\'day\', age(date, current_date)) < 7 ORDER BY date;
'
        );
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        return $this->getArrayOfEvents($stmt, $result);
    }

    public function getFriends(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare(
            'SELECT e.id, e.title, e.date, ud.name, ud.surname FROM events e
                JOIN users_events ue ON e.id = ue.id_event 
                JOIN users u ON u.id = ue.id_user 
                JOIN user_details ud ON ud.id = u.id_user_details
                WHERE ue.id_user IN (SELECT get_friends(:id)) 
                  AND ue.flag = TRUE 
                  AND ue.id_event IN (SELECT id_event FROM users_events WHERE id_user = :id);'
        );
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        $friends = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($friends as $friend) {
            $result[] = new Friend(
                $friend['title'],
                $friend['date'],
                $friend['name'],
                $friend['surname'],
            );
        }
        return $result;
    }

    public function addFriends(string $uuid)
    {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO friends VALUES (?, ?)'
        );
        $stmt->execute([
            $_SESSION['user_id'],
            $this->getUserByUUID($uuid)
        ]);

    }

    private function getUserByUUID(string $uuid)
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM users WHERE uuid = :uuid'
        );
        $stmt->bindParam(':uuid', $uuid, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['id'];
    }
}