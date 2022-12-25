<!DOCTYPE html>

<?php require('public/views/common/session_validator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <title>Events</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <div class="search-bar">
                <form>
                    <input type="text" placeholder="&#xf002;  search event">
                </form>
            </div>

            <div class="add-event">
                <i class="fa-solid fa-plus"></i>
                add event
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
                <input type="file" name="file">
                <input type="date" name="date">
                <button class="add-event" type="submit">Send</button>
            </form>
        </section>
    </main>
</div>

</body>