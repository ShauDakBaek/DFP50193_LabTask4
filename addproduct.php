<!DOCTYPE html>
<html>
<head>
    <title>DIOR - Add New Clothing</title>
    <link rel="stylesheet" href="css/addproduct.css">
</head>
<body>
<div class="container">
    <h1 class="header1">Add Product</h1>
    <form class="form" name="AddBag" method="post" action="addproductprocess.php">
        <label>Bag Name</label>
        <input class="input" name="bagname" type="text">

        <label>Category</label>
        <input type="radio" name="bagcat" value="Men's Fashion">Men's Fashion
        <input type="radio" name="bagcat" value="Women's Fashion">Women's Fashion

        <label>Color</label>
        <input type="radio" name="bagcolor" value="Blue">Blue
        <input type="radio" name="bagcolor" value="White">White
        <input type="radio" name="bagcolor" value="Black">Black
        <input type="radio" name="bagcolor" value="Yellow">Yellow<br>

        <label>Quantity</label>
        <input class="input" name="bagqty" type="number" min="1" max="50">

        <label>Price</label>
        <input class="input" name="bagprice" type="number" min=10000 max=100000>

        <input class="add" name="add" type="submit" value="Add">
        <input class="clear" name="clear" type="reset" value="Clear">
    </form>

    <div class="footer">
        &copy; <?php echo date("Y"); ?> | DIOR. <br>All rights reserved.
        <p>
            <a href="index.php" class="button">Cancel</a>
        </p>
    </div>
</div>

</body>
</html>
