<!DOCTYPE html>

<?php require('public/views/common/session_validator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/notices.css">
    <title>Notification</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <div class="title-bar">
                <i class="fa-regular fa-bell"></i>
                NOTIFICATIONS
            </div>
        </header>

        <section class="notifications">
            <?php if (isset($events))
                foreach ($events as $event): ?>
                    <div>
                        <div>
                            <h3>NOTIFICATION</h3>
                            <p>The event with the title '<?=$event->getTitle() ?>' will take place in less than 7 days. You can't miss there!
                                <span style="float: right"><?=$event->getDate()?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
        </section>
    </main>
</div>
</body>