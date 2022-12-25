<?php

class Event
{
    private $title;
    private $description;
    private $image;
    private $date;

    public function __construct($title, $description, $image, $date)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }



}