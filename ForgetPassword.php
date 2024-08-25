<?php 
include('conection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
 <title>hand made</title>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
 <link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">
 <link rel="stylesheet" type="text/css" href="admin/css/animate.css">

 
</head>
<body align="right" style="background: linear-gradient(to bottom,  #ab89f1 0%, #fdaed5 100%); height: 100vh;" 
class="button animated fadeInDownBig">
 <br> <br>
 
 <div class="container">
    <div class="row">
         <div class="col-lg-8 col-md-7 col-md-offset-2">
         <br> 
            <form id="loginForm" method="post" class="list-group-item form-style" style="padding:2%">
                   <div class="card" > 
                 <h2 ><strong>:    نسيت كلمة المرور  </strong></h2>
            </div>

                 <div class="form-group">
                      <label class="control-label">:  اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ  </label>
                     <div>
                        <input type="text" class="form-control" name="email" />
                    </div>
                </div>
 

                <div class="form-group">
                    
                    <div   align="center">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="submit" class="btn btn-info btn-lg"> بحث عن حسابي </button>
                    </div><br>




<?php
if(isset($_POST['submit']))
  {
//------Genarte Passwrd-------------------------
  function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 10; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
    } return implode($pass);}
$Password_genrated= randomPassword();
//----------Create Connection-------------------
    $email = $_POST['email'];
    $sql1 = "SELECT * FROM users WHERE email='$email' ";
    $result = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
    echo '<div class="alert alert-success">.'."هذا البريد مسجل لدينا بالفعل و تم اعادة تعين كلمة المرور  وارسالها الى البريد الاكتروني الخاص بك   ".'</div>';
    $MailPassword = $Password_genrated;
    $Password_genrated = md5($Password_genrated);
$sql2 = "UPDATE users SET password=\"".$Password_genrated."\" WHERE email =\"".$email."\"";
$query_run = mysqli_query($conn,$sql2);
//------------Send mail----------------

$subject = 'نسيت كلمة المرور ';
$message = '   مرحبا بك في موقع مهنتي اونلاين   ،، يمكنك    استخدام 
كلمة المرور التالية لتسجيل الدخول 
   --->                '.$MailPassword.'   
   يمكنك تغير كلمة المرور من الاعدادات الخاصة بالحساب 
   ';
$headers = 'Recover your Account ' ;
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Mihnati Online <info@address.com>' . "\r\n";
mail($email, $subject, $message, $headers);
    
    }else{
      echo '<div class="alert alert-danger">'."نأسف ،، هذا البريد ليس مرتبط باي حساب ".'</div>';
    } }?>





 
                </form>
 
            </div>
   
      </form>
    </div>
  </div>
</div>

 </body>
</html>

 
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>




