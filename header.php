<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="../templates/index"><title>locol</title></a>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/detail.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <link rel="stylesheet" href="../css/receipt.css">
</head>
<body>
    
<!-- navigation bar -->
<nav>
    <div class="left">
        <h1 class="logo"><a href="../templates/index.php">locol</a></h1>
        <div class="left-nav">
            <a href="#Benefits">Categories</a>
            <a href="#Product">Product</a>
            <a href="#">Our Packages</a>
            <a href="#Footer">Contact Us</a>
        </div>
    </div>

    <?php if(isset($_SESSION['username'])) {
    echo '<div class="right">';
    echo    '<div class="menu">';
    echo        '<div class="heart-icon">';
    echo            '<i class="fa-2xs fa-regular fa-heart"></i>';
    echo            '<div class="notification">17</div>';
    echo        '</div>';

    echo        '<div class="cart-icon">';
    echo            '<img src="../img/Shopping-cart.svg" alt="Shopping-cart" width="12px">';
    echo            '<div class="notification">5</div>';
    echo        '</div>';

    echo        '<p>Hello, <span id="user-name">'.$_SESSION['username'].'</span></p>';
    echo        '<div class="user-icon"><a href="../login/logout.php">Logout</a></div>';
    echo    '</div>';
    echo '</div>';
    } else {
        echo '<a href="../login/login.php" class="sign-in" style="
        text-decoration: none;
        color: #4A503D;
        font-size: 10px;
        font-weight: 600;
        width: 40px;
    ">Sign In</a>';
        echo '<a href="../login/register.php"><button id="signup-btn" style="    background-color: #8E9775 !important;
        width: 76px;
        height: 30px;
        border-radius: 8px;">Sign Up</button></a>';
    }
echo "</nav>";

// main content
echo '<main>';

?>            
