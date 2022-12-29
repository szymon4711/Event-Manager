<!DOCTYPE html>

<?php require('public/views/common/sessionValidator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/events.css">
    <title>Events</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <div class="title-bar">
                <i class="fa-solid fa-plus"></i>
                ADD EVENT
            </div>
        </header>

        <section class="events-form">
            <h1>UPLOAD</h1>
            <form action="addEvent" method="POST" enctype="multipart/form-data">

                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>

                <input type="text" name="title" placeholder="title">
                <textarea name="description" rows="5" placeholder="description"></textarea>
                <input type="text" name="location" placeholder="location">
                <input type="file" name="file">
                <input type="date" name="date">
                <button class="add-event" type="submit">Send</button>
            </form>
        </section>
    </main>
</div>
</body>