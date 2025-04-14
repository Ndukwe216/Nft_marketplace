<?php
include 'db.php';

include 'mailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once "mailer/PHPMailer.php";
require_once "mailer/SMTP.php";
require_once "mailer/Exception.php";

   $sql = mysqli_query($con, "SELECT * FROM setting WHERE id = 1 ");
  if (mysqli_num_rows($sql) > 0) {
     $row = mysqli_fetch_assoc($sql);
     $_site_url = $row['Siteurl'];
     $_site_name = $row['sitename'];
     $_email = $row['email'];
     $_Social_Contact = $row['socialcontact'];
     $_Gasfee = $row['gas_Fee'];
     $_Ethereum_Wallet_Address = $row['walletaddress'];
     $_mail_host = $row['mailhost'];
     $_webmail = $row['webmail'];
     $_mail_password = $row['mailpassword'];
     $_mail_port = $row['mailport'];
     $_mail_smtp_secure = $row['mailsmtpsecure'];
  }

   $sql = mysqli_query($con, "SELECT * FROM user ");
     if (mysqli_num_rows($sql) > 0) {
     $row = mysqli_fetch_assoc($sql);
     $email = $row['email'];
   
}

function sendMail($email, $subject, $message){
   include 'db.php';
    $mail = new PHPMailer();
    //SMTP Settings (use default cpanel email account)




   $sql = mysqli_query($con, "SELECT * FROM setting  ");
  if (mysqli_num_rows($sql) > 0) {
     $row = mysqli_fetch_assoc($sql);
     $_site_url = $row['Siteurl'];
     $_site_name = $row['sitename'];
     $_email = $row['email'];
     $_Social_Contact = $row['socialcontact'];
     $_Gasfee = $row['gas_Fee'];
     $_Ethereum_Wallet_Address = $row['walletaddress'];
     $_mail_host = $row['mailhost'];
     $_webmail = $row['webmail'];
     $_mail_password = $row['mailpassword'];
     $_mail_port = $row['mailport'];
     $_mail_smtp_secure = $row['mailsmtpsecure'];
  }

    $mail->isSMTP();
    $mail->Host = $row['mailhost']; //
    $mail->SMTPAuth = true;
    $mail->Username = $row['webmail']; // Default cpanel email account
    $mail->Password = $row['mailpassword']; // Default cpanel email password
    $mail->Port = $row['mailport']; // 587
    $mail->SMTPSecure = $row['mailsmtpsecure']; // tls

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom( $row['webmail'] , $row['sitename']); // Email address/ Bank bane shown to reciever
    $mail->addAddress($email);
    $mail->AddReplyTo( $row['webmail'], $row['sitename']); // Email address/ Bank bane shown to reciever
    $mail->Subject = $subject;
    $mail->MsgHTML($message);
    $send = $mail->Send();
    return $send;
}

function customAlert($case, $content){
    switch ($case) {
      case 'success':
        $mesg =  '<script type="text/javascript">
          $(document).ready(function() {
              swal("Success", "'.$content.'", "success")    
          });
        </script>';
        break;

        case 'error':
          $mesg = '<script type="text/javascript">
              $(document).ready(function() {
                  sweetAlert("Error", "'.$content.'", "error")    
              });
          </script>'; 
        break;
      default:
        break;
    }
  return $mesg;
}

  
function text_input($data) {
  global $con;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($con,$data);
  return $data;
}
   
function pageRedirect($sec, $route){
  $c = "<meta http-equiv='refresh' Content='".$sec."; url=".$route." ' />";
  return $c;
}






?>