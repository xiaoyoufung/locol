<?php 
    include_once "../header.php";

    require_once "../config.php";

    $this_id = $_GET['id'];

    $detailQuery = "select * from tbl_product where id = '$this_id' ";

    $details = mysqli_query($connect, $detailQuery);

    if(!$details) {
        die("Could not succesfully run the query $detailQuery".mysqli_error($connect));
    }

    if(mysqli_num_rows($details) == 0) {
        echo "No records were found with query $detailQuery";
        header("Location: ../php/mem_index.php");
    } else {
?>

<!-- main content -->
    <?php while( $detail = mysqli_fetch_assoc($details)) { 
        $_SESSION['product-name'] = $detail['title'];
        $_SESSION['product-img'] = $detail['image_name'];
        
    ?>

    <!-- Benefits -->
    <div id="Product-Detail">
        <div class="detail">
            <div class="product-img"><img src="<?= $detail['image_name'] ?>" alt="<?= $detail['title'] ?>" style="object-fit: cover;"></div>
           
            <div class="item-detail">
                <div>
                    <h1><?= $detail['title'] ?> </h1>
                    <p> <?= $detail['description'] ?> </p>
                </div>

                <div>
                    <div id="size" class="size">
                       <p>Size</p>  
                        <button>S</button>
                        <button>M</button>
                        <button>L</button>
                    </div>
                   <h1 id="display_price">$<?= $detail['price_s'] ?> </h1>
                </div>

                <div class="button-section">
                    <div class="quantity">
                        <button id="minus-btn" class="qty-btn">-</button><span id="show-qty">1</span><button id="plus-btn" class="qty-btn">+</button>
                    </div>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="hide-qty" id="hide_qty">
                        <input type="hidden" name="hide-price" id="hide_price">
                        <input type="hidden" name="hide-size" id="hide_size">
                    <button type="submit" id="order-confirm" class="to-cart">
                        <div><img class="bag-icon" src="../img/shop-bag-icon.svg" alt="shop-bag-icon" width="16px"></div>
                        Add to cart
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <?php include "popular-product.php"; ?>
</main>

<script>
    const size = document.getElementById("size");
    const showPrice = document.getElementById("display_price");
    const plusBtn = document.getElementById("plus-btn");
    const minusBtn = document.getElementById("minus-btn");
    const showQty = document.getElementById("show-qty");
    const confirmBtn = document.getElementById("order-confirm");
    const hideQty = document.getElementById("hide_qty");
    const hidePrice = document.getElementById("hide_price");
    const hideSize = document.getElementById("hide_size");

    let sBtn = size.querySelectorAll("button")[0];

    let qty = 1;
    let prevBtn = sBtn;
    let productPrice = <?= $detail['price_s'] ?>;
    let showSize = "S";

    sBtn.style.border = "1px solid #000";

    size.addEventListener("click", e => {
        
        if(e.target.nodeName == 'BUTTON') {
            e.target.style.border = "1px solid #000";

            let btnText = e.target.textContent;

            if(prevBtn !== null) {
                prevBtn.style.border = "0.5px solid #E0E0E0";
            }
            prevBtn = e.target;

            if(btnText == 'S') {
                productPrice = <?= $detail['price_s'] ?>;
            } else if(btnText == 'M') {
                productPrice = <?= $detail['price_m'] ?>;
            } else {
                productPrice = <?= $detail['price_l'] ?>;
            }
            showPrice.textContent = '$' + (productPrice.toFixed(2));
            showSize = btnText;
        }
    });

    plusBtn.addEventListener("click", e => {
        qty++;
        showQty.textContent = qty;
    });

    minusBtn.addEventListener("click", e => {
        if(qty > 1) {
            qty--;
            showQty.textContent = qty;
        }
        
    });

    confirmBtn.addEventListener("click", e => {
        hideQty.value = qty;
        hidePrice.value = productPrice.toFixed(2);
        hideSize.value = showSize;
        hideImg.value = imgLink;
    });

</script>

<?php } ?>

    <?php } ?>

<?php include "../templates/footer.php"; ?>