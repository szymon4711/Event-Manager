<!DOCTYPE html>

<?php require('public/views/common/session_validator.php') ?>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <title>Settings</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
    <main>
        <header>
            <div class="title-bar">
                <i class="fa-solid fa-lock"></i>
                ADMIN DELETE EVENTS
            </div>
        </header>

        <section class="settings">
            <div class="login-container">
                <form class="login" action="deleteEvent" method="POST">
                    <p></p>
                    <input name="id" type="text" placeholder="&#xf577;   id">
                    <p></p>
                    <p></p>
                    <button class="loginButton" type="submit">
                        <i class="fa-solid fa-trash-can"></i> &nbsp; Delete
                    </button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>