<!DOCTYPE html>

<?php require('public/views/common/sessionValidator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/events.css">
    <link rel="stylesheet" type="text/css" href="public/css/notices.css">
    <title>Friends</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <form action="addFriends" method="POST">
                <div class="search-bar">
                    <input name="friend" class="search" type="text" placeholder="&#xf234;  add a friend">
                </div>
                <button type="submit" class="add-event">
                    <i class="fa-solid fa-user-plus">Add</i>
                </button>
                <div class="add-event">
                    <i><?= $_SESSION['user_uuid'] ?></i>
                </div>
            </form>
        </header>

        <section class="notifications">
            <?php if (isset($friends))
                foreach ($friends as $friend): ?>
                    <div>
                        <div>
                            <h3><?= $friend->getName() . ' ' . $friend->getSurname() ?></h3>
                            <p>Your friend will be at the same event as you! Event title - '
                                <span style="font-weight: bold"><?= $friend->getTitle() ?></span>'
                                <span style="float: right"><?= $friend->getDate() ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
        </section>
    </main>
</div>
</body>