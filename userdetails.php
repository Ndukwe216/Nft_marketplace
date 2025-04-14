<?php
// session_start();
// include 'header.php';
include 'db.php';
if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT * FROM user WHERE id = '$userid' ");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        $userid = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
 
    }
}


if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT * FROM deposit WHERE id = '$userid'  ");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        $status = $row['status'];
        // $money = $_POST['amount'];
 
    }
}
?>