<?php
    require_once "config.php";
    $errors = array();
    include "../header.php";

    $level = $_POST['level'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password_1'];
    $password2 = $_POST['password_2'];
    $check = "SELECT  username FROM tbl_user  WHERE username = '$username' ";
    $result1 = mysqli_query($connect, $check) or die(mysqli_error());
    $num = mysqli_num_rows($result1);

       if($num > 0){
    }
    else {

    if($password == $password2) {
        $sql = "INSERT INTO tbl_user
	            (username ,password , email, level)
	            VALUES
	            ('$username' ,'$password' ,'$email', '$level')";

	$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());

    if($result1) { 
	    header("location: login.php");   
	} else {
	    echo "<a href= register.php>Try again</a> ";
    }

    } else {
        $_SESSION['error_msg'] = "Password doesn't match, please try again";
        header("Location: ../login/register.php");
    }
	
    }
	mysqli_close($connect);


?>