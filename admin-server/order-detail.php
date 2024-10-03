<html>
    <head>
        <title>Order Details</title>
        <link rel="stylesheet" href="deco.css">
        <link rel="stylesheet" href="../templates/menu.css">
    </head>
    <body>
        <?php include_once "../templates/top.php"; ?>
        <?php include_once "../templates/menu.html"; ?>

        <div class="full-page">
            <div class="nav">
                <h1>Order Details</h1>
                <br>
                <ul class="nav">
                    <li><b><a href="">All Orders</a></b></li>
                </ul>
            </div>
            <div class="main-content">
                <div class="wrapper">
                    <table class="tbl-full">
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <?php
                            require_once "../config.php";

                            //get the orders
                            $sql = "SELECT * FROM tbl_order";
                            //query
                            $res = mysqli_query($connect, $sql);
                            //count the rows
                            $count = mysqli_num_rows($res);

                            $sn = 1; //create a serial number and set its initial valua as 1

                            if($count>0)
                            {
                                //order available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    
                                    //get order details
                                    $id = $row["id"];
                                    $date = $row["order_date"];
                                    $product = $row["product"];
                                    $cust_name = $row["cust_name"];
                                    $total = $row["total"];
                                    ?>

                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $product; ?></td>
                                            <td><?php echo $cust_name; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td>
                                                <a href='edit-order.php?id=<?= $row['id']?>' class="update-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                            <td><?php echo "<a href='delete-page.php?id=".$row['id']."'>-</a>"; ?></td>
                                        </tr>

                                    <?php

                                }
                            }
                            else
                            {
                                //order not availale
                                echo "<tr><td colspan='12' class='error'>Orders not Availale</td></tr>";
                            }
                        ?>
                </div>
            </div>
        </div>

        <!-- font awesome (icon) -->
        <script src="https://kit.fontawesome.com/012f1050b4.js" crossorigin="anonymous"></script>
    </body>
</html>