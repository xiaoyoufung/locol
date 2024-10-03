
<html>
    <head>
        <title>Edit Products</title>
        <link rel="stylesheet" href="deco.css">
        <link rel="stylesheet" href="../templates/menu.css">
    </head>
    <body>

        <?php include_once "../templates/menu.html"; ?>


        <div class="whole-page">
            <div class="line">
                <h1>Edit Products</h1>
                <br>
                <ul class="nav">
                    <li><b><a href="#overview">Overview</a></b></li>
                    <li><b><a href="#addproduct">+ Add Product</a></b></li>
                </ul>
            </div>
            
            <!-- main content -->
            <form action="edit-page.php" method="post">
                <div class="form">
                    <div class="left">
                        <h4>Product Name</h4>
                        <input type="text" name="product-name">
                        <p>Do not exceed 20 characters when entering the product name.</p>

                        <h4>Category</h4>
                        <input type="text" name="category">

                        <h4>Description</h4>
                        <textarea name="description"></textarea>
                        <p>Do not exceed 100 characters when entering the product name.</p>
                    </div>

                    <div class="right">
                        <h4>Product Image</h4>
                        <!--<input type="image" src="imageFile" name="product-image" id="product-image">-->
                        <input type="file" name="product-image">

                        <h4>Add Price</h4>
                        <div class="size">
                            <input type="text" name="sizes" placeholder="Size S" required>
                            <input type="text" name="sizem" placeholder="Size M" required>
                            <input type="text" name="sizel" placeholder="Size L" required>
                        </div>

                        <h4>Status</h4>
                        <input type="radio" name="status" value="Yes"> <p class="radio">Published</p>
                        <input type="radio" name="status" value="No"> <p class="radio">Draft</p>

                        <br><br>
                        <input class="button1" type="submit" value="Add Product">
                        <input class="button2" type="submit" value="Save Product">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>