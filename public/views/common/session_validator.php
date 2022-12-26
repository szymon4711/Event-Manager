<?php

if (!isset($_SESSION['user_id'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/");
//    die();
    exit();
    // TODO exit or die?
}