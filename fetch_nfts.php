<?php
session_start();
header('Content-Type: application/json'); // Ensure the response is JSON
include "db.php"; // Database connection

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 12; // Adjust as needed

// Get the logged-in user's username
$loggedInUser = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$query = "SELECT id, title, username, nft_image, bids, price FROM usermint WHERE status = '1' ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $query);

$nfts = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $row['isOwner'] = ($row['username'] === $loggedInUser); // Determine ownership
        $nfts[] = $row;
    }
    echo json_encode(['success' => true, 'data' => $nfts]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
}

mysqli_close($con);
?>
