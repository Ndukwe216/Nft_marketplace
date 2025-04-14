<?php 

include 'header.php';
include 'userdetails.php';

$err = "";
$msg = "";

if (!isset($_SESSION['id'])) {
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
}

$userid = $_SESSION['id'];

// Check if user has completed KYC verification
$query = "SELECT * FROM user WHERE status = 'inactive' AND id = '$userid'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<script>window.location.href = 'kyc.php';</script>";
    exit();
}

if (isset($_POST['submit'])) {
    $receiver_username = trim($_POST['receiver']);
    $amount = trim($_POST['money']);

    if (empty($receiver_username) || empty($amount)) {
        $err = "All fields are required.";
    } elseif (!is_numeric($amount) || $amount <= 0) {
        $err = "Invalid amount entered.";
    } else {
        // Fetch sender's balance
        $sender_query = mysqli_query($con, "SELECT account_balance FROM user WHERE id = '$userid'");
        $sender = mysqli_fetch_assoc($sender_query);

        if (!$sender) {
            $err = "User not found.";
        } elseif ($sender['account_balance'] < $amount) {
            $err = "Insufficient balance.";
        } else {
            // Fetch recipient details
            $receiver_query = mysqli_query($con, "SELECT id, account_balance FROM user WHERE username = '$receiver_username'");
            if (mysqli_num_rows($receiver_query) > 0) {
                $receiver = mysqli_fetch_assoc($receiver_query);
                $receiver_id = $receiver['id'];

                // Deduct amount from sender
                $new_sender_balance = $sender['account_balance'] - $amount;
                mysqli_query($con, "UPDATE user SET account_balance = '$new_sender_balance' WHERE id = '$userid'");

                // Add amount to recipient
                $new_receiver_balance = $receiver['account_balance'] + $amount;
                mysqli_query($con, "UPDATE user SET account_balance = '$new_receiver_balance' WHERE id = '$receiver_id'");

                // Log transaction
                $transaction_id = substr(uniqid(), 4);
                mysqli_query($con, "INSERT INTO transactions (sender_id, receiver_id, amount, transaction_id, type) 
                                    VALUES ('$userid', '$receiver_id', '$amount', '$transaction_id', 'transfer')");

                $msg = "Transfer successful!";
            } else {
                $err = "Recipient not found.";
            }
        }
    }
}

?>

<!-- Display Alerts -->
<?php
if ($err != "") {
    echo customAlert('error', $err);
}
if ($msg != "") {
    echo customAlert('success', $msg);
}
?>

<!-- Transfer Form -->
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Transfer Page</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Make a Transfer</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>                    
</section>

<form action="transfer.php" class="form-profile" method="POST">
    <div class="tf-create-item tf-section">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="sc-card-profile text-center">
                        <div class="card-media">
                            <img src="assets/img/profile-placeholder.png" alt="Profile">
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                    <div class="info-social">
                        <h4 class="title-create-item">Make a Transfer</h4>

                        <fieldset>
    <h4 class="title-infor-account" style="color:white;">Recipient Username</h4>
    <input type="text" placeholder="Enter username" name="receiver" id="receiver" required onkeyup="checkUsername()">
    <span id="usernameIndicator"></span> <!-- This is where the green or red icon will appear -->
</fieldset>    
                        <fieldset>
                            <h4 class="title-infor-account" style="color:white;">Amount</h4>
                            <input type="number" placeholder="Enter amount" name="money" required>
                        </fieldset>

                        <input type="hidden" name="transactionid" value="<?php echo substr(uniqid(), 4); ?>">

                        <button class="tf-upload-img" type="submit" style="width: 50%;" name="submit">
                            Transfer
                        </button>           
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<?php include 'footer.php'; ?>

<script>
function checkUsername() {
    let username = document.getElementById("receiver").value;
    let indicator = document.getElementById("usernameIndicator");
    let transferButton = document.querySelector("button[name='submit']");

    if (username.length === 0) {
        indicator.innerHTML = "";
        transferButton.disabled = true;
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "check_username.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText == "found") {
                indicator.innerHTML = "✅ <span style='color:green;'>Username found</span>";
                transferButton.disabled = false;
            } else {
                indicator.innerHTML = "❌ <span style='color:red;'>Username not found</span>";
                transferButton.disabled = true;
            }
        }
    };
    
    xhr.send("username=" + username);
}
</script>

