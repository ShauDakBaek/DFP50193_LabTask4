<?php
$dir = "products";
$file = $_GET['name'];
$deletefile = "$dir/$file.txt";

if (unlink($deletefile)) {
    // Use JavaScript to show an alert and then redirect if the file is successfully deleted
    echo '<script>alert("File deleted successfully!");';
    echo 'window.location.href = "index.php";</script>';
} else {
    // Use JavaScript to show an alert and then redirect if the file cannot be deleted
    echo '<script>alert("Unable to delete file!");';
    echo 'window.location.href = "index.php";</script>';
}
?>
