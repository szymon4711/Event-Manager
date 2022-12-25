<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Event.php';
require_once __DIR__.'/../repository/EventRepository.php';


class EventController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $eventRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
    }

    /**
     * @throws Exception
     */
    public function events() {
        $events = $this->eventRepository->getEvents();
        $this->render('events', ['events' => $events]);
    }

    public function addEvent() {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );


            $event = new Event($_POST['title'], $_POST['description'], $_FILES['file']['name'], $_POST['date']);
            $this->eventRepository->addEvent($event);

            // TODO after uploading the url is still 'addEvent'
            return $this->render('events', [
                'events' => $this->eventRepository->getEvents(),
                'messages' => $this->messages, 'event' => $event]);
        }

        return $this->render('addEvent', ['messages' => $this->messages]);
    }

    private function validate(array $file) : bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported.';
            return false;
        }

        return true;
    }
}