<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/profile-style.css">
</head>

<body>
    <div class="main-container">
    
        <!-- LEFT-CONTAINER -->
        <div class="left-container container" style="margin-left: -70px;">
            <div class="menu-box block"> <!-- MENU BOX (LEFT-CONTAINER) -->
                <h2 class="titular" style="color:white">MENU BOX</h2>
                <ul class="menu-box-menu">
                    <li>
                        <a class="menu-box-tab" href="cart.php"><span
                                class="icon entypo-basket scnd-font-color"></span>Cart</a>
                        <div class="menu-box-number" style="color: white;"></div>
                    </li>
                    <li>
                        <a class="menu-box-tab" href="wishlist.php"><span
                                class="icon entypo-heart scnd-font-color"></span>Wishlist</a>
                        <div class="menu-box-number" style="color: white;"></div>
                    </li>
                    <li>
                        <a class="menu-box-tab" href="track-order.php" target="blank"><span
                                class="icon entypo-location scnd-font-color"></span>Track Order</a>
                    </li>
                    <li>
                        <a class="menu-box-tab" href="index.php"><span
                                class="icon entypo-home scnd-font-color"></span>Home Page</a>
                    </li>
                </ul>
            </div>
            <!-- MIDDLE-CONTAINER -->
            <div class="middle-container container" style="margin-left: 380px; margin-top: -380px;">
                <div class="profile block"> <!-- PROFILE (MIDDLE-CONTAINER) -->
                <div style="padding-top: 50px;"> </div>
                    <div class="profile-picture big-profile-picture clear" >
                        <img width="150px" alt="user-profile"
                            src="img/profile.png">
                    </div>
                    <h1 class="user-name">
                        <?php echo $_SESSION['name']; ?>
                    </h1>
                    <div class="profile-description">
                        <p class="scnd-font-color">Welcome To Kanku ! </p>
                    </div>
                    <a class="subscribe button" href="logout.php" style="color: white">LOG OUT</a>
                </div>
                <!-- RIGHT-CONTAINER -->
                <div class="right-container container" style="margin-left: 380px;  margin-top: -390px;">
                    <div class="join-newsletter block"> <!-- JOIN NEWSLETTER (RIGHT-CONTAINER) -->
                        <h2 class="titular">JOIN THE NEWSLETTER</h2>
                        <div class="input-container">
                            <input type="text" placeholder="yourname@gmail.com" class="email text-input">
                            <div class="input-icon envelope-icon-newsletter"><span
                                    class="fontawesome-envelope scnd-font-color"></span></div>
                        </div>
                        <a class="subscribe button" href="#21" style="color: white">SUBSCRIBE</a>
                    </div>
                </div> <!-- end right-container -->
            </div> <!-- end main-container -->
</body>

</html>