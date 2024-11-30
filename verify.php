<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "./includes/connection.php";
if (isset($_POST['verify_code'])) {
  if($_SESSION['exp_time'] < time()){
    header("location: ./forgetpassword.php?error=OTP Expired");
    exit();
  }else{
    $otp = $_POST['verify_code'];
    if ($otp == $_SESSION['session_otp']) {
      header("location: ./reset.php");
      exit();
    } else {
      unset($_SESSION['session_otp'], $_SESSION['exp_time'], $_SESSION['reset_pass']);
      header("location: ./verify.php?error=Invalid OTP");
      exit();
    }
  }
}
if (isset($_POST['reset_pass'])) {
  $email = $_POST['reset_pass'];
  $_SESSION['reset_pass'] = $_POST['reset_pass'];
  $sql = "select * from users where email='$email'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result) == 0) {
    header("location: ./forgetpassword.php?error=Email Not Registered");
    exit();
  } else {
    require_once './vendors/autoload.php';
    $otp = random_int(100000, 999999);
    $_SESSION['session_otp'] = $otp;

    $exp_time = time() + 600;
    $_SESSION['exp_time'] = $exp_time;

    $mail = new PHPMailer(true);
    try {
      $mail->isSMTP();                                   //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';              //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                          //Enable SMTP authentication
      $mail->Username   = 'bloodkinship051@gmail.com';       //SMTP username
      $mail->Password   = 'humtjoksvwtmegij';            //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
      $mail->Port       = 465;                           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      $mail->setFrom('bloodkinship051@gmail.com', 'Blood Kinship');
      $mail->addAddress($email);                         //Name is optional
      $mail->addReplyTo('no-reply@bloodkinship.com', 'Do Not Reply To This Mail');

      $mail->isHTML(true);                               //Set email format to HTML
      $mail->Subject = 'Forgot Password Reset Code';
      $mail->Body    = "<p>This is The <b>One-Time-Password (OTP)</b> To Change Your Password For Account At Blood Kinship</p><p>To Reset Password Enter The Following OTP : <b>$otp</b></p><p><b><i>NOTE : This OTP Will Not Work After 10 Minutes</i></b></p>";

      $mail->send();
    } catch (Exception $e) {
      die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
  }
}
if(!isset($_SESSION['reset_pass'])){
  header("location: ./forgetpassword.php?error=Invalid Request");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify Account</title>
  <script src="https://kit.fontawesome.com/3477ae541c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <style>
   body{
    background-color: #d3d3d3;
   }
  form{
    display:flex;
    align-items: center;
    justify-content: center; 
    height: 80vh;
  }
  </style>
</head>

<body>
<form class="container" style="display:flex;align-items: center;justify-content: center; height: 80vh;" action="verify.php" method="POST">
    <div class="card text-center" style="width: 300px;">
      <div class="card-header h5 " style="color: #fff; background-color:#ff6967">Verify Account</div>
      <div class="card-body px-5">
        <h5 class="card-text py-2">
        Enter the 6 digit verification code sent to your email
</h5>
        <small>(if not receive do check spam folder)</small>
        <div class="form-outline">
        <input type="number" inputmode="numeric" name="verify_code" placeholder="Verification Code" required />
          <label class="form-label" for="typeEmail">Email input</label>
        </div>
        <button type="submit" name="submit" class="btn  w-100" style="color: #fff; background-color:#ff6967">Verify</button>
      </div>
    </div>
  </form>
</body>

</html>