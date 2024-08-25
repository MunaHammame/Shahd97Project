

<!DOCTYPE html>
<?php include ('Nav.php'); 


  $SectorName= $_GET['SectorName'];

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
                    <h3 class="section-subheading "> لتسهيل التعامل معنا</h3>
                </div>

                 <div class="row">     

   <?php
  global $conn;

    $sql = "SELECT ProductId,ProductName, ProductPrice,ProductSector,ProductDescription,ProductsAmount,ProductsImg1,ProductsImg2,ProductsImg3,ProductsImg4"
            . " from products where ProductSector ='$SectorName' ";   
    $result = $conn->query($sql);  
if ($result->num_rows > 0) {
                if (isset($_GET['success'])): ?>
        <div class="alert alert-success">
            <strong> تم الطلب بنجاح!</strong> سيتم التواصل معك من قبل البائع لايصال الطلبية
        </div>
    <?php endif; ?> <?php
  if (isset($_GET['DeletedItem'])): ?>
        <div class="alert alert-danger">
            <strong> تم حذف المنتج بنجاح !</strong> تم ازالة المنتج
        </div>
    <?php endif; ?> <?php
    
    
    
    
    
while($row = $result->fetch_assoc()){
    if ($row['ProductsAmount']='0'){    
        $prodid=$row['ProductId'];
        $sql="DELETE FROM products WHERE ProductID =$prodid";
$conn->query($sql);
    }


    ?>    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->

                            <img class="img-fluid" style="width:60%;height:50%" src="./ImageOfProductsUploded/<?php echo $row['ProductsImg1']; ?>">

                        <div class="portfolio-item">

                            <div class="portfolio-caption">


                                <div class="portfolio-caption-heading"><?php echo"اسم المنتج: " .$row["ProductName"]. "";  ?></div>
                                <div class="portfolio-caption-heading"><?php echo"<i class='fa fa-dollar'></i>  سعر المنتج     : " .$row["ProductPrice"]. "";  ?></div>
                                <div class="portfolio-caption-heading"><?php echo" وصف المنتج: " .$row["ProductDescription"]. "";  ?></div>                                                                     
                                <a class="btn btn-primary" href="ProductDetails.php?ProductID=<?php echo $row['ProductId']; ?>"> تفاصيل المنتج  </a>                                
                               <?php if (isLoggedIn()){?>
                                <a class="btn btn-primary"href="server.php?OrderProduct=<?php echo $row['ProductId']; ?>&UserId=<?php echo $_SESSION['uid'];?>&Sector=<?php echo $SectorName;?> " <i class="fas fa-bell"></i> أطلب الان </a> 
                           <?php    } ?>

                              <?php if (isLoggedIn() && isset($_SESSION['id']) && $_SESSION['id'] == 103){
                                   ?>
                                <a class="btn btn-danger" href="server.php?DeletedProductID=<?php echo $row['ProductId'];?>&Sector=<?php echo $SectorName;?>" <i class="fas fa-bell"></i> حذف </a> 
                           <?php    } ?>   
                            </div>
                        </div>
                    </div>         


 <?php
}}

?>
                     <h3 style="color: red"></h3>
            </div>      
            </div>
        </section>   
</body>    
</html>