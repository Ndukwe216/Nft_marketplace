<?php
include 'db.php';
include 'header.php';

$err = "";
$msg = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $err = 'Email and Password are required';
    } else {
        $email = mysqli_real_escape_string($con, $email);

        // Fetch user from database
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            $err = 'Incorrect email or password';
        } elseif ($row['status'] == 'blocked') {
            $err = 'Your account is blocked. Contact support.';
        } elseif ($password !== $row['password']) { // Directly compare plain text passwords

            $err = 'Incorrect email or password';
        } else {
            $_SESSION['id'] = $row['id'];
            $msg = 'Login successful';
            echo pageRedirect('3', 'index.php');
        }
    }
}

// Show messages
if (!empty($err)) echo customAlert('error', $err);
if (!empty($msg)) echo customAlert('success', $msg);



    if($err != ""){
        echo customAlert('error', $err);
        // echo pageRedirect('3', 'register.php');
    }

    if ($msg != "") {
        echo customAlert('success', $msg);
        echo pageRedirect('3', 'index.php');
    }

?>
                
            <!-- title page -->
            <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">Login</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    
                                    <li>Login </li>
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
                                Login To AxiesNFTs
                            </h2>

                            
                                       

                            <div class="flat-form box-login-email">
                                

                                <div class="form-inner">
                                    <form action="login.php" id="contactform" method="POST">
            
                                        <input id="email" name="email" tabindex="2"  value="" aria-required="true" type="email" placeholder="Your Email Address" required >

                                         <input id="password" name="password" tabindex="2"  value="" aria-required="true" type="password" placeholder="Your Password " required >

                                        <div class="row-form style-1">
                                            <label>Remember me
                                                <input type="checkbox">
                                                <span class="btn-checkbox"></span>
                                            </label>
                                            <a href="forgot_password.php" class="forgot-pass">Forgot Password ?</a>
                                        </div>

                                        <button class="submit" type="submit" name="login">Login</button>
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