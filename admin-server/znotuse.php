<?php
    require_once "../config.php";

    $pn = $_POST["product-name"];
    $cgr = $_POST["category"];
    $dct = $_POST["description"];
    $img = $_POST["product-image"];
    $ss = $_POST["sizes"];
    $sm = $_POST["sizem"];
    $sl = $_POST["sizel"];
    $status = $_POST["status"];

    $userQuery = "insert into tbl_product (title, description, price_s, price_m, price_l, image_name, active, category_id)
    values ('$pn', '$dct', '$ss', '$sm', '$sl', '$img', '$status', '$cgr')";
    $result = mysqli_query($connect, $userQuery);

    if(!$result)
    {
        die ("Could not successful run the query $userQuery".mysqli_error($connect));
    }
    else
    {
    echo "Successfully added the new product<br><br>";
    echo "<a href=\"display_product.php\">Go back to display all products</a>";
    }
?>