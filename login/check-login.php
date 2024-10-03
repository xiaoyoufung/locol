<?php 
    session_start();
    include_once "../config.php";

    $userQuery = "select * from tbl_user where username like'".$_POST['username']."'";

    $result = mysqli_query($connect, $userQuery);

    if(!$result) {
        die("ERROR: Can't successfully run the query $userQuery".mysqli_error($connect));
    }
    if(mysqli_num_rows($result) == 0) {
        $_SESSION['error_msg'] = "Username or Password is incorrect.";
        header("Location: login.php");
    } else {
        $row = mysqli_fetch_assoc($result);

        if( ($_POST['username'] == $row['username']) && ($_POST['password'] == $row['password'])) {
            $_SESSION['username'] = $row['username'];

            if($row['level'] == 1) {
                header("Location: ../php/mem_index.php");
            } elseif( $row['level'] == 4) {
                header("Location: ../admin-server/order-detail.php");
            } else {
                $_SESSION['error_msg'] = "User not found, please try again.";
                header("Location: ../login/login.php");
            }
            
        } else {
            $_SESSION['error_msg'] = "Username or Password is incorrect.";
            header("Location: login.php");
        }
    }
?>
