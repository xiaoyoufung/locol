<?php

    require_once "../config.php";

    $order_id = $_GET['id'];

    $pn = $_POST["product-name"];
    $cn = $_POST["cust-name"];
    $tt = $_POST["total"];

    $userQuery = "UPDATE tbl_order SET  product = '$pn',
                                        total = '$tt',
                                        cust_name = '$cn'
                    WHERE id = '$order_id' ";
    
    $result = mysqli_query($connect, $userQuery);

    if(!$result)
    {
        die ("Could not successful run the query $userQuery".mysqli_error($connect));
    }
    else
    {
        header("Location: order-detail.php");
    }

?>