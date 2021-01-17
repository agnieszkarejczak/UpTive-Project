<?php
if(!isset($_COOKIE['user'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
    exit();
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/profile.css">
    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>PROFILE PAGE</title>
</head>
<body>
<div class="base-container">
    <nav-bar>
        <!-- miejsce na home, search,friends ikonki img profilowe-->
        <div class="logo">
            <!--TODO Area for logo svg image-->
            <!--Temporarily-->
            UpTive
        </div>
        <a href="#" class="button">
            <div class="add-activity">
                <i class="fas fa-plus-circle"></i>
                ADD ACTIVITY
            </div>
        </a>
        <div class="navi">
            <a href="http://localhost:8080/home" class="button">
                HOME
            </a>
        </div>
        <div class="navi">
            <a href="http://localhost:8080/search" class="button">
                SEARCH
            </a>
        </div>
        <div class="navi">FRIENDS</div>
        <div class="navi-icons">
            <i class="fas fa-cog"></i>
            <i class="far fa-bell" ></i>
            <form id ="logout" action="logout" method="GET">
                <button >
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>

        </div>

        <div class="avatar-container">
            <a href="#" class="button">
                <div class="avatar">
                    <img src="public/img/basic.jpg" alt="Avatar">
                </div>
            </a>
            <br><br><br>
            Name Surname
        </div>


    </nav-bar>
    <upper-bar-mobile>
        <div class="logo">UpTive</div>
        <div class="upper-bar-lower">
            <i class="fas fa-bars"></i>
            <div class="add-activity">
                <i class="fas fa-plus-circle"></i>
                ADD ACTIVITY
            </div>
            <i class="fas fa-ellipsis-v"></i>

        </div>
    </upper-bar-mobile>
    <main>

        <left-bar>
            <div class="title-label">CALENDAR</div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>

        </left-bar>
        <main-content-profile>
            <left-main>

                <div class="avatar-profile">
                    <img src="public/img/avatars/<?= $user->getAvatar()?>.jpg" alt="Avatar">
                </div>
                <br>
                <h><?= $user->getName() ." ".$user->getSurname()?></h>
                <div class="socials">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-snapchat-ghost"></i>
                </div>
                <div class="title-label">BIO</div>
                <div class="bio-text">
                    <?= $user->getBio()?>

                </div>

                <div class="title-label">CURRENT ACTIVITIES</div>
                <div class="events-container">
                    <i class="fas fa-chevron-left"></i>
                    <?php foreach ($events as $event):?>

                    <div class="event">
                        <div class="avatars-container">
                            <div class="number"></div>
                            <?php foreach ($event['participants'] as $participant):?>
                                <div class="avatar_event">
                                    <img src="public/img/avatars/<?= $participant->getAvatar() ?>.jpg" alt="Avatar">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <ul>
                            <li><i class="fas fa-swimmer"></i><?= $event['event']->getActivity() ?></li>
                            <li><i class="fas fa-map-marker-alt"></i><?= $event['event']->getLocation() ?></li>
                            <li> <i class="far fa-calendar-alt"></i><?= $event['event']->getDate() ?></li>
                            <li><i class="far fa-clock"></i><?= $event['event']->getTime() ?></li>
                        </ul>
                        <div class="status">Waiting for response</div>
                        <div class="icons">
                            <i class="far fa-edit"></i>
                            <i class="far fa-comment-alt"></i>
                            <i class="fas fa-ellipsis-h"></i>
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </left-main>
            <right-main>
                <div class="title-label">ACTIVITIES</div>
                <?php foreach ($activities as $activity):?>
                    <div class="activity-container">
                        <i class="fas fa-swimmer"></i>
                        <div class="activity">
                            <?= $activity ?>
                        </div>
                        <div class="activity-level"></div>
                    </div>
                <?php endforeach; ?>
                    <!--<i class="fas fa-plus-square"></i>-->
                <div class="title-label">ACHIEVEMENTS</div>
                <?php foreach ($achievements as $achievement):?>
                    <div class="achievement-container">
                        <div class="achievement-text-container">
                            <div class="achievement-title"><?= $achievement->getTitle() ?></div>
                            <div class="achievement-text">
                                <?= $achievement->getText() ?>
                            </div>

                        </div>
                        <div class="avatar">
                            <img src="public/img/achievements/<?= $achievement->getImg() ?>.jpg" alt="Avatar">
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--<i class="fas fa-plus-square"></i>-->
            </right-main>
        </main-content-profile>


    </main>
    <nav-bar-mobile>
        <div class="icon-container-mobile">
            <i class="far fa-bell"></i>
            <h>NOTIFS</h>
        </div>
        <div class="icon-container-mobile">
            <i class="fas fa-home"></i>
            <h>HOME</h>
        </div>
        <div class="icon-container-mobile">
            <i class="far fa-calendar-alt"></i>
            <h>CALENDAR</h>
        </div>
        <div class="icon-container-mobile">
            <i class="fas fa-search"></i>
            <h>SEARCH</h>
        </div>
        <div class="icon-container-mobile">
            <i class="fas fa-users"></i>
            <h>FRIENDS</h>
        </div>
        <div class="avatar">
            <img src="public/img/basic.jpg" alt="Avatar">
        </div>

    </nav-bar-mobile>

</div>
</body>