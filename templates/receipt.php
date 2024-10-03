<?php include_once "../header.php"; 

    $shipping = $_POST['shipping'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $address = $_POST['address'];
    $shipping_price = $_POST['product_shipping'];
    $total_price = $_POST['product_total'];

    // session
    $product_img = $_SESSION['product-img'];
    $product_name = $_SESSION['product-name'];
    $product_size = $_SESSION['product-size'];
    $product_price = $_SESSION['product-price'];
    $product_qty = $_SESSION['product-qty'];

    $netPrice = $product_price * $product_qty;
    $order_date = date("Y-m-d h:i:sa");
    $fullname = $firstname.' '.$lastname;
    $fulladdress = $address.' '.$country.', '.$state.' '.$postcode;

    if(!isset($product_img) OR !isset($product_name) OR !isset($product_size) OR !isset($product_price) OR !isset($product_qty)) {
        header("Location: ../php/mem_index.php");
    }

?>

<!-- main content -->
    
    <main id="Receipt">
        <div class="go-back">
           <a href="../php/mem_index.php"><p><i class="fa-solid fa-angle-left"></i> Back to shopping</p></a> 
        </div>
        
        <div class="receipt-container">
            <h1>Your Order Confirmed!</h1>

            <div class="receipt-cust">
                <h4>Hello <?= $firstname ?>,</h4>
                <p>Your order has been confirmed and will be shipping within next two days.</p>
            </div>
    
            <div class="product-cust">
                <h5><?= date("F d, Y"); ?></h5>
                <div class="product-table-container">
                    <div class="product-table">
                        <div><img src="<?= $product_img ?>" alt="Kalamae"></div>
                        <h4><?= $product_qty ?></h4>
                        <div>
                            <p><?= $product_name ?></p>
                            <p>Size <?= $product_size ?></p>
                        </div>
                    </div>
                    
                    <h4>$<?= $product_price ?></h4>
                </div>
            </div>

            

            <div class="total-cust">
                <div>
                    <p class="head">Billed to:</p>

                    <div class="cust-address">
                        <span><?= $fullname ?></span><br>
                        <span><?= $address ?></span><br>
                        <span><?= $country.', '.$state.' '.$postcode ?></span>
                    </div>
                </div>

                <div class="cust-total-price">
                    <div class="cust-total-row">
                        <p class="left">Subtotal</p>
                        <p>$<?= number_format(($_SESSION['product-price']) * ($_SESSION['product-qty']) , 2)  ?></p>
                    </div>
                    <div class="cust-total-row">
                        <p class="left">Shipping</p>
                        <p>$<?= $shipping_price ?></p>
                    </div>
                    <div class="cust-total-row">
                        <p class="left">Total</p>
                        <b>$<?= $total_price ?></b>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            require_once "../config.php";

            $addOrderQuery = "Insert into tbl_order (product, price, qty, total, order_date, cust_name, cust_email, cust_address, shipping_id) values ('$product_name', '$product_price', '$product_qty', '$netPrice', '$order_date', '$fullname', '$email', '$fulladdress', '$shipping')";
            $result = mysqli_query($connect, $addOrderQuery);

            if(!$result) {
                die("Could not run the query $addOrderQuery".mysqli_error($connect));
            }

            unset($_SESSION['product-img']);
            unset($_SESSION['product_qty']);
            unset($_SESSION['product_name']);
            unset($_SESSION['product_size']);
            unset($_SESSION['product_price']);
        ?>
        <!-- <button class="return-btn">RETURN TO SHOP </button> -->
    </main>


<!-- font awesome (icon) -->
<script src="https://kit.fontawesome.com/012f1050b4.js" crossorigin="anonymous"></script>
</body>

</html>

<!-- https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_event_preventdefault -->