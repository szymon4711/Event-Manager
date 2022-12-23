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
            <div id="event-1">
                <!-- TODO check if $event exists -->
                <img src="<?= $event->getImage() ? 'public/uploads/' . $event->getImage() : 'public/img/uploads' ?>">
                <div>
                    <h2><?= $event->getTitle() ?></h2>
                    <p><?= $event->getDescription() ?></p>
                    <div class="social-section">
                        <i class="fa-regular fa-circle-check"> 600</i>
                        <i class="fa-regular fa-circle-question"> 600</i>
                        <i class="fa-regular fa-circle-xmark"> 600</i>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>