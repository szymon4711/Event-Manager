<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <script src="https://kit.fontawesome.com/8ca159327f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="public/img/favicon.png">
    <title>Login page</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <button class="home">
                <i class="fa-solid fa-house"></i> Home
            </button>
            <img src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <input name="username" type="text" placeholder="&#xf007;   username">
                <input name="password" type="password" placeholder="&#xf023;   password">
                <button class="loginButton" type="submit">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> &nbsp; login
                </button>
            </form>
        </div>
    </div>
</body>