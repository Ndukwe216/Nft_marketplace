<?php 
include 'header.php';

  $msg = "";
   $error = "";


     if (isset($_POST['prof']) && isset($_FILES['photo'])) {
      $file_name = $_FILES['photo']['name'];
      $file_size =$_FILES['photo']['size'];
      $file_tmp =$_FILES['photo']['tmp_name'];
      $file_type=$_FILES['photo']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
      $extensions= array("jpeg","jpg","png");
      
        if(in_array($file_ext, $extensions) === false){
            $err = "Extension not allowed, please choose a JPEG or PNG file.";
        }

        if(empty($err)){
            $newImageName = uniqid().".png";
            
            $sql = mysqli_query($con, "UPDATE user SET profileimage = '$newImageName' WHERE id = '$userid' ");

            move_uploaded_file($file_tmp, "pimage/".$newImageName);
            $msg = "Profile Image Updated successfully";
        }
  }


    $sql = mysqli_query($con, "SELECT * FROM  user WHERE id = '$userid' ");
          if (mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
              $_fname = $row['fullname'];
              $_Customurl = $row ['Customurl'];
              $_email = $row ['email'];
              $_Bio = $row ['Bio'];
              $_facebook = $row ['facebook'];
              $_twitter = $row ['twitter'];
              $_discord = $row ['discord'];
           }


   
            if (isset($_POST['submit'])) {
             $fname = $_POST['firstname'];
             $customurl = $_POST ['link'];
             $email = $_POST ['email'];
             $bio = $_POST ['bio'];
             $facebook =$_POST['facebook'];
             $twitter = $_POST['twitter'];
             $discord = $_POST['discord'];


     $sql = mysqli_query($con, "UPDATE user SET fullname = '$fname', Customurl = '$customurl', email = '$email', bio = '$bio', facebook = '$facebook', twitter = '$twitter', discord = '$discord' WHERE id = '$userid' ");

      if ($sql) {
       $msg = 'updated successfully';
      }
    }

        ?>

         <?php

    if($error != ""){
        echo customAlert('error', $error);
        // echo pageRedirect('3', 'register.php');
    }

    if ($msg != "") {
        echo customAlert('success', $msg);
        echo pageRedirect('1', 'profile.php');
    }

?>
                
            <!-- title page -->
            <section class="flat-title-page inner">
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">Edit Profile</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="index.php">Home</a></li>

                                    <li>Edit Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                    
            </section>



        <form action="profile.php" class="form-profile" method="POST" enctype="multipart/form-data">
            <div class="tf-create-item tf-section">

                <div class="themesflat-container">
                    <p class="btn btn btn-primary" style="padding: 20px;"> <a href="kyc.php"> Verify KYC</a> </p>
                    <br> <br>
                    <div class="row">
                         <div class="col-xl-3 col-lg-4 col-md-6 col-12">

                            <div class="sc-card-profile text-center">
                                <div class="card-media">
                                    <img height="80" width="80" src="pimage/<?php echo $row ['profileimage']?>">                         
                                </div>
                         <form method="POST" action="profile.php">
                            <div id="upload-profile">
                                <a href="#" class="btn-upload">
                                    Upload New Photo </a>
                                    <input id="tf-upload-img" type="file" name="photo">
                                    

                            </div>
                      
                         </div>

                               <button class="tf-button-submit mg-t-15" type="submit" name="prof">
                                        Update Image
                                    </button> 
                            </div>
                         </form>

                         <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                           

                                    <div class="form-infor-profile">
                                        <div class="info-account">
                                            <h4 class="title-create-item">Account info</h4>                                    
                                                <fieldset>
                                                    <h4 class="title-infor-account">First Name</h4>
                                                    <input type="text" placeholder="Trista Francis" name="firstname" value="<?php echo $_fname  ?>">
                                                </fieldset>
                                              
                                                <fieldset>
                                                    <h4 class="title-infor-account">Custom URL</h4>
                                                    <input type="text" placeholder="Axies.Trista Francis.com/" name="link" value="<?php echo $_Customurl  ?>">
                                                </fieldset>
                                                <fieldset>
                                                    <h4 class="title-infor-account">Email</h4>
                                                    <input type="email" placeholder="Enter your email" name="email" value="<?php echo $_email  ?>">
                                                </fieldset>
                                                <fieldset>
                                                    <h4 class="title-infor-account">Bio</h4>
                                                    <textarea tabindex="4" rows="5" name="bio"><?php echo $_Bio  ?></textarea>
                                                </fieldset> 
                                        </div>

                                        <div class="info-social">
                                            <h4 class="title-create-item">Your Social media</h4>                                    
                                                <fieldset>
                                                    <h4 class="title-infor-account">Facebook</h4>
                                                    <input type="text" placeholder="Facebook username" name="facebook" value="<?php  echo $_facebook ?>">
                                                </fieldset>
                                                <fieldset>
                                                    <h4 class="title-infor-account">Twitter</h4>
                                                    <input type="text" placeholder="Twitter username" name="twitter" value="<?php echo $_twitter  ?>">
                                                </fieldset>
                                                <fieldset>
                                                    <h4 class="title-infor-account">Discord</h4>
                                                    <input type="text" placeholder="Discord username" name="discord" value="<?php echo $_discord  ?>">
                                                </fieldset>
                                        </div> 
                                    </div>
                                    <button class="tf-button-submit mg-t-15" type="submit" name="submit">
                                        Update Profile
                                    </button>           
                                </form>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
<?php 
    include 'footer.php';
 ?>