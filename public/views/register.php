<!DOCTYPE html>

<head>
    <?php require('public/views/common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Register</title>
</head>

<body>
<div class="container">
    <div class="logo">
        <button class="home">
            <i class="fa-solid fa-house"></i>
            <a href="login">Home</a>
        </button>
        <img src="public/img/logo.svg">
    </div>
    <div class="login-container">
        <form class="register" action="register" method="POST">
            <div class="messages">
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="name" type="text" placeholder="&#xf007;   name">
            <input name="surname" type="text" placeholder="&#xf5b7;   surname">
            <input name="username" type="text" placeholder="&#xf507;   username">
            <input name="email" type="email" placeholder="&#xf0e0;   email">
            <input name="password" type="password" placeholder="&#xf023;   password">
            <input name="confirmedPassword" type="password" placeholder="&#xf023;   re-enter password">
            <p></p>
            <button class="loginButton" type="submit">
                <i class="fa-solid fa-arrow-right-to-bracket"></i> &nbsp; Register
            </button>
        </form>
    </div>
</div>
</body>