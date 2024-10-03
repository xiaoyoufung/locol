<?php
    require_once "../config.php";

    $userQuery = "select * from tbl_category WHERE active = 'Yes' ";
    $result = mysqli_query($connect, $userQuery);

    if(!$result) {
        die("Could not succesfully run the query $userQuery".mysqli_error($connect));
    }

    if(mysqli_num_rows($result) == 0) {
        echo "No records were found with query $userQuery";
        header("Location: ../php/mem_index.php");
    } else {
 
?>

    <!-- Benefits -->
    <div id="Benefits">
        <div class="header">
            <div class="left">
                <div>
                    <h1>Popular and best product from our area </h1>
                    <p>Buy local products with high quality from our area delivered in your city.</p>
                    <a href="#Product"><button>Order now</button></a>
                </div>
                <div class="icon-container">
                    <div class="icon"><i class="fa fa-sm fa-brands fa-twitter"></i></div>
                    <div class="icon"><i class="fa fa-sm fa-brands fa-instagram"></i></div>
                    <div class="icon"><i class="fa-brands fa-sm fa-facebook"></i></div>
                </div>
                
            </div>
            <div class="img"><img src="../img/circle-pic.png" alt="circle-pic"></div>
        </div>
        
       <div id="Categories">
            <h2>Categories</h2>

            <div id="category-container" class="con">
                <a style="text-decoration: none" href='mem_index.php'>
                    <div class="container">
                        <div><img src="../img/backet-icon.svg" alt="meat-icon"></div>
                        <p>All</p>
                    </div>
                </a>
                
                <?php while( $row = mysqli_fetch_assoc($result)) { ?>

                <a style="text-decoration: none" href='product_cate.php?id=<?= $row['id']?>'>
                    <div class="container">
                    <div><img src="<?= $row['image_name'] ?>" alt="meat-icon"></div>
                    <p><?= $row['title'] ?></p>
                    </div>
                </a>

                <?php } ?>
            </div>
            
       </div>

       <?php } ?>
        <div class="white-reg"></div>
    </div>