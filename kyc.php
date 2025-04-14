<?php 
    include 'header.php';
    include 'db.php';


$err = "";
$msg = "";



    if (isset($_POST['submit'])) { 
        $username = trim($_POST['username']);
        $nationality = trim($_POST['nationality']);
        $idnumber = trim($_POST['cnumber']);

 

     if (empty($error) ){
       $filename = $_FILES["file"]["name"];
       $tempname = $_FILES["file"]["tmp_name"];
       $imgname = time().".png";
       $folder = "./pimage/".$imgname;
       $check = @getimagesize($tempname);
       $date = date('d-m-Y h:i:sa');
       if ($check === false) {

                       $err = 'Please only image are allowed';

       }else{
           $insert = mysqli_query($con, "INSERT INTO   kyc  (username, cardnumber,  nationality,  idcardimage) VALUES ( '$username',  '$idnumber', '$nationality',  '$imgname' ) ");

           if($insert){
               move_uploaded_file($tempname, $folder);
               
           $msg  = 'Kyc Have Being Sent For Verification';
           }
                         if ($insert) {
                               $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' ");
                                  if (mysqli_num_rows($query) > 0) {
                                      $row = mysqli_fetch_assoc($query);
                                      $email = $row['email'];
                                      
                      $subject = "Pending KYC Verification";
                      $body = "<h3> Dear $username,</h3>
                                   <br> 
                                
                                <p>I hope this email finds you well. We wanted to reach out to you regarding your account and bring to your attention that your Know Your Customer (KYC) verification is pending and it wating for approval</p>
                                
                                <p>Ensuring the accuracy and completeness of KYC documentation is crucial for both regulatory compliance and the security of your account. To expedite the process and unlock the full functionality of your account, we kindly request your prompt attention to completing the KYC verification.</p>
                                
                                <p><b>Rest assured that all information provided during the KYC verification process is treated with the utmost confidentiality and in compliance with applicable data protection regulations.</b></p>
                                <br> 
                                
                                <p>Should you encounter any difficulties or have any questions regarding the KYC verification process, our dedicated customer support team is available to assist you every step of the way. Please feel free to reach out to them at $_email</p>
                                <br> 
                                
                                <p>Thank you for your cooperation in this matter. We appreciate your understanding and look forward to having your KYC verification completed soon.</p>
                                <br> <br>
                                
                                <p>Best regards,</p>
                                
                                <p>$_site_name</p>
                                <p>$_email</p> ";
                                
                      sendMail($email,$subject,$body);
                  }
                  
                         }
                         
                          if ($insert) {
                               $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' ");
                                  if (mysqli_num_rows($query) > 0) {
                                      $row = mysqli_fetch_assoc($query);
                                      $email = $row['email'];
                                      
                      $subject = "Pending KYC Verification";
                      $body = "<h3> Dear $_site_name,</h3>
                                   <br> 
                                
                                <p>You have KYC to approve</p>
                                <p>Thank you for your attention to this matter.</p>
                                
                             
                                
                                <p>Best regards,</p>
                                
                                <p>$_site_name</p>";
                                
                      sendMail($_email,$subject,$body);
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
                                <h1 class="heading text-center">KYC Verificaton</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li>Kyc Page</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>

           <br><br>
                         <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                             <div class="form-create-item">
                                 <form action="kyc.php" method="POST" enctype="multipart/form-data">
                                    <h4 class="title-create-item"> ID Card Image</h4>
                                    <label class="uploadFile">
                                        <span class="filename">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</span>
                                        <input type="file" class="inputfile form-control" name="file" >
                                    </label>

                                   <!--  <h4 class="title-create-item">Back Of ID Card</h4>
                                    <label class="uploadFile">
                                        <span class="filename">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</span>
                                        <input type="file" class="inputfile form-control" name="file" >
                                    </label> -->

                                <div class="flat-tabs tab-create-item">
                                 
                                    <div class="content-tab">
                                        <div class="content-inner">
                                               
                                                    <h4 class="title-create-item">Nationality </h4>
                                                    <input type="text" placeholder="Home" name="nationality" required>
                                                    <br> <br>
    
                                                    <h4 class="title-create-item">ID Card Number</h4>
                                                    <input type="text" placeholder="Eg 1311414" name="cnumber" required>

                                                       <input type="hidden" name="username" value="<?php echo $row['username']  ?>">

                                                    <br> <br>
                                                    <button type="submit" name="submit" style="padding: 10px; font-size: 20px; " class="btn btn-primary">Upload Kyc</button>
                                                    <br>  <br>
                                                    </div>
                                                </form>
                                        </div>
                                       
                                               
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
<?php 
    include 'footer.php';
 ?>