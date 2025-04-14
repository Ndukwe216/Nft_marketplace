<?php 
include 'header.php';
 
// Get filters from URL
$category = isset($_GET['category']) ? $_GET['category'] : '';
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';
$item_type = isset($_GET['item_type']) ? $_GET['item_type'] : '';

// Query for NFTs with filters
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

$query .= " LIMIT 8"; // Initial Load
$result = mysqli_query($con, $query);
?>

<style>
/* Style for select dropdowns */
.form-select {
    background-color: #222;
    color: #fff;
    border: 1px solid #555;
    padding: 10px;
    border-radius: 8px;
}

/* Ensure options inside dropdowns are also visible */
.form-select option {
    background-color: #222;
    color: #fff;
}
</style>

<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Explore NFTs</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Explore</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>                    
</section>

<!-- Filter Section -->
<div class="tf-section sc-explore-1">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="explore.php">
                    <div class="wrap-box explore-1 flex mg-bt-40">
                        <select name="category" class="form-select">
                            <option value="">All Categories</option>
                            <option value="Art" <?php if($category == 'Art') echo 'selected'; ?>>Art</option>
                            <option value="Gaming" <?php if($category == 'Gaming') echo 'selected'; ?>>Gaming</option>
                            <option value="Music" <?php if($category == 'Music') echo 'selected'; ?>>Music</option>
                        </select>

                        <select name="item_type" class="form-select">
                            <option value="">All Items</option>
                            <option value="buy_now" <?php if($item_type == 'buy_now') echo 'selected'; ?>>Buy Now</option>
                            <option value="auction" <?php if($item_type == 'auction') echo 'selected'; ?>>Auction</option>
                        </select>

                        <select name="sort_by" class="form-select">
                            <option value="">Sort By</option>
                            <option value="newest" <?php if($sort_by == 'newest') echo 'selected'; ?>>Newest</option>
                            <option value="oldest" <?php if($sort_by == 'oldest') echo 'selected'; ?>>Oldest</option>
                            <option value="price_high" <?php if($sort_by == 'price_high') echo 'selected'; ?>>Price: High to Low</option>
                            <option value="price_low" <?php if($sort_by == 'price_low') echo 'selected'; ?>>Price: Low to High</option>
                        </select>

                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row" id="nft-container">
            <?php 
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
                echo "<p class='text-center'>No NFTs found.</p>";
            } ?>
        </div>

        <div class="text-center">
            <button id="load-more" class="btn  btn-secondary" style="padding:15px;border-radius:20px;background:#0757A8;border:none;color:#fff;font-weight:bold">Load More</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function(){
    let offset = 8; // Start after the first 8 NFTs

    $("#load-more").click(function(){
        $.ajax({
            url: "load_more_nfts.php",
            type: "GET",
            data: {
                offset: offset,
                category: "<?php echo $category; ?>",
                item_type: "<?php echo $item_type; ?>",
                sort_by: "<?php echo $sort_by; ?>"
            },
            beforeSend: function() {
                $("#load-more").text("Loading...").prop("disabled", true);
            },
            success: function(response){
                console.log("AJAX Response:", response); // ✅ Debug Response

                // Remove PHP warnings before inserting
                response = response.replace(/<br>.*?Warning:.*?<br>/g, "");

                if ($.trim(response) !== "") {
                    let newNFTs = $(response).hide();  // ✅ Hide for animation
                    $("#nft-container").append(newNFTs);
                    newNFTs.fadeIn(500); // ✅ Smooth display animation

                    offset += 8; // ✅ Increase offset
                    $("#load-more").text("Load More").prop("disabled", false);
                } else {
                    console.log("No more NFTs to load");
                    $("#load-more").hide(); // ✅ Hide button if no more NFTs
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                $("#load-more").text("Load More").prop("disabled", false);
            }
        });
    });
});

</script>



<?php include 'footer.php'; ?>
