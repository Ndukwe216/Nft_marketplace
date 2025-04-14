<?php 
	include 'header.php';
?>



    <!-- title page -->
            <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">My NFT Page</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">My NFT</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>

                          <div class="tf-section sc-explore-1">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-box explore-1 flex mg-bt-40">
                                <div class="seclect-box style-1">
                                    <div id="item_category" class="dropdown">
                                    </div>  
                                </div>
                                <div class="seclect-box style-2 box-right">
                                    <div id="artworks" class="dropdown">
                                
                                    </div>
                                      
                                </div>
                            </div>
                        </div>

                         <?php 
                             $select = mysqli_query($con, "SELECT * FROM   bids WHERE userid = '$userid' AND status = 1  ");
                                  if (mysqli_num_rows($select) > 0) {
                                    while ($row = mysqli_fetch_assoc($select)) {
                                      $id = $row ['id'];
                         ?>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="#"><img height="80" width="80" style="object-fit:contain;" src="./pimage/<?php echo $row['nft_image']  ?>" style="width: 414px; height: 380px; "></a>
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
                                            <h6> <a href="#"><?php echo $row['username']  ?></a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                    <span>Current Bid <?php echo isset($row['bids']) ? $row['bids'] : "N/A"; ?></span>

                                        <h5><?php echo $row['nft_price']  ?>ETH</h5>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                         <?php 
                              }
                            }
                             ?>

                    <?php 
                         $select = mysqli_query($con, "SELECT * FROM   usermint WHERE status = 1 AND userid = '$userid' ");
                              if (mysqli_num_rows($select) > 0) {
                                while ($row = mysqli_fetch_assoc($select)) {
                                  $id = $row ['id'];
                                  $mint_transactionid = $row['mint_transactionid'];
                    ?>

                              <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="#"><img height="80" width="80" src="./pimage/<?php echo $row['nft_image']  ?>"></a>
                                    <button class="wishlist-button heart"><span class="number-like"> 100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="#"><?php echo $row['title']  ?></a></h5>
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
                                        <span>Current Bid</span>
                                        <h5><?php echo $row['price']  ?>ETH</h5>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <?php 
                    }
                }
                         ?>

                       

                        <div class="col-md-12 wrap-inner load-more text-center">
                            <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Load More</span></a>
                        </div>
                    </div>
                </div>
            </div>

<?php 
	include 'footer.php';
?>