
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/form.css">

    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>SETTINGS</title>
</head>
<body>
<div class="base-container">
    <?php include("navigation_bar.php") ?>
    <?php include("upper_navigation_bar_mobile.php") ?>
    <main>
        <left-bar>
            <?php include("settings.php") ?>
        </left-bar>
        <main-content>
            <form>
                <div class="title-label">NEW LOCATION</div>
                <input type="text" class="settings">
                <div class="title-label">NEW ACTIVITY</div>
                <input type="text" class="settings">

                <button>ADD TO DATABASE</button>
            </form>


        </main-content>
    </main>
    <?php include("navigation_bar_mobile.php") ?>
</div>
</body>