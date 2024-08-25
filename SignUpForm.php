<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('Nav.php');?>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="vh-100">
  <section class="gradient-custom">
  <div class="row justify-content-center align-items-center h-100 py-3">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">    
           <?php display_error()  ?>
           <form id="registrationForm" method="post" class="card-body form" enctype="multipart/form-data">
               <div class="row mb-4 form-label">   <h3 class="pb-md-0 mb-md-4">إنشاء حساب </h3></div>
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline"> 
                     <label class="form-label" for="firstName">إسم المستخدم</label>
                    <input type="text" id="User_Name" name="username" class="form-control form-control-lg" />                   
                  </div>
                </div>       
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="lastName">الإسم الأول </label>
                    <input name="fname" type="text"  class="form-control form-control-lg" />               
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="lastName">الإسم الأخير </label>
                    <input id="lastName" name="lname"  type="text"  class="form-control form-control-lg" />               
                  </div>
                </div>                        
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div data-mdb-input-init class="form-outline datepicker w-100">
                       <label for="birthdayDate" class="form-label">تاريخ الميلاد</label>
                   <input type="date" class="form-control form-control-lg" id="birthdayDate" name="birthday" placeholder="YYYY-MM-DD"/>              
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="emailAddress">البريد الإلكتروني</label>
                   <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" />
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                 <label class="form-label" for="phoneNumber">رقم الهاتف</label>
               <input type="tel" id="phoneNumber" name="phone" class="form-control form-control-lg" />
                  </div>
                </div>
              </div>       
               
               
                   <div class="row">
                       
                         <div class="col-md-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                 <label class="form-label" for="phoneNumber">العنوان بالتفصيل</label>
               <input  name="Address_input" class="form-control form-control-lg" />
                  </div>
                </div>
              </div>       

               <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                    <label class="form-label">كلمة السر<span class="text-danger">*</span></label>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
             <input type="password" class="form-control" name="password1" id="password" placeholder="Choose password (5-15 chars)" value="">
          </div>   
            </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
         <label class="form-label ">تأكيد كلمة السر <span class="text-danger">*</span></label>

 <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
             <input type="password" class="form-control"  name="password2" id="cpassword" placeholder="Confirm your password" value="">
           </div>                    </div>
                </div>
              </div>

               <div class="row ">
                   <div class="col-md-12 mb-1  pb-2">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input data-mdb-ripple-init class="btn btn-submit btn-lg" type="submit" name="register" value="إنشاء حساب" />         
                          </div>
              </div>
            </form>       
        </div>
      </div>
    </div>
  </section>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>