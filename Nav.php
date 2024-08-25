  <?php 
  include('server.php');  
  ?>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sheahd Shop</title>       
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
       <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>     
        <link href="css/styles.css?v=<?php echo time(); ?>" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-12/assets/css/registration-12.css">


</head>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            
    <div class="container">
 <?php if(isLoggedIn() && $_SESSION['uid'] == '3347784754025'){?>     
 <a href="ApprovalUsers.php" class="notification">
  <i class="fas fa-user-plus">Inbox</i> 
  <span class="badge"> 
  <?php 
   global $conn;
   $sql = "SELECT * from users where isApproval=0 and type !='user' and type!='Admin' ; "; 
   $result = $conn->query($sql);
   $rowcount = mysqli_num_rows( $result );
   echo"<br> ".$rowcount. ""; ?>
   <br><br>
 </span>
  
</a>
      <a href="MangeAccounts.php" class="notification">
 ادارة الحسابات 
 
</a>  
      
 <?php }
 if(isLoggedIn() &&  $_SESSION['id'] == '103'){
 
   $userID= $_SESSION['uid'] ;

 ?>
  <a href="OrdersNotifactions.php" class="notification">
  <i class="far fa-comment-dots	"></i> 
  <span class="badge"> 
  <?php 
   global $conn;
   $sql = "SELECT * from ordertable where  Accepted=0;"; 
   $result = $conn->query($sql);
   $rowcount = mysqli_num_rows( $result );
 echo"<br> ".$rowcount. ""; ?>
   <br><br>
 </span>
</a>
 
 
 <?php }?>
 

          
 <a></a> <a class="navbar-brand" href="index.php"><img src="images/shahd97shop5.svg" alt="..." /></a>               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                 Menu
                 <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        
                         
  <?php if(isLoggedIn() &&  $_SESSION['id'] == '103'){     
  echo '<li class="nav-item"><a class="nav-link" href="AddNewProduct.php"> منتج جديد</a></li>';
  } ?>   
                        
                        
                        
                        <li class="nav-item"><a class="nav-link" href="index.php#services">خدماتنا</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#portfolio">التعليمات</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#about">عن المشروع</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#team">فريقنا</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#contact">تواصل معنا</a></li>                       
                       <?php if(isLoggedIn()){
                           echo'<li class="nav-item "><a href="ProfilePage.php?useruid='.$_SESSION["uid"].'" class="nav-link"> '.$_SESSION['fname']. ' اهلا </a></li>';
                                                      echo '<li class="nav-item" ><a class="nav-link" href="server.php?logout="1"><i class="fa fa-sign-out"></i>خروج</a><li>';

                           
                       } ?>
      	               <?php if(!isLoggedIn())
                       {
 			echo '<li class="nav-item"><a class="nav-link" href="login.php">تسجيل الدخول</a></li> ';
                        echo '<li class="nav-item"><a class="nav-link" href="SignupForm.php">التسجيل</a></li> ';
 			
		      } ?>                
                    </ul>                     
             </div>    
    </div>
           
</nav>





        
