<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Event.php';
require_once __DIR__.'/../models/Friend.php';
require_once __DIR__.'/../repository/FriendNotificationRepository.php';

class FriendNotificationController extends AppController
{
    private $friendNotificationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->friendNotificationRepository = new FriendNotificationRepository();
    }

    public function notices() {
        $events = $this->friendNotificationRepository->getNotifications();
        $this->render('notices', ['events' => $events]);
    }

    public function friends() {
        $friends = $this->friendNotificationRepository->getFriends();
        $this->render('friends', ['friends' => $friends]);
    }
}