<!DOCTYPE html>
<?php include ('Nav.php'); 
$EmplouerUid =$_GET['uid'];  


 if (isset($_GET['productID'])) {

  header("location:index.php");
 }


?> 
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <script src="js/jquery-3.2.1.min.js"></script>  
        <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
<script src="js/bootstrap.js"></script>    

    </head>
<body>
           
<section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <br>
                    <h2 class="section-heading text-uppercase">المنتجات</h2>
                    <h3 class="section-subheading text-muted"> لتسهيل التعامل معنا</h3>
                </div>
                
                 <div class="row">     
   <?php
  global $conn;
   $_SESSION['EmployeIDRelatedFortheProduct']=$EmplouerUid;
    $sql = "SELECT ID, NameOfProduct,PriceOfProduct,DiscriptionOfProduct,image1,EmployeUid,image2 from productdetails where EmployeUid ='$EmplouerUid' ";   
    $sql1 = "SELECT fname,lname,phone,email,city,region,image from users where uid ='$EmplouerUid'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $result = $conn->query($sql);  
if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()){   
    ?>    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link"  data-toggle="modal" data-target="#portfolioModal1<?php echo $row['ID']?>" id="Pro-Hashtagh"  href="#portfolioModal1">        
                                <?php if($_SESSION['type']=='employer' or $_SESSION['type']=='user' or $_SESSION['type']=='admin' ){ ?>
                                <div class="portfolio-hover">  
                                    <div class="portfolio-hover-content">انقر هنا لطلب المنتج من البائع </div>
                                </div>
                                <?php } else {?>
                                     <div class="portfolio-hover">  
                                    <div class="portfolio-hover-content">انت غير مسجل بالموقع الرجاء  تسجيل الدخول حتى تتمكن من طلب هذا المنتج من البائع     </div>
                                </div>
                               <?php }?>
                                <img class="img-fluid" src="./ImageOfProductsUploded/<?php echo $row['image1']; ?>">
                               
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo"اسم المنتج: " .$row["NameOfProduct"]. "";  ?></div>
                                <div class="portfolio-caption-heading"><?php echo"<i class='fa fa-dollar'></i>  سعر المنتج     : " .$row["PriceOfProduct"]. "";  ?></div>
                                <div class="portfolio-caption-heading"><?php echo" وصف المنتج: " .$row["DiscriptionOfProduct"]. "";  ?></div>                                                                     
                                <a class="btn btn-primary" href="ProductDetails.php?ProductID=<?php echo $row['ID']; ?>"> تفاصيل المنتج  </a> 
                                <?php 
                                if($_SESSION['type']=='admin'){
                            echo ' <a class="btn btn-danger " href="server.php?DeleteProductFromAdmin='.$row['ID'].'&DeleteProductRelatedToEmploye='.$row['EmployeUid'].'">حذف المنتج </a> ';
                                }
                                ?>
                                
                                    <?php 
                                if($_SESSION['uid']==$row['EmployeUid']){
                            echo ' <a class="btn btn-danger " href="server.php?DeleteProductFromAdmin='.$row['ID'].'&DeleteProductRelatedToEmploye='.$row['EmployeUid'].'">حذف المنتج </a> ';
                                }
                                ?>
                                
                                
                            </div>
                        </div>
                    </div>         
            

            <div class="portfolio-modal modal fade" id="portfolioModal1<?php echo $row['ID'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                          
                            <div class="col-lg-8">
                            <div class="col-lg" >  <img class="img-fluid" src="./UserUploadImages/<?php echo $row1['image']; ?>">     </div>
                                <div class="modal-body">
                                 <!-- Project details-->
                                 <h2 class="text-uppercase"><?php echo"معلومات البائع"   ?></h2>   <br>
                                 <p class="text-uppercase"><?php echo"اسم البائع: " .$row1["fname"]. "";  ?></p>
                                 <p class="text-uppercase"><?php echo" رقم الموبايل  : " .$row1["phone"]. "";  ?></p>
                                 <p class="text-uppercase"><?php echo" البريد الالكتروني  :" .$row1["phone"]. "";  ?></p>
                                
                                 <h1>العنوان</h1>
                                 <br>
                                 <p class="text-uppercase"><?php echo" المدينة : " .$row1["city"]. "";  ?></p>
                                 <p class="text-uppercase"><?php echo" المنطقة:  " .$row1["region"]. "";  ?></p>                 
                         
                                 <input style="  visibility: hidden;" type="text" class="form-control" id="myPopupInput" value="<?php echo $row['ID'];  ?>"/>
                                
                                 <button type="submit"  method="post"  class="btn btn-primary  btn-xl text-uppercase" style="background-color:#86b585;" >
                                        <i class="fas fa-bell"></i>   اغلاق                                 
                                 </button>                                                                
                               <?php    if($_SESSION['type']=='employer' or $_SESSION['type']=='user' or $_SESSION['type']=='admin' ){ ?> 
                                 <a  class="btn btn-primary btn-xl text-uppercase  "href="server.php?OrderProduct=<?php echo $row['ID']; ?>">  <i class="fas fa-bell"></i> أطلب الان </a> <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
  </div>        
  </div>                     
 <?php
}}
else{
    
    echo '<h3 style="color: red ; left:50%">لم يتم عرض اي منتج من قبل هذا البائع  </h3>';
}
?>
                     <h3 style="color: red"></h3>
            </div>      
            </div>
        </section>   
</body>    
</html>