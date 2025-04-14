<?php 

include 'header.php';
include 'userdetails.php';


$err = "";
$msg = "";


if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];

    $query = "SELECT * FROM user WHERE status = 'inactive' AND id = '$userid'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email']; // Only access if row exists

        echo "<script>window.location.href = 'kyc.php';</script>";
        exit();
    }

      if (mysqli_num_rows($result) >1) {
                           echo  "<script>
                                     window.location.href = 'withdrawl.php';
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



if (isset($_POST['submit'])){

    $money = trim($_POST['money']);

    $userid = trim($_SESSION['id']);
     $paymentaddress = trim($_POST['paymentaddress']);
    $username = trim($_POST['username']);
    $transactionid = trim($_POST['transactionid']);
    $amount = trim($_POST['amount']);
    $userid = $_SESSION['id'];



$sql = "SELECT account_balance FROM user WHERE id = '$userid'";
$result = mysqli_query($con, $sql);
$present = mysqli_num_rows($result);

if($present > 0){
    $row =  mysqli_fetch_array($result);
    $amount = $row['account_balance'];
   if($amount > $money){
    $sum=$amount-$money;
    $querys = "UPDATE user set account_balance = '$sum' WHERE id = '$userid' ";
    $result = mysqli_query($con,$querys );

         $querys = mysqli_query($con, "INSERT INTO withdrawl  (userid, transactionid,  username,  amount, payment_address) VALUES ( '$userid', '$transactionid', '$username' , '$money' , '$paymentaddress'  ) ");


      if ($querys) {
         $msg = 'Your Request to Withdraw has been submited. it is now waiting for approval';
                }


         if ($querys) {
             
        $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' ");
      if (mysqli_num_rows($query) > 0) {
          $row = mysqli_fetch_assoc($query);
          $email = $row['email'];
          
              $subject = "Pending withdrawl";
             $body = "<p>Dear $username</p>    <br> 

<p>We acknowledge receipt of your withdrawal request. Your withdrawal is currently pending processing.</p>

<p>The requested amount will be processed shortly and credited to your designated account.</p

<p>We appreciate your patience during this time. If you have any questions or concerns, please don't hesitate to reach out to our support team</p>
<br>

<p>Amount: <b>$money</b>ETH </p>

<p>Thank you for your understanding.</p>

<p>Best regards,</p>

<p>$_site_name</p>
<p>support@gmail.com</p> ";
                sendMail($email,$subject,$body); 

        }
}


         if ($querys) {
              $subject = "Pending withdrawl";
             $body = "<p>Dear $_site_name</p>    <br> 

<p>I trust this message finds you well. I am writing to inform you that a withdrawal request is pending your approval..</p>

<p>Your prompt attention to approving this withdrawal is appreciated. If you require any additional information or have any questions regarding this request, please feel free to reach out to me.</p

<p>We appreciate your patience during this time. If you have any questions or concerns, please don't hesitate to reach out to our support team</p>
<br>

<p>Thank you for your cooperation.</p>



<p>Best regards,</p>

<p>$_site_name</p>";

                sendMail($_email,$subject,$body); 

        }
        
   }else{  
    $err = 'insufficeint balnce';      
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
        // echo pageRedirect('3', 'login.php');
    }

?>

 
<?php unset($_SESSION['alert']); ?>




   <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">Withdrawal Page</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li>Make a Withdrawal </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>




     <form action="withdrawl.php" class="form-profile" method="POST" enctype="multipart/form-data">
            <div class="tf-create-item tf-section">

                <div class="themesflat-container">
                    <div class="row">
                         <div class="col-xl-3 col-lg-4 col-md-6 col-12">

                            <div class="sc-card-profile text-center">
                                <div class="card-media">
                                    <div class="tenor-gif-embed" data-postid="25794249" data-share-method="host" data-aspect-ratio="1" data-width="100%"><a href="https://tenor.com/view/chat-gif-25794249">Chat GIF</a>from <a href="https://tenor.com/search/chat-gifs">Chat GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                                </div>
                            <div id="upload-profile">
                                
                                   
                            </div>
                          
                            </div>
                         </div>

                         <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                                <h3>NOTE</h3>
                                            <P style="color: red;">Withdrawl Are  Approved Within 24 hour</P>
                                            <br>

                                        <div class="info-social">

                                            <h4 class="title-create-item">Make a Withdrawl</h4>


                                                <fieldset>
                                                    <h4 class="title-infor-account" style="color:white";>Amount</h4>
                                                    <input type="number" placeholder="Enter amount" name="money" required>
                                                </fieldset>
                                           
                                                <fieldset>
                                                    <h4 class="title-infor-account" style="color:white;">Address</h4>
                                                    <input type="text" placeholder="Enter Your Address" type="number" name="paymentaddress" required>
                                                </fieldset>
                                                <br>

                                                     <fieldset>
                                                 
                                                   

                                                  <input  id="pwd" name="transactionid" type="hidden" value="<?php echo substr(uniqid(), 4); ?>" >
                                        <input  id="pwd" name="userid" type="hidden" value="<?php echo $userid ?>" >
                                        <input type="hidden" value="<?php echo $username ?>" name="username">
                                        <input type="hidden" value="<?php echo $amount ?>" name="amount">
                                        </div> 
                                    </div>
                                    <button class="tf-upload-img" type="submit" style= width: 50%;" name="submit">
                                        Withdraw
                                    </button>           
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            </form>











<?php
include 'footer.php' 
?>