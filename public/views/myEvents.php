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
            <?php if (isset($events))
                foreach ($events as $event): ?>

                    <div id="<?= $event->getId() ?>">
                        <img src="<?= 'public/uploads/' . $event->getImage() ?>"
                             onerror=this.src="public/img/uploads/default.svg">
                        <div>
                            <p class="date"><?= $event->getDate() ?></p>
                            <h2><?= $event->getTitle() ?></h2>
                            <p class="description"><?= $event->getDescription() ?></p>
                            <div class="social-section">
                                <i class="fa-regular fa-circle-check"><?= $event->getLike() ?></i>
                                <i class="fa-regular fa-circle-question"><?= $event->getUncertain() ?></i>
                                <i class="fa-regular fa-circle-xmark"><?= $event->getDislike() ?></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </section>
    </main>
</div>
</body>