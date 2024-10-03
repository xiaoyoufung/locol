<html>
    <head>
        <!--<title>Edit Products</title>-->
        <link rel="stylesheet" href="deco.css">
        <link rel="stylesheet" href="../templates/menu.css">
    </head>
    <body>

        <?php include_once "../templates/top.html"; ?>
        <?php include_once "../templates/menu.html"; ?>

            <?php

            require_once "../config.php";

            $order_id = $_GET['id'];
            $userQuery = "DELETE FROM tbl_order WHERE id = '$order_id'";
            $result = mysqli_query($connect, $userQuery);

            if(!$result) 
            {
                die("Could not successfully run the query $userquery".mysqli_error($connect));
            } 
            else 
            {
                header("Location: order-detail.php");
            }

            ?>

    </body>
</html>