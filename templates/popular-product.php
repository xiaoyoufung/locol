<?php

    require_once "../config.php";
    
    $i = 0;
    
    $productQuery = "select * from tbl_product";
    $products = mysqli_query($connect, $productQuery);
    
    if(!$products) {
        die("Could not succesfully run the query $userQuery".mysqli_error($connect));
    }

    if(mysqli_num_rows($products) == 0) {
        echo "No records were found with query $userQuery";
    } else {
    ?>


<div id="Product">
        <div class="top">
            <h3>Popular Product</h3>
            <a href="../php/mem_index.php"><button>See all</button></a>
        </div>
        <div class="btm">

            <!-- display product -->
            <?php while( $product = mysqli_fetch_assoc($products)) { ?>
                <?php if($i < 4) { ?>

                    <a href='../templates/product_detail.php?id=<?= $product['id'] ?>' style="text-decoration: none; color:#000">
                        <div class="product">
                            <div><img src="<?= $product['image_name']; ?>" alt="Kalamae" width="150px"></div>
                            <div class="description">
                                <div>
                                    <i class="fa-2xs fa-solid fa-star"></i>
                                    <i class="fa-2xs fa-solid fa-star"></i>
                                    <i class="fa-2xs fa-solid fa-star"></i>
                                    <i class="fa-2xs fa-solid fa-star"></i>
                                    <i class="fa-2xs fa-solid fa-star"></i>
                                </div>
                                <div class="name">
                                    <h5><?= $product['title']; ?></h5>
                                    <p><?= $product['description']; ?> </p>
                                </div>
                                <div class="price">
                                    <h3>$<?= $product['price_s']; ?></h3>
                                    <p>$<?= $product['price_m']; ?> for 0.5 kg</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <?php $i++; ?>
                <?php  } ?>
            <?php } ?>
        </div>
    </div>

    <?php } ?>