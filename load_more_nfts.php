<?php
include 'db.php'; // Include database connection
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ensure $username is set from session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';
$item_type = isset($_GET['item_type']) ? $_GET['item_type'] : '';

$query = "SELECT * FROM usermint WHERE status = '1'";


// Apply category filter
if (!empty($category)) {
    $query .= " AND category = '$category'";
}

// Apply item type filter
if (!empty($item_type)) {
    if ($item_type == "buy_now") {
        $query .= " AND price > 0";
    } elseif ($item_type == "auction") {
        $query .= " AND bids > 0";
    }
}

// Apply sorting
if (!empty($sort_by)) {
    if ($sort_by == "newest") {
        $query .= " ORDER BY id DESC";
    } elseif ($sort_by == "oldest") {
        $query .= " ORDER BY id ASC";
    } elseif ($sort_by == "price_high") {
        $query .= " ORDER BY price DESC";
    } elseif ($sort_by == "price_low") {
        $query .= " ORDER BY price ASC";
    }
} else {
    $query .= " ORDER BY id DESC"; // Default sorting
}

$query .= " LIMIT 8 OFFSET $offset"; // Load 8 more NFTs from the current offset

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="sc-card-product">
                <div class="card-media">
                    <a href="nftdetails.php?nft=<?php echo $row['id']; ?>">
                        <img src="./pimage/<?php echo $row['nft_image']; ?>" style="width: 414px; height: 380px;">
                    </a>
                </div>
                <div class="card-title">
                    <h5><a href="nftdetails.php?nft=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h5>
                    <div class="tags">ETH</div>
                </div>
                <div class="meta-info">
                    <div class="author">
                        <div class="info">
                            <span>Owned By</span>
                            <h6><a href="#"><?php echo $row['username']; ?></a></h6>
                        </div>
                    </div>
                    <div class="price">
                        <span>Current Bid: <?php echo $row['bids']; ?></span>
                        <h5><?php echo $row['price']; ?> ETH</h5>
                    </div>
                </div>
                <div class="card-bottom">
                    <?php if ($row['username'] != $username) { ?>
                        <a href="usernftdetails.php?usernft=<?php echo $row['id']; ?>" class="sc-button style bag fl-button pri-3">
                            <span>Place Bid</span>
                        </a>
                    <?php } else { ?>
                        <button class="sc-button disabled" disabled>Owned</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
} else {
    echo ""; // Return empty response if no more NFTs
}
?>
