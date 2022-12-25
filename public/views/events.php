<!DOCTYPE html>

<head>
    <?php require('public/views/common/head.php'); ?>
    <title>Events</title>
</head>

<body>
<div class="base-container">
    <?php require('public/views/common/navbar.php'); ?>
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

        <section class="events">
            <?php foreach ($events as $event): ?>
            <div id="event-1">
                <img src="<?='public/uploads/'.$event->getImage() ?>" onerror=this.src="public/img/uploads/default.svg">
                <div>
                    <p><?= $event->getDate() ?></p>
                    <h2><?= $event->getTitle() ?></h2>
                    <p><?= $event->getDescription() ?></p>
                    <div class="social-section">
                        <i class="fa-regular fa-circle-check"> 600</i>
                        <i class="fa-regular fa-circle-question"> 600</i>
                        <i class="fa-regular fa-circle-xmark"> 600</i>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </main>
</div>
</body>