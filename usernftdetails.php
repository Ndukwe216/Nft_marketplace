<?php 
    include 'header.php';
    
    $err = "";
    $msg = "";

         if(empty($_SESSION["id"]))
    {
        echo "<script>
                   window.location.href = 'login.php';
            </script>";
    }



    if (isset($_SESSION['id'])) {
        $userid = $_SESSION['id'];


        $query = "SELECT * FROM user WHERE status = 'inactive' and id = '$userid' ";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        // $status = $row['status'];


      if (mysqli_num_rows($result) >1) {
          echo  "<script>
                                     window.location.href = 'usernftdetails.php';
                              </script>";

        }else{
            if (mysqli_num_rows($result)> 0) {
 
                echo  "<script>
                                    alert('Pleases  Verify  Your Kyc To Access This Page');
                                     window.location.href = 'kyc.php';
                              </script>";
        
        }
}
}

          if (isset($_GET['usernft'])) {
                $usernft = $_GET['usernft'];


             $query = mysqli_query($con, "SELECT * FROM   usermint WHERE id = '$usernft' ");
             if(mysqli_num_rows($query) > 0){
                $row = mysqli_fetch_assoc($query);
                // $nft_name = $row['nft_name'];
                $title = $row['title'];
                $nft_image = $row['nft_image'];
                $username = $row['username'];
                $description = $row['description'];
                $category = $row['category'];
                $price = $row['price'];
                $id = $row['id'];
                // $creatorid = ['userid'];

             }
             
         
             

            if (isset($_POST['submit'])) {
                $category = trim($_POST['category']);
                $nft_name = trim($_POST['nftname']);
                $username = trim($_POST['owner']);
                $description = trim($_POST['description']);
                $nft_price = trim($_POST['nft-price']);
                $bid_transaction_id = trim($_POST['bid_transaction_id']);
                $amounts = trim($_POST['your']);
                $image = trim($_POST['file']);
                $userid = $_SESSION['id'];




                $sql = "SELECT account_balance FROM user WHERE id = '$userid'";
                $result = mysqli_query($con, $sql);
                $present = mysqli_num_rows($result);


                if($present > 0){
                    $row =  mysqli_fetch_array($result);
                    $amount = $row['account_balance'];
                    // $email = $row['email'];
                   if($amount > $amounts){
                        if ($amounts < $price) {
                            
                            $err = 'bid amount can not be less than $price';
                            
                            //  echo "<script>
                            //             alert('bid amount can not be less than $price');                          
                            //       </script>";
                        }elseif ($amount > $amounts) {
                            $querys = "UPDATE user set account_balance = account_balance - '$amounts' WHERE id = '$userid' ";
                            
                                  mysqli_query($con, "UPDATE usermint SET  bids = bids + 1 WHERE id = '$usernft' ");
                            $result = mysqli_query($con,$querys );
                            $result = mysqli_query($con,$querys );
                               if ($querys) {
                                     $querys = mysqli_query($con, "INSERT INTO    bids  (userid, nftid, bid_transaction_id, username, nft_image, nft_name, category, description,nft_price, bid_amount) VALUES ( '$userid', '$usernft', '$bid_transaction_id', '$username', '$image', '$nft_name', '$category', '$description', '$nft_price', '$amounts' ) ");
                                }

                                         if ($querys) {
                                               $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' ");
      if (mysqli_num_rows($query) > 0) {
          $row = mysqli_fetch_assoc($query);
          $email = $row['email'];
                                                          $subject = " Notification: NFT Bid Received";
             $body = "<h3>Dear $username</h3>  <br> 

<p>Just a quick heads-up: someone has placed a bid on your NFT!</p>

<pFeel free to check it out and respond accordingly..</p>




<br> 

<p>Best regards,</p>

<p>$_site_name</p>
<p>$_email ";
                      sendMail($email,$subject,$body);
                                         }
                                         }
                                         
                         if ($querys) {
                          $subject = " Notification: NFT Bid Received";
             $body = "<h3>Dear $_site_name</h3>  <br> 

<p>I trust this email finds you well. I am writing to bring to your attention a bid that requires approval.</p>

<p>Your approval of this bid is necessary to proceed with the project. If you require any additional information or clarification regarding the bid, please do not hesitate to reach out.</p>

<p>Thank you for your attention to this matter.</p>



<br> 

<p>Best regards,</p>

<p>$_site_name</p>";

                      sendMail($_email,$subject,$body);
                                         }
                                         
                                         

                                    $msg = 'Your Bid has been place successfully. it is now waiting for approval';
                        }
                         }else{
                  
                           
                // echo "<script> 
                //   alert('');
                //   </script>";
                             
                             $err = 'Insufficeint Balance';
                         
                                
                        }

                }

            }
    }
        


        

?>
  
  
<?php

    if($err != ""){
        echo customAlert('error', $err);
        // echo pageRedirect('3', 'kyc.php');
    }

    if ($msg != "") {
        echo customAlert('success', $msg);
        // echo pageRedirect('3', 'index.php');
    }

?>
                
            <!-- title page -->
            <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">NFT Details </h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="explore.php">Explore</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>

            <!-- tf item details -->

            <form method="POST" action="usernftdetails.php?usernft=<?php echo $usernft ?>" enctype="multipart/form-data">
            <div class="tf-section tf-item-details">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <div class="content-left">
                                <div class="media">
                                   <img height="500" width="500" src="./pimage/<?php echo $nft_image  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="content-right">
                                <div class="sc-item-details">
                                    <h2 class="style2"><?php echo $title ?></h2>
                                    <div class="meta-item">
                                        
                                        <div class="right">
                                           
                                            <a class="option"></a>
                                        </div>
                                    </div>
                                    <div class="client-infor sc-card-product">
                                        <div class="meta-info">
                                            <div class="author">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar/avt-8.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span>Owned By</span>
                                                    <h6> <a href="#"><?php echo $username ?></a> </h6>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <p><?php echo $description  ?></p>
                                    <div class="meta-item-details style2">
                                        <div class="item meta-price">
                                            <span class="heading"> Biding Price</span>
                                            <div class="price">
                                                <div class="price-box">
                                                    <h5> <?php echo $price  ?> ETH</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item count-down">
                                            <span class="heading style-2">Countdown</span>
                                            <span class="js-countdown" data-timer="416400"
                                                data-labels=" :  ,  : , : , "></span>
                                        </div>

                                    </div>
                                     <div class="modal-body space-y-20 pd-20">
               

                        <div class="d-flex justify-content-between">
                            <p> Bids:</p>
                            <p class="text-right price color-popup">   </p>
                        </div>
                        <input type="number" class="form-control quantity" value="" name="your" min="0.01" step="0.01">
                        <div class="hr"></div>

                            <!-- account details and nft details -->
                                <input type="hidden" name="file" value="<?php echo $nft_image ?>">
                                <input type="hidden" name="nftname" value="<?php echo $title  ?>">
                                <input type="hidden" name="category" value="<?php echo $category  ?>">
                                <input type="hidden" name="owner" value="<?php echo $username  ?>">
                                <input type="hidden" name="description" value="<?php echo $description  ?>">
                                <input type="hidden" name="nft-price" value="<?php echo $price  ?>">
                                    <input  id="pwd" name="bid_transaction_id" type="hidden" value="<?php echo substr(uniqid(), 4); ?>" >
                                
                     
                    
                    </div>
                </div>
                    <button type="submit" name="submit" class="sc-button loadmore style bag pri-3">Place Bid</button>

                  
                               </div>
                           </div></div></div></div>
                       
                                    <div class="flat-tabs themesflat-tabs">
                                        <div class="content-tab">
                                            <div class="content-inner tab-content">
                                                <ul class="bid-history-list">
                                                   
                                                </ul>
                                            </div>
                                            
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- /tf item details -->

          

<?php 
    include 'footer.php';
 ?>