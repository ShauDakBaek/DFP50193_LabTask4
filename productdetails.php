<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>

<div class="product-list">
    <div class="product-details">
        <h1 class="header2">Product Details</h1>
        <?php
        if (isset($_GET['filename'])) {
            $filename = "products/" . $_GET['filename'] . ".txt";
            $filecontent = file_get_contents($filename);

            // Display the content in the format you desire (Bag Name, Category, Color, Quantity, Price)
            // For example:
            list($bagName, $category, $color, $quantity, $price) = explode("\n", $filecontent);
            ?>
            <p> <?php echo $bagName; ?></p>
            <p> <?php echo $category; ?></p>
            <p> <?php echo $color; ?></p>
            <p> <?php echo $quantity; ?></p>
            <p> <?php echo $price; ?></p>
            <?php
        } else {
            // Handle the case where the filename parameter is not provided
            echo "Invalid request";
        }
        ?>
    </div>
</div>


<div class="footer">
    <p>&copy; <?php echo date("Y"); ?> DIOR. All rights reserved.</p>
    <p>
        <a href="index.php" class="button">Back</a>
    </p>
</div>

</body>
</html>
