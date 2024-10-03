<?php

require_once "../config.php";

$order_id = $_GET['id']; // get id from an update link
$userQuery = "select * from tbl_order where id = '$order_id' ";
$result = mysqli_query($connect, $userQuery);

if(!$result) {
    die("Could not successfully run the query $userquery".mysqli_error($connect));
}
 else {
    while($row = mysqli_fetch_assoc($result)) {
?>

<html>
    <head>
        <title>Edit Orders</title>
        <link rel="stylesheet" href="deco.css">
        <link rel="stylesheet" href="../templates/menu.css">
    </head>
    <body>

        <?php include_once "../templates/top.php"; ?>
        <?php include_once "../templates/menu.html"; ?>


        <div class="whole-page">
            <div class="line">
                <h1>Edit Order</h1>
                <br>
                <ul class="nav">
                    <li><b><a href="order-detail.php">Overview</a></b></li>
                    <li><b><a href="edit-page.php">Edit Page</a></b></li>
                </ul>
            </div>
            
            <!-- main content -->
            <form action="update-page.php?id=<?= $order_id ?>" method="post">
                <div class="form">
                    <div class="left">
                        <h4>Product Name</h4>
                        <input type="text" name="product-name" value="<?= $row['product']?>">
                        <p>Do not exceed 20 characters when entering the product name.</p>

                        <h4>Customer Name</h4>
                        <input type="text" name="cust-name" value="<?= $row['cust_name']?>">

                        <h4>Total amout</h4>
                        <input type="text" name="total" value="<?= $row['total']?>">
                        <p>Do not exceed 100 characters when entering the product name.</p>
                        <br>
                        <div class="btn-container">
                            <input class="button1" type="submit" value="Save Product">
                            <!--<input class="button2" type="submit" value="Delete Product">-->
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </body>
</html>

<?php

    }
}
?>