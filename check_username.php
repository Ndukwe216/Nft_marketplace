<?php
include 'db.php'; // Ensure this file connects to your database

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    
    $query = mysqli_query($con, "SELECT id FROM user WHERE username = '$username' LIMIT 1");
    
    if (mysqli_num_rows($query) > 0) {
        echo "found"; // Username exists
    } else {
        echo "not_found"; // Username does not exist
    }
}
?>
