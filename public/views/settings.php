<!DOCTYPE html>

<?php require('public/views/common/sessionValidator.php') ?>

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
                <i class="fa-solid fa-gear"></i>
                SETTINGS
            </div>
        </header>

        <section class="settings">
            <div class="login-container">
                <form class="login" action="settings" method="POST">
                    <input name="name" type="text" placeholder="&#xf007;   name">
                    <input name="surname" type="text" placeholder="&#xf5b7;   surname">
                    <input name="username" type="text" placeholder="&#xf507;   username">
                    <input name="email" type="email" placeholder="&#xf0e0;   email">
                    <input name="password" type="password" placeholder="&#xf023;   password">
                    <input name="confirmedPassword" type="password" placeholder="&#xf023;   re-enter password">
                    <p></p>
                    <button class="loginButton" type="submit">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> &nbsp; Save
                    </button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>