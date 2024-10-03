<?php
    include_once "../header.php";

    $qty = $_POST['hide-qty'];
    $price = $_POST['hide-price'];
    $size = $_POST['hide-size'];

    $_SESSION['product-qty'] = $qty;
    $_SESSION['product-price'] = $price;
    $_SESSION['product-size'] = $size;

    include_once "../config.php";

    $shipQuery = "select * from tbl_shipping where id = '1' ";

    $ship1 = mysqli_query($connect, $shipQuery);
    
    if(!$ship1) {
        die("Could not succesfully run the query $shipQuery".mysqli_error($connect));
    }

    if(mysqli_num_rows($ship1) == 0) {
        echo "No records were found with query $shipQuery";
    } else {
?>

<!-- main content -->
<form action="receipt.php" id="checkout" method="post">
    <div class="left">
        <div class="product">
            <h3>Summary Order</h3>
            <p class="summary-des">Check your item and select your shipping for better
                experience order item.</p>
            <div class="display-product">
                <div class="product-img"><img src="<?= $_SESSION['product-img']; ?>" alt="Kalamae"></div>
                <div class="product-description">
                    <div class="top">
                        <h5><?= $_SESSION['product-name']; ?></h5>
                        <h5>$<?= $price ?></h5>
                    </div>
                    <p>Quantity: <?= $qty?></p>
                    <p>Size: <?= $size ?></p>
                </div>
            </div>
        </div>

        <div class="shipping">
            <div>
                <h3>Available Shipping Method <i class=" fa-xs fa-solid fa-circle-info"></i></h3>
                <div id="thaipost">
                <?php while( $shipOne = mysqli_fetch_assoc($ship1)) { ?>
                    <?php $shipOnePrice = $shipOne['price'] ?>
                    <div class="thaipost-left">
                        <div><img src="<?= $shipOne['image_name'] ?>" alt="thaipost-logo"></div>
                        <div class="des">
                            <b><?= $shipOne['title'] ?></b>
                            <p>Delivery: <?= $shipOne['delivery'] ?></p>
                        </div>
                    </div>
                    <div class="option">
                        <label for="local-shipping">$<?= $shipOnePrice ?></label>
                        <input type="radio" name="shipping" value="<?= $shipOne['id'] ?>">
                    </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <?php $ship2Query = "select * from tbl_shipping where id = '2' ";

                $ship2 = mysqli_query($connect, $ship2Query);

                if(!$ship2) {
                    die("Could not succesfully run the query $ship2Query".mysqli_error($connect));
                }

                if(mysqli_num_rows($ship2) == 0) {
                    echo "No records were found with query $ship2Query";
                } else { ?>
            <div class="international">
                <?php while( $shipTwo = mysqli_fetch_assoc($ship2)) { ?>
                <p>Available International Shipping:</p>
                <div id="thaipost">
                    <div class="thaipost-left">
                        <div><img src="<?= $shipTwo['image_name'] ?>" alt="thaipost-logo"></div>
                        <div class="des">
                            <b><?= $shipTwo['title'] ?></b>
                            <p>Delivery: <?= $shipTwo['delivery'] ?></p>
                        </div>
                    </div>
                    <div class="option">
                        <label for="local-shipping">$<?= $shipTwo['price'] ?></label>
                        <?php $shipTwoPrice = $shipTwo['price'];?>
                        <input type="radio" name="shipping" value="<?= $shipTwo['id'] ?> " required>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="right">
        <div class="first">
            <h3>Delivery Details</h3>
            <p>Complete your purchase item by providing your
                payment details order.</p>
        </div>

        <div class="col">
            <h5>Your basic information</h5>
            <div class="cust-name">
                <input type="text" name="firstname" placeholder="First Name" required>
                <input type="text" name="lastname" placeholder="Last Name" required>
            </div>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
        </div>

        <div class=" col">
            <h5>Delivery Address</h5>
            <input type="text" name="address" placeholder="Address" required>
            <div class="cust-name address">
                <input type="text" name="country" placeholder="Country" required>
                <input type="text" name="state" placeholder="State" required>
                <input type="text" name="postcode" placeholder="Post code" required>
            </div>
        </div>

        <div class="display-total">
            <div class="cust-name">
                <p>Subtotal <i class="fa-solid fa-circle-info"></i></p>
                <p id="show-sub">$ 395.50</p>
            </div>

            <div class="cust-name">
                <p>Delivery Fee</p>
                <p id="show-deli-fee">$ 17.00</p>
            </div>

            <div class="cust-name">
                <b>Total</b>
                <b id="show-total">$ 398.89</b>
            </div>
        </div>

        <input type="hidden" name="product_shipping" id="hide_shipping">
        <input type="hidden" name="product_total" id="hide_total">

        <button name="submit-btn" id="submit-btn" class="submit-btn" type="submit">Pay $337</button>
    </div>
</form>


<!-- font awesome (icon) -->
<script src="https://kit.fontawesome.com/012f1050b4.js" crossorigin="anonymous"></script>

<script>
    const shipping = document.querySelector('.shipping');
    const showSubtotal = document.getElementById('show-sub');
    const showDeliveryFee = document.getElementById('show-deli-fee');
    const showTotal = document.getElementById('show-total');
    const submitBtn = document.getElementById('submit-btn');
    const hideShip = document.getElementById('hide_shipping');
    const hideTotal = document.getElementById('hide_total');

    let qty = Number (<?= $qty ?>);
    let price = Number (<?= $price ?>);
    let shippingCost = 0;
    let prevBtn = null;

    displayTotal();

    shipping.addEventListener('click', e => {
        
        if(e.target.nodeName == 'INPUT') {
            let shippingId = Number (e.target.value);
            if(shippingId == 1) {
                shippingCost = Number (<?= $shipOnePrice ?>) ;
                shipping.children[0].querySelector("#thaipost").style.border = "0.5px solid #9DA3A7";
                shipping.children[1].querySelector("#thaipost").style.border = "none";
            } else if (shippingId == 2) {
                shippingCost = Number (<?= $shipTwoPrice ?>) ;
                shipping.children[1].querySelector("#thaipost").style.border = "0.5px solid #9DA3A7";
                shipping.children[0].querySelector("#thaipost").style.border = "none";
            }
            
            displayTotal();
            
        }
    });

    function displayTotal() {
        showSubtotal.innerText = '$'+(qty * price).toFixed(2);
        showDeliveryFee.innerText = '$'+shippingCost.toFixed(2);
        showTotal.innerText = '$'+((qty * price) + shippingCost).toFixed(2);
        submitBtn.innerText = 'Pay $'+((qty * price) + shippingCost).toFixed(2);

        hideShip.value = shippingCost.toFixed(2);
        hideTotal.value = ((qty * price) + shippingCost).toFixed(2);
    }
    // document.querySelectorAll("input[type=radio]")[0].nodeName;
</script>
</body>

</html>
