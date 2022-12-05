<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/events.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway"/>
    <script src="https://kit.fontawesome.com/8ca159327f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="public/img/favicon.png">
    <title>Events</title>
</head>

<body>
<div class="base-container">
    <nav>
        <img src="public/img/logo.svg">
        <ul>
            <li>
                <i class="fa-regular fa-calendar"></i>
                <a href="#" class="button">Events</a>
            </li>
            <li>
                <i class="fa-regular fa-heart"></i>
                <a href="#" class="button">My events</a>
            </li>
            <li>
                <i class="fa-regular fa-bell"></i>
                <a href="#" class="button">Notices</a>
            </li>
            <li>
                <i class="fa-solid fa-gear"></i>
                <a href="#" class="button">Settings</a>
            </li>
        </ul>

        <button class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </button>
    </nav>
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
                <button type="submit">Send</button>
            </form>
        </section>
    </main>
</div>


<script>
    const moblieNav = document.querySelector('ul');
    const burgerBtn = document.querySelector('.burger');

    burgerBtn.addEventListener('click', function () {
        moblieNav.classList.toggle('active');
        burgerBtn.classList.toggle('active');
    })
</script>
</body>