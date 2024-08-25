


<!DOCTYPE html>
<html>
<head>
 <?php   include ('Nav.php'); ?>
<title>Page Title</title>
<style>
    body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
    margin-top: 50px;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
</head>
<body>
<?php 
global $conn;
 
  $uid = $_GET['useruid'];
  $query = "SELECT * FROM users WHERE uid = $uid";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();




?>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                     
                      <img src="UserUploadImages/<?php echo ''.$row['image'].'';?>" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">       
                      <h4><?php echo ''.$row['fname'].' '.$row['lname'].'';?></h4>
                       <p class="text-muted font-size-sm"> <?php echo ''.$row['type'].'';?> :نوع الحساب  </p>
                       <?php if ($row['type'] === 'employer'){?><img style="width:30px;height: 30px;"src='assets/img/certificate.png' ><p class="text-secondary mb-1"><?php echo ''.$row['career_area'].'';?>تعمل في مجال </p>  <a href="ProductDescription.php?uid=<?php echo $row['uid']; ?>" class="btn btn-primary">تصفح المنتجات </a><?php }?>
                                                        
                    </div>
                  </div>
                </div>
              </div>
  
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo ''.$row['fname'].' '.$row['lname'].'';?>
                    </div>
                  </div>
                     <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">UserName</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ''.$row['alias'].'';?>
                    </div>
                  </div>                                      
 <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birthday</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ''.$row['birthday'].'';?>
                    </div>
                  </div>
                    
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       <?php echo ''.$row['email'].'';?>
                    </div>
                  </div>
        
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ''.$row['phone'].'';?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ''.$row['city'].', '.$row['region'].'';?>
                    </div>
                  </div>
                            <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">join us at</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ''.$row['join_at'].'';?>
                    </div>
                  </div>
                   
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">this User is Approval?</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php if( $row['isApproval'] == 0)
                     {
                         echo 'this user is not approved by admin to publish his products yet';
                     }
                     else echo 'this user is approved by admin to publish his products in website ';
                     ?>
                    </div>
                  </div>
              
             <hr>
                 
                  
                </div>
              </div>





            </div>
          </div>

        </div>
    </div>
</body>
</html>