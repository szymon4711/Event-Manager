<?php

class Friend
{
    private $title;
    private $date;
    private $name;
    private $surname;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function __construct($title, $date, $name, $surname)
    {
        $this->title = $title;
        $this->date = $date;
        $this->name = $name;
        $this->surname = $surname;
    }


}