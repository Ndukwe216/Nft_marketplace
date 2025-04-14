<?php 
	include 'header.php';
	include 'userdetails.php';


$err = "";
$msg = "";

  if (isset($_POST['submit'])) {
     $otp = trim($_POST['usercode']);
    
   if (empty($error)) {
          $sql = mysqli_query($con, "SELECT * FROM user WHERE otp = '$otp'  ");
          if (mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
              $_otp = $row['otp'];

              if ($verification == $_verification ) {
                  $_SESSION['otp'] = $_verification;
                  $msg = 'Account Verified';                          
              }
      }else{
                      $err = 'Incorrect OTP';


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
        echo pageRedirect('3', 'login.php');
    }

?>

	

  


  <section class="tf-login tf-section">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tf-title-heading ct style-1">
                                Account Verification  
                            </h2>

                            <div class="flat-form box-login-email">
                                <div class="box-title-login">
                                    <h5 style="color: red;"> A verification Code Has Been Sent to your Email  </h5>
                                </div>

                                <div class="form-inner">
                                    <form action="" id="contactform" method="POST">

                                         <input id="password" name="usercode" tabindex="2"  value="" aria-required="true" type="text" placeholder="Enter OTP Code " required >

                                        <button class="submit" type="submit" name="submit">Verify</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>





<?php 

	include 'footer.php';
?>