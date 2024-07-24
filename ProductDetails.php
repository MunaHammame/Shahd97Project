<!DOCTYPE html>
<html>
<head>
  <title>Title of the document</title>
  <?php 
  include('Nav.php');
  $ProductID=$_GET['ProductID'];
  ?>
</head>
<style>
  /* Split the screen in half */
.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Control the left side */
.left {
  left: 0;
  
}

/* Control the right side */
.right {
  right: 0;
  background-color: #c8baba;
  margin-top: 90px;
}

/* If you want the content centered horizontally and vertically */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

/* Style the image inside the centered container, if needed */
.centered img {
  width: 150px;
  height: 150px;
  
}  
.form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
 
}    
section#comment{
  background-color: #212529;
  background-image: url("../assets/img/map-image.png");
  background-repeat: no-repeat;
  background-position: center;
}
.MunaTest{
  border : solid 4px red;
  margin-left: 150px;
  margin-top: 100px;
  overflow-x: auto;  
}
      .comment {
       margin-left: 100px;
       word-wrap: break-word;
       overflow-x: scroll;
       white-space: nowrap;
      }
        .FixedHeightContainer 
        {
            float:  right;
            height: 650px;      
            border: 1px solid red; 
        }
        .Content
        {
            height: 65%;
            width:  95%;
            overflow-y: auto;
            border: 1px solid red; 
        }
        .mainContainer{
            width: 550px;
            height: 90px;
            border:  2px solid black;         
            margin-left: 5px;
            margin-bottom: 6px;
            background-color: white;
            
        }
        .mainContainer img{
            border:solid 3px #000;
            margin-left: -400px;
            width: 50px;
            height: 50px;
        }
           .mainContainer .header{
            margin-top: -50px;
            background-color: #dcbaba;
           
        }
        .mainContainer p{
            font-family: Arial, Helvetica, sans-serif;
        }
            .mainContainer a{
            color: #6e70ae;
        }
        
</style>
<body>
<?PHP 
 if($_GET['CommentID'])
 {
 $CommentIDFromPost=  $_GET['CommentID'];
$var= filter_input(INPUT_GET, 'uid');
    global $conn;
    $sql = "UPDATE commenttable SET ViewdByEmploye='1' WHERE CommentID=$CommentIDFromPost";
    if ($conn->query($sql) === TRUE)
{
  echo "<h3>Record updated successfully</h3>";

}  
 }
 global $conn;
 $sql = "SELECT ID, NameOfProduct,PriceOfProduct,DiscriptionOfProduct,image1,EmployeUid,image2 from productdetails where ID ='$ProductID' ";   
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();

?>
<div class="split left">
  <div class="centered">
      <h2>صور  المنتج  </h2>
      <br>
      <img src="ImageOfProductsUploded/<?php echo ''.$row['image1'].'' ?>" alt="Avatar woman">
      <img src="ImageOfProductsUploded/<?php echo ''.$row['image2'].'' ?>" alt="Avatar woman">
      <h3 style="text-algin:right"> <?php echo ''.$row['NameOfProduct'].'' ?> : أسم المنتج</h3>
      <h3 style="text-algin:right"> <?php echo ''.$row['PriceOfProduct'].'' ?> : سعر المنتج</h3>
      <h3 style="text-algin:right"> <?php echo ''.$row['DiscriptionOfProduct'].'' ?> : وصف المنتج</h3>
  </div>
</div>
 <form method="post" enctype="multipart/form-data">
<div class=" split right FixedHeightContainer">
<input type="text" style="visibility: hidden" value="<?Php echo ''.$row['EmployeUid'].'';?>" name="EmployeUid">
<h3>التعليقات</h3>  
<?PHP
 global $conn;
 $sql = "SELECT * from commenttable inner join users on UserID=uid where PostID_ProductID= $ProductID and NotificationType='comment'" ;   
 $result = $conn->query($sql);
 while($row = $result->fetch_assoc())
 { 
 echo '<div class="mainContainer"><img src="UserUploadImages/'.$row['image'].'"><div class="header">'
         . '<a  href="ProfilePage.php?useruid='.$row["uid"].'">'.$row['fname'].' '.$row['lname'].'</a> '.'Comment At '.$row['CommentDate']. 
         '</div ><div class="comment"><p>'.$row['CommentArea']. '';
 
 if($_SESSION['type']=='admin'){
    echo ' <a href="server.php?CommentIDTobeDelte='.$row['CommentID'].='&ProductdeleteComment='.$row['PostID_ProductID'].'">
      <img src="assets/img/cancel.png" height="20px" style="margin-left: 300px;border:none;width:30px;height:30px"></a>';
}
 if($_SESSION['uid']==$row['EmployeUid']){
    echo ' <a href="server.php?CommentIDTobeDelte='.$row['CommentID'].='&ProductdeleteComment='.$row['PostID_ProductID'].'">
      <img src="assets/img/cancel.png" height="20px" style="margin-left: 300px;border:none;width:30px;height:30px"></a>';
}
 
 echo '</p></div></div>';      


  
 
 
 } 
?>    
    <?php if($_SESSION['type']=='employer' or $_SESSION['type']=='user' or $_SESSION['type']=='admin' ){  ?>
<textarea name="commentArea" class="form-control is-invalid" id="commentArea" placeholder="Your Comment *" data-sb-can-submit="no" required></textarea>
<input type="text" style="visibility: hidden" value="<?Php echo ''.$ProductID.'';?>" name="ProductID">

    <button class="btn btn-primary"type="submit" name="AddComment_btn" >Add Comment </button>    <?php }?>   
  
</div>     
    
 </form>
</body>
</html>
