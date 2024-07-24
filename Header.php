<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
      <?php include ('Nav.php'); ?>

    </head>

 <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Project!</div>
                <div class="masthead-heading text-uppercase">يهدف موقع Hand made online لعرض المنتجات  بطريقة سلسة تسهل على المشتري الاتطلاع عليها , تتم هذه العملية من خلال تسجيل حساب في الموقع ثم الاتطلاع على المنتجات اليدوية بمختلف انواعها  واختيار المناسب ويتيح الموقع خدمة الشراء والتواصل , و يوفر جميع سبل الراحة الممكنة حتى يتمكنون من تلبية طلباتهم بسهولة</div>

                    	    <li class="nav-item dropdown">
              <a class="btn btn-primary-edit btn-xl text-uppercase" href="" id="navbarDropdown" role="button" 
                 data-bs-toggle="dropdown" aria-expanded="false">
                  انشاء حساب
              </a>
                
		<ul name ="typeOfUser" l class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <li><a class="dropdown-item" href="Signupform.php" 
                        name=<?php $_SESSION["UserType"]="NormalUser" ?>
                        >مستخدم عادي</a></li>
                 
	         <li><a class="dropdown-item"   href="Signup.php" 
                        name=<?php $_SESSION["UserType"]="EmployeUser"?>
                      >مستخدم لديه مهنة </a></li>
                 
		</ul>
                      <div class="container">
     
            </li> 
                    
            </div>
</header>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>