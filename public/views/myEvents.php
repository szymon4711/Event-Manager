<!DOCTYPE html>

<?php require('public/views/common/session_validator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/events.css">
    <title>My Events</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <div class="title-bar">
                <i class="fa-regular fa-heart"></i>
                MY EVENTS
            </div>
        </header>

        <section class="events">
            <?php require('public/views/common/displayEvents.php'); ?>
        </section>
    </main>
</div>
</body>