<?php 

?>

 <!-- Footer -->
           <footer id="footer" class="footer-light-style clearfix">
            <div class="themesflat-container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="widget widget-logo">
                            <div class="logo-footer" id="logo-footer">
                                <a href="index.html">
                                    <img id="logo_footer" src="assets/images/logo/logo_dark.png" alt="nft-gaming" width="135" height="56"
                                    data-retina="assets/images/logo/logo_dark@2x.png" data-width="135"
                                    data-height="56">
                                </a>
                            </div>
                            <p class="sub-widget-logo">Marketplace for monster character cllections non fungible token NFTs</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5 col-5">
                        <div class="widget widget-menu style-1">
                            <h5 class="title-widget">My Account</h5>
                            <ul>
                                <li><a href="mynft.php">Collection</a></li>
                                <li><a href="profile.php">Author Profile</a></li>
                                <li><a href="create-item.php">Create Item</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-7 col-7">
                        <div class="widget widget-menu style-2">
                            <h5 class="title-widget">Resources</h5>
                            <ul>
                                <li><a href="index.html">Live Auctions</a></li>
                                <li><a href="explore.php">Activity</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5 col-5">
                        <div class="widget widget-menu fl-st-3">
                            <h5 class="title-widget">Company</h5>
                            <ul>
                                <li><a href="explore.php">Explore</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-7 col-12">
                        <div class="widget widget-subcribe">
                            <h5 class="title-widget">Subscribe Us</h5>
                            <div class="form-subcribe">
                                <form id="subscribe-form" action="#" method="GET" accept-charset="utf-8" class="form-submit">
                                    <input name="email" value="" class="email" type="email" placeholder="info@yourgmail.com" required>
                                    <button id="submit" name="submit" type="submit"><i class="icon-fl-send"></i></button>

                                </form>
                            </div>
                            <div class="widget-social style-1 mg-t32">
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    
                                    <li class="style-2"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li class="mgr-none"><a href="#"><i class="icon-fl-tik-tok-2"></i></a></li>
                                    <li class="mgr-none"><a href="#"><i class="icon-fl-vt"></i></a></li>

                                </ul>
                                <br>  <br>  <br> 
                                 <span>©  2010 - <?php echo date('Y')  ?> <?php echo $_site_name  ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </footer><!-- /#footer -->
        </div>
        <!-- /#page -->

        <!-- Modal Popup Bid -->
        <div class="modal fade popup" id="popup_bid_success" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body space-y-20 pd-40">
                        <h3 class="text-center">Your Bidding
                            Successfuly Added</h3>
                        <p class="text-center">your bid <span class="price color-popup">(4ETH) </span> has been listing to our database</p>
                        <a href class="btn btn-primary"> Watch the listings</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade popup" id="popup_bid" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body space-y-20 pd-40">
                        <h3>Place a Bid</h3>
                        <p class="text-center">You must bid at least <span class="price color-popup">4.89 ETH</span>
                        </p>
                        <input type="text" class="form-control"
                            placeholder="00.00 ETH">
                        <p>Enter quantity. <span class="color-popup">5 available</span>
                        </p>
                        <input type="text" class="form-control quantity" value="1">
                        <div class="hr"></div>
                        <div class="d-flex justify-content-between">
                            <p> You must bid at least:</p>
                            <p class="text-right price color-popup"> 4.89 ETH </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p> Service free:</p>
                            <p class="text-right price color-popup"> 0,89 ETH </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p> Total bid amount:</p>
                            <p class="text-right price color-popup"> 4 ETH </p>
                        </div>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popup_bid_success" data-dismiss="modal" aria-label="Close"> Place a bid</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>

    <!-- Javascript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/count-down.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/web3.min.js"></script>
    <script src="assets/js/moralis.js"></script>
    <script src="assets/js/nft.js"></script>

</body>


<!-- Mirrored from themesflat.co/html/axiesv/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jan 2024 17:43:34 GMT -->
</html>