<?php

require_once 'AppController.php';

class EventController extends AppController
{
    public function addEvent() {
        $this->render('addEvent');

    }
}