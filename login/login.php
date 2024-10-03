<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="sec-container">
            
            <div class="img-window"><img src="img/window.png" alt="Brown Solid" width="280"></div>
            <div class="img-one"><img src="img/10.png" alt="Boy infront Labtop" width="350"></div>
            <div class="img-two"><img src="img/12.png" alt="Brown Solid" width="120"></div>
            
        </div>
        <div class="sec-container">
            <div class="form-container">
                <div class="form">
                    <div class="header">
                        <h2>Sign in</h2>
                        <p class="registext">Don't have an account? <a href="register.php">Sign up</a></p>
                    </div>
                    
                    <form action="check-login.php" method="post">
                        <div class="input-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="input-text" required>
                        </div>
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="input-text" required>
                        </div>
                        <div class="logandpass">
                            <div><input type="checkbox"> Keep me logged in</div>
                            <div><a class="forgetpass" href="forgetpassword.php">Forget Password</a></div>
                        </div>

                        <span id="error">
                                <?php 
                                     if (isset($_SESSION['error_msg'])) {
                                        echo $_SESSION['error_msg'];
                                        unset($_SESSION['error_msg']);
                                    }
                                ?>
                        </span>

                        <div class="input-btn">
                            <button type="submit" name="login_user" class="btn">Login</button>
                        </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>

<!-- http://localhost/954142/group-project/timetablev.2/login.php -->