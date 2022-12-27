<?php

class FriendNotificationRepository extends Repository
{
    public function getNotifications() {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM events WHERE (id_assigned_by = :id OR id = (SELECT id_event FROM users_events where id_user = :id AND flag = true))
                       AND date_part(\'day\', age(date, current_date)) < 7 ORDER BY date;
'
        );
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);

        return $this->executeDisplayEvents($stmt, $result);
    }

    public function getFriends() {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            '
SELECT e.id, e.title, e.date, ud.name, ud.surname FROM events e JOIN users_events ue on e.id = ue.id_event join users u on u.id = ue.id_user join user_details ud on ud.id = u.id_user_details
         WHERE ue.id_user in (select get_friends(:id)) and ue.flag = true;'
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
}