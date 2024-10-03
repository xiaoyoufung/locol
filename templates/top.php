<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>

    <div id="top-nav">
        <div class="main">
            <div><i class="fa-regular fa-bell"></i></div>

            <div><i class="fa-regular fa-comment-dots"></i></div>

            <div class="user">
                <div class="user-icon">
                    <div><i class=" fa-xs fa-solid fa-user"></i></div>
                </div>
                <h1><?= $_SESSION['username']; ?></h1>
            </div>
        </div>
    </div>

    <!-- font awesome (icon) -->
    <script src="https://kit.fontawesome.com/012f1050b4.js" crossorigin="anonymous"></script>
</body>
</html>