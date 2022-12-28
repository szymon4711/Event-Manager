<nav>
    <img src="public/img/logo.svg">
    <ul>
        <li>
            <i class="fa-regular fa-user"></i>
            <a class="button">
                <?=$_SESSION['user_details']?>
            </a>
        </li>
        <li>
            <i class="fa-regular fa-calendar"></i>
            <a href="events" class="button">Events</a>
        </li>
        <li>
            <i class="fa-regular fa-heart"></i>
            <a href="myEvents" class="button">My events</a>
        </li>
        <li>
            <i class="fa-regular fa-bell"></i>
            <a href="notices" class="button">Notices</a>
        </li>
        <li>
            <i class="fa-solid fa-user-group"></i>
            <a href="friends" class="button">Friends</a>
        </li>
        <li>
            <i class="fa-solid fa-gear"></i>
            <a href="settings" class="button">Settings</a>
        </li>
        <?php if ($_SESSION['admin']) { ?>
            <li>
                <i class="fa-solid fa-lock"></i>
                <a href="admin" class="button">Admin</a>
            </li>
        <?php } ?>
        <li>
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <a href="logout" class="button">Logout</a>
        </li>
    </ul>

    <button class="burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </button>
</nav>

<style>
    li > .fa-solid, li > .fa-regular {
        width: 25px;
        height: 25px;
    }
</style>

