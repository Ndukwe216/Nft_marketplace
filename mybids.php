<?php 
	include 'header.php';
?>

    <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">My Bids Page</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">My Bids</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>
  <!-- Card start -->
    <div class="tf-section sc-explore-1">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-box explore-1 flex mg-bt-40">
                                <div class="seclect-box style-1">
                                    <div id="item_category" class="dropdown">
                      
                                        
                                    </div>
                                    <div id="buy" class="dropdown">
                                    
                                    </div>
                                    <div id="all-items" class="dropdown">
                                       
                                    </div>
                                </div>
                                <div class="seclect-box style-2 box-right">
                                    <div id="artworks" class="dropdown">
                                      
                                       
                                    </div>
                                    <div id="sort-by" class="dropdown">
                                       
                                    </div>    
                                </div>
                            </div>
                        </div>

                        <?php 
                         $select = mysqli_query($con, "SELECT * FROM bids WHERE userid = '$userid' ");
                              if (mysqli_num_rows($select) > 0) {
                                while ($row = mysqli_fetch_assoc($select)) {
                                  $id = $row ['id'];
                                  $bid_transaction_id = $row['bid_transaction_id'];
                         ?>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="#"><img height="80" width="80" src="./pimage/<?php echo $row['nft_image']  ?>" style="width: 414px; height: 380px; "></a>
                                    <button class="wishlist-button heart"><span class="number-like"> 100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="#"><?php echo $row['nft_name']  ?></a></h5>
                                    <div class="tags">ETH</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="#"><?php echo $row['username'] ?></a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
    <span>Current Bid <?php echo isset($row['bid_amount']) ? $row['bid_amount'] : '0'; ?></span>
    <h5><?php echo isset($row['nft_price']) ? $row['nft_price'] : '0'; ?> ETH</h5>
</div>

                                </div>
                                <div class="card-bottom">
                                    <!-- <a href="usernftdetails.php?usernft=<?php echo $mint_transactionid ?>" class="sc-button style bag fl-button pri-3" ><span>Place Bid</span></a> -->
                                </div>
                            </div>
                           
                        </div>
                         <?php 
                              }
                            }
                             ?>



<?php 
	include 'footer.php';
