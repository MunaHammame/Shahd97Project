<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'composer\vendor\phpmailer\phpmailer\src\SMTP.php';
require 'composer\vendor\phpmailer\phpmailer\src\Exception.php';
require 'composer\vendor\phpmailer\phpmailer\src\PHPMailer.php';

if(isset($_POST['password-reset-token']) && $_POST['email'])
{
   
    include('conection.php');
    
    $emailId = $_POST['email'];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $emailId . "'");

    $row= mysqli_fetch_array($result);

  if($row)
  {
      echo 'يوجد ايميل'; 
     $token = md5($emailId).rand(10,9999);

     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );

    $expDate = date("Y-m-d H:i:s",$expFormat);

    $update = mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

    $link = "<a href='www.yourwebsite.com/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

   
    require_once 'composer/vendor/autoload.php';

    $mail = new PHPMailer(true);

    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "your_email_id@gmail.com";
    // GMAIL password
    $mail->Password = "your_gmail_password";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='muna.ziad.hammame@gmail.com';
    $mail->FromName='your_name';
    $mail->AddAddress('muna.ziad.hammame@gmail.com', 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }
  else{
    echo "Invalid Email Address. Go back";
    echo ''.$emailId.'';
  }
}
?>