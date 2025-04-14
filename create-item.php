<?php 
include 'header.php';

if (empty($_SESSION["id"])) {
    echo "<script> window.location.href = 'login.php'; </script>";
    exit();
}

$err = "";  // Initialize error variable
$msg = "";  // Initialize message variable

$userid = $_SESSION['id'];

// Check if user is inactive (KYC not verified)
$query = "SELECT * FROM user WHERE status = 'inactive' AND id = '$userid'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<script>
            alert('Please Verify Your KYC To Access This Page');
            window.location.href = 'kyc.php';
          </script>";
    exit();
}

if (isset($_POST['mint'])) {
    $price = trim($_POST['price']);
    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);
    $gasfee = trim($_POST['gasfee']);
    $mint_transactionid = trim($_POST['mint_transactionid']);
    
    // Fetch user balance
    $query = "SELECT account_balance, username, email FROM user WHERE id = '$userid'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userbalance = $row['account_balance'];
        $username = $row['username'];
        $email = $row['email'];

        if ($userbalance >= $gasfee) {
            // Deduct gas fee
            $update_balance = "UPDATE user SET account_balance = account_balance - '$gasfee' WHERE id = '$userid'";
            mysqli_query($con, $update_balance);

            if (!empty($_FILES["file"]["name"])) {
                $filename = $_FILES["file"]["name"];
                $tempname = $_FILES["file"]["tmp_name"];
                $imgname = time() . ".png";
                $folder = "./pimage/" . $imgname;

                $check = @getimagesize($tempname);
                if ($check === false) {
                    $err = "Please upload a valid image file.";
                } else {
                    // Insert minting request
                    $insert = mysqli_query($con, "INSERT INTO usermint 
                        (userid, mint_transactionid, username, price, title, category, description, nft_image) 
                        VALUES ('$userid', '$mint_transactionid', '$username', '$price', '$title', '$category', '$description', '$imgname')");

                    if ($insert) {
                        move_uploaded_file($tempname, $folder);

                        // Email to user
                        $subject = "NFT Minting Request Submitted";
                        $body = "<h3>Dear $username,</h3>
                            <p>Your request to mint NFTs is currently pending approval.</p>
                            <p>Our team is reviewing the details, and we will notify you once it's processed.</p>
                            <p>Thank you for your patience.</p>
                            <p>Best regards,</p>
                            <p>$_site_name</p>";

                        sendMail($email, $subject, $body);

                        // Email to admin
                        $admin_subject = "New NFT Minting Request";
                        $admin_body = "<h3>Dear Admin,</h3>
                            <p>A new NFT minting request has been submitted and is awaiting your approval.</p>
                            <p>Please review and process it as soon as possible.</p>
                            <p>Best regards,</p>
                            <p>$_site_name</p>";

                        sendMail($_email, $admin_subject, $admin_body);

                        $msg = "Minting request has been sent for approval.";
                    } else {
                        $err = "Error processing mint request.";
                    }
                }
            } else {
                $err = "Please upload an image file.";
            }
        } else {
            echo "<script>
                    alert('Insufficient balance for gas fee. Please make a deposit.');
                    window.location.href = 'addfunds.php';
                  </script>";
            exit();
        }
    } else {
        $err = "User not found.";
    }
}
?>

<?php
if (!empty($err)) {
    echo customAlert('error', $err);
}

if (!empty($msg)) {
    echo customAlert('success', $msg);
    echo pageRedirect('3', 'index.php');
}
?>

<!-- Title Page -->
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Mint NFT</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Create Item</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>                    
</section>

<div class="col-xl-12 col-lg-12 col-md-12 col-12">
    <div class="form-create-item">
        <form action="create-item.php" method="POST" enctype="multipart/form-data">
            <h4 class="title-create-item">Upload File</h4>
            <label class="uploadFile">
                <span class="filename">PNG, JPG, GIF, WEBP or MP4. Max 200MB.</span>
                <input type="file" class="inputfile form-control" name="file" required>
            </label>

            <div class="flat-tabs tab-create-item">
                <div class="content-tab">
                    <div class="content-inner">
                        <h4 class="title-create-item">Price</h4>
                        <input type="number" placeholder="Enter price (ETH)" name="price" required step="0.001">

                        <h4 class="title-create-item">Title</h4>
                        <input type="text" placeholder="Item Name" name="title" required>

                        <h4 class="title-create-item">Category</h4>
                        <select name="category" required class="form-control" style="height:60px; background:#343444;border:1px solid #7f8a97;color:#fff;font-size:20px;">
                            <option value="">Select Category</option>
                            <?php
                            $categoryQuery = "SELECT id, category_name FROM category";
                            $categoryResult = mysqli_query($con, $categoryQuery);
                            if ($categoryResult && mysqli_num_rows($categoryResult) > 0) {
                                while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                    echo "<option value='" . htmlspecialchars($categoryRow['category_name']) . "'>" . htmlspecialchars($categoryRow['category_name']) . "</option>";
                                }
                            } else {
                                echo "<option value=''>No categories available</option>";
                            }
                            ?>
                        </select>

                        <h4 class="title-create-item">Description</h4>
                        <textarea placeholder="e.g. 'This is a very limited item'" name="description" required></textarea>
                        <h4 class="title-create-item">Gas Fee</h4>
                        <input type="number" name="gasfee" value="<?php echo $_Gasfee; ?>" readonly>
                        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                        
                        <input type="hidden" name="userbalance" value="<?php echo $userbalance; ?>">
                        <input type="hidden" name="mint_transactionid" value="<?php echo substr(uniqid(), 4); ?>">

                        <br><br>
                        <button type="submit" name="mint" class="btn btn-primary" style="padding: 10px; font-size: 20px;">Mint</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
