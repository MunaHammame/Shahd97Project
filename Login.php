 <head>
<meta charset="UTF-8">
<title></title>
<?php include ('Nav.php');?>

 
</head>
 <form class="form-custom" id="loginForm" method="post" >
        <?php display_error()  ?>
     <div class="form-label"> <h3 class="form-label">تسجيل الدخول</h3></div>
       

        <label class="form-label" for="username">اسم المستخدم</label>
        <input class="form-control " type="text" placeholder="اسم المستخدم" style="text-align:right" name="username">

        <label class="form-label" for="password">الرقم السري</label>
        <input class="form-control" type="password" placeholder="الرقم السري" style="text-align:right" name="password">

        <button class=" form-submit" type="submit" name="login_btn">تسجيل الدخول</button>
    
        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
            <a class="form-a" href="ForgetPassword.php">هل نسيت كلمة المرور ؟</a>
 </form>