<?php

include 'header.php';
include 'userdetails.php';

$err = "";
$msg = "";


    if (isset($_SESSION['id'])) {
        $userid = $_SESSION['id'];


        $query = "SELECT * FROM user WHERE status = 'inactive' and id = '$userid' ";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        // $status = $row['status'];
        // $email = $row['email'];

      if (mysqli_num_rows($result) >1) {
                           echo  "<script>
                                     window.location.href = 'addfunds.php';
                              </script>";
        }else{
            if (mysqli_num_rows($result)> 0) {
                $err = 'Pleases  Verify  Your Kyc To Access This Page';
                             echo  "<script>
                                     window.location.href = 'kyc.php';
                              </script>";
        
        }
}
}





$error = "";
if (isset($_POST['submit'])) { 
   $transactionId = trim($_POST['transactionID']);
   $userid = $_SESSION['id'];

   if(empty($_POST['money'])){
       $error =  " select and deposit amount";
   }else{
       $money = trim($_POST['money']);
   }


        
      


     if (empty($error) ){
       $filename = $_FILES["file"]["name"];
       $tempname = $_FILES["file"]["tmp_name"];
       $imgname = time().".png";
       $folder = "./pimage/".$imgname;
       $check = @getimagesize($tempname);
       $date = date('d-m-Y h:i:sa');
       if ($check === false) {
          $err = 'please only image are allowed';
       }else{
           $insert = mysqli_query($con, "INSERT INTO   deposit  (userid, transactionId,  username,  amount, payment_proof ) VALUES ( '$userid', '$transactionId', '$username' , '$money' , '$imgname'  ) ");
           if($insert){
               move_uploaded_file($tempname, $folder);
               $msg = 'Deposit sent For Approval';
               
                     if ($insert) {
            $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' ");
      if (mysqli_num_rows($query) > 0) {
          $row = mysqli_fetch_assoc($query);
          $email = $row['email'];
          
          $subject = "Pending Deposit Notification";
          $body = "<h3>Dear $username</h3> <br> 

<p>Thank you for your recent deposit.</p>

<p>
Please note that your deposit is currently pending processing. We are working diligently to ensure it is completed as soon as possible.
</p>

<p>Amount: <b>$money</b> </p>

<p>
We appreciate your patience and understanding.
</p>
<br> 


<p>Best regards,</p>

<p>$_site_name</p>
<p>$_email</p> ";
          sendMail($email,$subject,$body);
        }
                             if ($insert) {
          
          $subject = "Pending Deposit";
          $body = "<h3>Dear $_site_name</h3> <br> 

<p> I would like to bring to your attention that there is a deposit awaiting your approval..</p>

<p>
Please note that your deposit is currently pending processing. We are working diligently to ensure it is completed as soon as possible.
</p>

<p>Please review the details and kindly approve the deposit at your earliest convenience. Should you require any further information or clarification, please do not hesitate to contact me.</p>

<p>
Thank you for your attention to this matter.
</p>
<br> 


<p>Best regards,</p>

<p>$_site_name</p>";
          sendMail($_email,$subject,$body);
        }
           }


}

       }
   }
}

     
?>


  <?php

    if($err != ""){
        echo customAlert('error', $err);
        // echo pageRedirect('3', 'register.php');
    }

    if ($msg != "") {
        echo customAlert('success', $msg);
        // echo pageRedirect('3', 'index.php');
    }

?>

            <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">Deposit Page</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                     <li>Make a Deposit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>

           <br><br>


     <form action="addfunds.php" class="form-profile" method="POST" enctype="multipart/form-data">
            <div class="tf-create-item tf-section">

                <div class="themesflat-container">
                    <div class="row">
                         <div class="col-xl-3 col-lg-4 col-md-6 col-12">

                            <div class="sc-card-profile text-center">
                                <div class="card-media">
                                <a href="#" onclick="copyToClipboard()">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?php echo urlencode('ethereum:' . $_Ethereum_Wallet_Address); ?>" 
             alt="Ethereum Wallet QR Code" style="display:block; margin:auto;">
    </a>


                 
                                </div>
                            <div id="upload-profile">
                                
                                   
                            </div>
                          
                            </div>
                         </div>

                         <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                                <h3>NOTE</h3>
                                            <P style="color: red;">only ETH is Allowed</P>
                                            <br>

                                        <div class="info-social">

                                            <h4 class="title-create-item">Make a Deposit</h4>


                                                <fieldset>
                                                    <h4 class="title-infor-account" style="color:white";>Amount</h4>
                                                    <input type="number" placeholder="Enter amount" name="money" min="0.001" step="0.001">
                                                </fieldset>
                                           
                                                <fieldset>
                                                    <h4 class="title-infor-account" style="color:white;">Address</h4>
                                                    <input type="text" placeholder="Discord username" type="" value="<?php echo $_Ethereum_Wallet_Address  ?>" readonly>
                                                </fieldset>
                                                <br>

                                                     <fieldset>
                                                 
                                                    <h4 class="title-create-item">Payment Proof</h4>
                                                    <label class="uploadFile">
                                                      <span class="filename">Submit Your Payment Proof.</span>
                                                 <input type="file" class="inputfile form-control" name="file" >
                                                  </label>
                                               </fieldset> 

                                                  <input id="pwd" name="transactionID" type="hidden" value="<?php echo substr(uniqid(), 4); ?>" >

                                       <input type="hidden" value="<?php echo $userid ?>">
                                        </div> 
                                    </div>
                                    <button class="tf-upload-img" type="submit" style="width: 50%;" name="submit">
                                        Deposit
                                    </button>           
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            </form>



            <script>
        function copyToClipboard() {
            const walletAddress = "<?php echo $_Ethereum_Wallet_Address; ?>";
            navigator.clipboard.writeText(walletAddress).then(() => {
                alert("Ethereum Wallet Address Copied!");
            }).catch(err => {
                console.error("Failed to copy:", err);
            });
        }
    </script>


    <?php include 'footer.php'  ?>         