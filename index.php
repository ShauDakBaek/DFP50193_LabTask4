<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>

<div class="product-list">
    <h1 class="header2">Product List</h1>
    <?php
    $dir = "products";
    $fileproduct = "$dir/*.txt";
    $filelist = glob($fileproduct);

    foreach ($filelist as $filename) {
        $basename = pathinfo($filename, PATHINFO_FILENAME); // Get the file name without extension
        ?>
        <div class="product-item">
            <a class="product-link" href="productdetails.php?filename=<?php echo $basename; ?>"><?php echo $basename; ?></a>
            <div class="product-actions">
                <a class="action-link" href="<?php echo "updatefile.php?name=" . $basename; ?>">Update</a>
                <a class="action-link" href="<?php echo "deletefile.php?name=" . $basename; ?>">Delete</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<div class="footer">
    <p>&copy; <?php echo date("Y"); ?> DIOR. All rights reserved.</p>
    <p>
        <a href="addproduct.php" class="button">Add Product</a>
    </p>
</div>

</body>
</html>
