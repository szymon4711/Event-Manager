<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index(){
        $this->render('login');
    }

    public function events() {
        $this->render('events');
    }

    public function myEvents() {
        $this->render('myEvents');
    }

    public function notices() {
        $this->render('notices');
    }

    public function settings() {
        $this->render('settings');
    }

    public function addEvent() {
        $this->render('addEvent');
    }

}