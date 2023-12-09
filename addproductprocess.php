<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dir = "products";

    if (empty($_POST['bagname']) || empty($_POST['bagcat']) || empty($_POST['bagcolor']) || empty($_POST['bagqty']) || empty($_POST['bagprice'])) {
            echo '<script>alert("Incomplete Product Info");';
            echo 'window.location.href = "addproduct.php";</script>';
    } else {
        
        $filename = $_POST["bagname"] . ".txt";
        $filedir = "$dir/$filename";

        // check if the directory exists, if not, create it
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $fileContent = "Bag Name: " . $_POST['bagname'] . PHP_EOL;
        $fileContent .= "Category: " . $_POST['bagcat'] . PHP_EOL;
        $fileContent .= "Color: " . $_POST['bagcolor'] . PHP_EOL;
        $fileContent .= "Quantity: " . $_POST['bagqty'] . PHP_EOL;
        $fileContent .= "Price: " . $_POST['bagprice'] . PHP_EOL;

        file_put_contents($filedir, $fileContent, FILE_APPEND);
        ?>
        <script>
            alert("Product added successfully!");
            window.location = "index.php";
        </script>
<?php
    }
}
?>
