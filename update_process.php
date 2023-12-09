<?php
$dir = "products";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filename'])) {
    $oldFileName = $_POST['filename'];
    $newBagName = $_POST['bagname'];
    $updatefile = "$dir/$oldFileName.txt";
    $newFileName = "$dir/$newBagName.txt";

    if (rename($updatefile, $newFileName)) {
        $openfile = fopen($newFileName, "w");

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
    } else {
        echo "Error renaming the file.";
    }
} else {
    // Redirect to the index.php page if no POST request or filename is provided
    header("Location: index.php");
    exit;
}
?>
