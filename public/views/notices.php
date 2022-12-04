<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/notices.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <script src="https://kit.fontawesome.com/8ca159327f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="public/img/favicon.png">
    <title>Notification</title>
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
                <div class="title-bar">
                    <i class="fa-regular fa-bell"></i>
                    NOTIFICATIONS
                </div>
            </header>

            <section class="notifications">
                <div id="notice-1">
                    <div>
                        <h2>NOTIFICATION</h2>
                        <p>description</p>
                    </div>
                </div>
                <div id="notice-2">
                    <div>
                        <h2>NOTIFICATION</h2>
                        <p>description</p>
                    </div>
                </div>
                <div id="notice-3">
                    <div>
                        <h2>NOTIFICATION</h2>
                        <p>description</p>
                    </div>
                </div>
                <div id="notice-4">
                    <div>
                        <h2>NOTIFICATION</h2>
                        <p>description</p>
                    </div>
                </div>
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