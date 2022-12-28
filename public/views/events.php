<!DOCTYPE html>

<?php require('public/views/common/session_validator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/events.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/stats.js" defer></script>
    <title>Events</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <div class="search-bar">
                <input class="search" type="text" placeholder="&#xf002;  search event">
            </div>

            <div class="add-event">
                <a href="addEvent">
                    <i class="fa-solid fa-plus"></i>
                    add event
                </a>
            </div>
        </header>

        <section class="events">
            <?php require('public/views/common/displayEvents.php'); ?>
        </section>
    </main>
</div>
</body>

<template id="event-template">
    <div id="">
        <img src="">
        <div>
            <p class="date">date</p>
            <h2>title</h2>
            <p class="description">description</p>
            <div class="social-section">
                <i class="fa-regular fa-circle-check"> 0</i>
                <i class="fa-regular fa-circle-question"> 0</i>
                <i class="fa-regular fa-circle-xmark"> 0</i>
            </div>
        </div>
    </div>
</template>