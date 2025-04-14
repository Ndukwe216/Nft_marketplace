<?php 
    include 'header.php';
   




$err = "";
$msg = "";

$fullname  = $username = $email  = $password = "";



if (isset($_POST['submit'])) {
            // Fullname validation
    if (empty($_POST['name'])) {
        $err = 'Enter your fullname';
    }else{
        $fullname = text_input($_POST['name']);
    }




        // Email validation 
    if (empty($_POST['email'])) {
        $err =  'Email address is required';
    }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
        $err = 'Invild email';
    }else{
        $email = text_input($_POST['email']);
        $check_mail = mysqli_query($con, "SELECT email FROM user WHERE email = '$email' ");
        if (mysqli_num_rows($check_mail) == 1) {
        $err =  'Email already exist';
        }else{
            $email = text_input($_POST['email']);
        }
    }
        // Username validation 
    if (empty($_POST['username'])) {
        $err =  'Username is required';

    }else{
        $username = text_input($_POST['username']);
        $username = $_POST['username'];
        $check_username = mysqli_query($con, "SELECT username FROM user WHERE username = '$username' ");
        if (mysqli_num_rows($check_username) == 1) {
            $err = 'Username already exist';
        }else{
          $username = text_input($_POST['username']);
        }
    }  
        // Password validation
    if (empty($_POST['password'])) {
                $err =  'enter your password';
        }elseif (strlen($_POST['password']) < 6 ) {
                 $err = 'password should be more than 6 characters';
        }else{
                $password = text_input($_POST['password']);
     } 

    $date = date('d-m-Y h:i:sa');

        $otpvalidation = trim($_POST['otpgenerate']);
                if (empty($err)) {
                    $insert = mysqli_query($con, "INSERT INTO user (fullname, email,  password , otp, username ) VALUES ('$fullname',  '$email', '$password', '$otpvalidation', '$username' )");
                
                  
                 if ($insert) {
                      $subject = "Account Registration and Verification Code";
                      $body = "<h3>$username</h3>
           <br> 

        <p>I hope this email finds you well. We are delighted to inform you that your account registration process has been successfully initiated with us. Welcome aboard!</p>

        <p>To ensure the security of your account and to complete the registration process, we kindly request you to verify your account by providing the verification code provided below:</p>

        <p>Verification Code: <b>#$otpvalidation</b></p>
        <br> <br>

        <p>Once verified, you will be able to login  to your account . Should you encounter any difficulties during this process or have any questions, please don't hesitate to reach out to our customer support team at Support@gmail.com.</p>
        <br> <br>

        <p>Thank you for choosing us. We look forward to serving you and ensuring a seamless experience on our platform.</p>
        <br> <br>

        <p>Best regards,</p> 
        <p>$_site_name</p>
        <p>support@gmail.com</p>";
                      sendMail($email,$subject,$body);
                  }
                if ($insert) {
                 $msg = 'Registration Successfully';
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
        echo pageRedirect('3', 'otp.php');
    }

?>
                
            <!-- title page -->
            <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">Signup</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                   
                                    <li>Signup</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>

            <section class="tf-login tf-section">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tf-title-heading ct style-1">
                                Signup To AxiesNFTs
                            </h2>

                          

                            <div class="flat-form box-login-email">
                               

                                <div class="form-inner">
                                    <form action="signup.php" id="contactform" method="POST">
                                        <input id="name" name="name" tabindex="1" value="" aria-required="true" required type="text" placeholder="Your Full Name">

                                        <input id="username" name="username" tabindex="3"  value="" aria-required="true" type="text" placeholder="Your Username" required>

                                        <input id="email" name="email" tabindex="2"  value="" aria-required="true" type="email" placeholder="Your Email Address" required>

                                        <input id="pass" name="password" tabindex="3"  value="" aria-required="true" type="password" placeholder="Set Your Password" required>

                                         <input id="pass" name="otpgenerate" tabindex="3"  value="<?php echo substr(uniqid(), 5); ?>" type="hidden"  required>

                                          <!-- <input id="pass" name="validate" tabindex="3"  value="" aria-required="true" type="text" placeholder="otp" required> -->

                                        <div class="row-form style-1">
                                            <label>Remember me
                                                <input type="checkbox">
                                                <span class="btn-checkbox"></span>
                                            </label>
                                            <a href="#" class="forgot-pass">Forgot Password ?</a>
                                        </div>

                                        <button class="submit" type="submit" name="submit">Signup</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Footer -->
<?php 
    include 'footer.php';
 ?>