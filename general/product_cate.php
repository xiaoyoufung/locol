<?php
    include "../general/gen_header.php";
    require_once "../config.php";
    
    $product_id = $_GET['id'];

    $userQuery = "select * from tbl_product WHERE category_id = '$product_id' ";
    $categories = mysqli_query($connect, $userQuery);

    if(!$categories) {
        die("Could not succesfully run the query $userQuery".mysqli_error($connect));
    }

    if(mysqli_num_rows($categories) == 0) {
        echo "No records were found with query $userQuery";
        header("Location: ../php/mem_index.php");
    } else {
        
?>

    

    <?php include "../templates/categories.php"; ?>

    <div id="Product">

        <div class="btm">

            <!-- display product -->
            <?php while( $category = mysqli_fetch_assoc($categories)) { ?>

                <a href='../templates/product_detail.php?id=<?= $category['id'] ?>' style="text-decoration: none; color:#000">
                    <div class="product">
                        <div><img src="<?= $category['image_name'] ?>" alt="<?= $category['title'] ?>" width="150px"></div>
                        <div class="description">
                            <div>
                                <i class="fa-2xs fa-solid fa-star"></i>
                                <i class="fa-2xs fa-solid fa-star"></i>
                                <i class="fa-2xs fa-solid fa-star"></i>
                                <i class="fa-2xs fa-solid fa-star"></i>
                                <i class="fa-2xs fa-solid fa-star"></i>
                            </div>
                            <div class="name">
                                <h5> <?= $category['title'] ?> </h5>
                                <p> <?= $category['description'] ?> </p>
                            </div>
                            <div class="price">
                                <h3>$<?= $category['price_s'] ?></h3>
                                <p>$<?= $category['price_m'] ?> for 0.5 kg</p>
                            </div>
                        </div>
                    </div>
                </a>
            

            <?php } ?>

            <?php } ?>
        </div>
    </div>
</main>

<?php $display_id = ((int)$product_id) - 1; ?>

<script>
    document.querySelectorAll(".container")[<?= $display_id ?>].classList.add("selected");
</script>

<?php include "../templates/footer.php"; ?>
