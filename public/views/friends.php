<!DOCTYPE html>

<?php require('public/views/common/session_validator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/notices.css">
    <title>Friends</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <div class="title-bar">
                <i class="fa-regular fa-bell"></i>
                FRIENDS
            </div>
        </header>

        <section class="notifications">
            <?php if (isset($friends))
                foreach ($friends as $friend): ?>
                    <div>
                        <div>
                            <h3><?=$friend->getName().' '.$friend->getSurname() ?></h3>
                            <p>Your friend will be at the same event as you! Event title - '<span style="font-weight: bold"><?=$friend->getTitle() ?></span>'
                                <span style="float: right"><?=$friend->getDate()?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
        </section>
    </main>
</div>
</body>