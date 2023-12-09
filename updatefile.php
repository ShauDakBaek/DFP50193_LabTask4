<?php
$dir = "products";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_POST['bagname'];
    $updatefile = "$dir/$file.txt";

    $openfile = fopen($updatefile, "w");

    if ($openfile) {
        fwrite($openfile, "Bag Name: " . $_POST['bagname'] . PHP_EOL);
        fwrite($openfile, "Category: " . $_POST['bagcat'] . PHP_EOL);
        fwrite($openfile, "Color: " . $_POST['bagcolor'] . PHP_EOL);
        fwrite($openfile, "Quantity: " . $_POST['bagqty'] . PHP_EOL);
        fwrite($openfile, "Price: " . $_POST['bagprice'] . PHP_EOL);

        fclose($openfile);

        header("Location: index.php");
        exit;
    } else {
        echo "Error opening file for writing.";
    }
}

// Redirect to the update form if no POST request is made
if (!isset($_GET['name'])) {
    header("Location: index.php");
    exit;
}

$file = $_GET['name'];
$filepath = "$dir/$file.txt";
$filecontent = file_get_contents($filepath);

list($bagName, $category, $color, $quantity, $price) = explode("\n", $filecontent);

$bagName = trim(str_replace("Bag Name: ", "", $bagName));
$category = trim(str_replace("Category: ", "", $category));
$color = trim(str_replace("Color: ", "", $color));
$quantity = trim(str_replace("Quantity: ", "", $quantity));
$price = trim(str_replace("Price: ", "", $price));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="css/updateproduct.css">
</head>
<body>
<div class="container">
    <h1 class="header2">Update Product</h1>
    <form class="form" name="Update Cloth" method="post" action="update_process.php">
        <input type="hidden" name="filename" value="<?php echo $file; ?>">
        <label>Bag Name</label><br>
        <input class="input" name="bagname" type="text" value="<?php echo $bagName; ?>" required><br>

        <label>Category</label><br>
        <input type="radio" name="bagcat" value="Men's Fashion" <?php if ($category == "Men's Fashion") echo 'checked'; ?> required>Men's Fashion
        <input type="radio" name="bagcat" value="Women's Fashion" <?php if ($category == "Women's Fashion") echo 'checked'; ?> required>Women's Fashion<br><br>

        <label>Color</label><br>
        <input type="radio" name="bagcolor" value="Blue" <?php if ($color == "Blue") echo 'checked'; ?> required>Blue
        <input type="radio" name="bagcolor" value="White" <?php if ($color == "White") echo 'checked'; ?> required>White<br>
        <input type="radio" name="bagcolor" value="Black" <?php if ($color == "Black") echo 'checked'; ?> required>Black
        <input type="radio" name="bagcolor" value="Yellow" <?php if ($color == "Yellow") echo 'checked'; ?> required>Yellow<br><br>

        <label>Quantity</label><br>
        <input class="input" name="bagqty" type="number" min="1" max="50" value="<?php echo $quantity; ?>" required><br><br>

        <label>Price</label><br>
        <input class="input" name="bagprice" type="number" min="10000" max="100000" value="<?php echo $price; ?>" required><br><br>

        <input class="add" name="update" type="submit" value="Update">
        <input class="clear" name="clear" type="reset" value="Clear">
    </form>

    <div class="footer">
        &copy; <?php echo date("Y"); ?> DIOR. All rights reserved.
        <p>
            <a href="index.php" class="button">Cancel</a>
        </p>
    </div>
</div>
</body>
</html>
