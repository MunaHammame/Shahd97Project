<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
<script>
     $(document).ready(function() {
       $('#OrderRequere').click(function(){
       $.ajax({
            url: 'HandMadeProject/index.php',
            data: { var1:value},                        
            type: 'post',
            success: function (data) 
            {
                alert:"HEllo";
            }
       });
    });  
   });    
</script>

<?php 
include('conection.php');
session_start();
 $username = "";
 $email    = "";
 $errors   = array(); 
 $Succsess =array(); 
 $resultInsertArray=0;
 $resultInsertAddOrder=0;
 $rowNum ;
 $_SESSION['success']="";

 $resultInsertAddnewProduct=0;

 if(!isLoggedIn()){
     $_SESSION['type']="";

 }
if (isset($_POST['register'])) {
  register();
  }
 if (isset($_POST['register_admin'])) {
  register_admin();
  }
 if (isset($_POST['register_user'])) {
  register_user();
  }
 if (isset($_POST['login_btn'])) {
  login();
  }
 if (isset($_POST['login_admin'])) {
  login_admin();
  }

   if (isset($_POST['InsertNewProduct_btn'])) {
  InsertNewProduct();
  }

  if (isset($_GET['OrderProduct'])) 
  { 
     InsertNewOrder();
  }

   if (isset($_GET['AcceptOrderId'])) 
  { 
     AcceptOrder();
  }
    if (isset($_GET['DeleteAccountuid'])) 
  { 
      $var= filter_input(INPUT_GET, 'DeleteAccountuid');
    global $conn;
    $sql = "Delete from users  WHERE uid='$var'";

    if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
  header("Location:MangeAccounts.php");
} else {
    header("MangeAccounts.php");
  echo "Error updating record: " . $conn->error;
}
  }

    if (isset($_GET['DeletedProductID'])) 
  { $sector=$_GET['Sector'];
       $var= filter_input(INPUT_GET, 'DeletedProductID');
       $var2= filter_input(INPUT_GET, 'Sector');
    global $conn;
    $sql = "Delete from products  WHERE ProductId ='$var'";
    if ($conn->query($sql) === TRUE) {
   header("Location: ViewProductsRelatedToSector.php?DeletedItem=true&SectorName=$sector");
}
  }

     if (isset($_GET['CommentIDTobeDelte'])) 
  {  
    $productID=  $_GET['ProductdeleteComment'];
    $var= filter_input(INPUT_GET, 'CommentIDTobeDelte');
    global $conn;
    $sql = "Delete from commenttable  WHERE CommentID ='$var'";

    if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
  header("Location:ProductDetails.php?ProductID=$productID");
} else {
    header("index.php");
  echo "Error updating record: " . $conn->error;
}
  } 

    if (isset($_GET['DeleteProductFromAdmin'])) 
  {   

   $EmplyeeID=  $_GET['DeleteProductRelatedToEmploye'];
   $var= filter_input(INPUT_GET, 'DeleteProductFromAdmin');
    global $conn;
    $sql = "Delete from productdetails  WHERE ID ='$var'";

    if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
  header("Location:ProductDescription.php?uid=$EmplyeeID");
} else {
    header("index.php");
  echo "Error updating record: " . $conn->error;
}
  } 












    if (isset($_GET['changeAccountStatusUid'])) 
  { 
      $var= filter_input(INPUT_GET, 'changeAccountStatusUid');
      $status =$_GET['AccountStatus'];
    if($status === '454'){
    global $conn;
    $sql = "update users SET activity=678  WHERE uid='$var'";
    if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
  header("Location:MangeAccounts.php");
      } 
      else {
    header("MangeAccounts.php");
  echo "Error updating record: " . $conn->error;
    }}
else{
    $sql = "update users SET activity=454  WHERE uid='$var'";
    if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
  header("Location:MangeAccounts.php");
      } 
      else {
    header("MangeAccounts.php");
  echo "678Error updating record: " . $conn->error;
}

}
  }
  function AcceptOrder(){
    $orderid=  $_GET['AcceptOrderId'];
    $productId=  $_GET['productId'];

$var= filter_input(INPUT_GET, 'uid');
    global $conn;
    $sql = "UPDATE ordertable SET Accepted='1' WHERE OrderID=$orderid";

    $sql8 = "UPDATE products SET ProductsAmount=ProductsAmount-1 WHERE ProductId =$productId and ProductsAmount>0";



    $sql3 = "select * from ordertable  WHERE OrderID=$orderid";
   $result = $conn->query($sql3);
    $row = $result->fetch_assoc();
    $EmployeID=$row['EmployeID']; 
    $PostID=$row['ProductID'];
    $CommentText="تم قبول الاوردر الذي قمت بطلبه من طرف البائع وسيتم التواصل معك لتوصيله لعنوانك";
    $UserRequestTheorder=$row['UserID'];
     $tdtp=date("Y-m-d  H:i:s",time()); 
    $sql1="INSERT INTO commenttable "
  . "(UserID,EmployeUid,PostID_ProductID, CommentArea,CommentDate,ViewdByEmploye,NotificationType) ". "VALUES"
. "('$EmployeID','$UserRequestTheorder','$PostID', '$CommentText', '$tdtp',0,'notification')";
    $conn->query($sql1);
    if ($conn->query($sql) === TRUE &&$conn->query($sql8) === TRUE)
{
  echo "<h3>Record updated successfully</h3>";
  header("Location:OrdersNotifactions.php");
} else 
{
  header("OrdersNotifactions.php");
  echo "Error updating record: " . $conn->error;
}       

  }

   function InsertNewOrder(){ 
  global $db, $errors,$resultInsertAddOrder;
  $Employeid = 4546;
  $userID=e($_SESSION['uid']);
  $UserOrderdPhone= $_SESSION['CurrentUsePhone'];
  $UserOrderCity=$_SESSION['CurrentUsecity'];
  $productID=$_GET['OrderProduct'];
  $ProductSector=$_GET['Sector'];
  $UserOrderRegion=$_SESSION['CurrentUserRegion'];
  $query = "INSERT INTO ordertable 
  (UserID,EmployeID, ProductID, phone, City,Region,Accepted) VALUES('$userID','$Employeid', '$productID', '$UserOrderdPhone', '$UserOrderCity','$UserOrderRegion',0)";
  $result= mysqli_query($db, $query);
  if($result){
      $resultInsertAddOrder = 1;
   header("Location: ViewProductsRelatedToSector.php?success=true&SectorName=$ProductSector");
  }
 }   
 if (isset($_GET['logout'])) {
  session_start();
  session_destroy();
  unset($_SESSION['user']);
  header("location:index.php");
 }

  if (isset($_GET['ApprovalUserUid'])) {
    $var= filter_input(INPUT_GET, 'ApprovalUserUid');
    global $conn;
    $sql = "UPDATE users SET isApproval='1' WHERE uid='$var'";
       if ($conn->query($sql) === TRUE)
{
  echo "<h3>Record updated successfully</h3>";
  header("Location:ApprovalUsers.php");
} else 
{
  header("ApprovalUsers.php");
  echo "Error updating record: " . $conn->error;
}   
 }
  if (isset($_GET['DeclineRegesterUser'])){
     $var= filter_input(INPUT_GET, 'DeclineRegesterUser');
    global $conn;
    $sql = "Delete from users  WHERE uid='$var'";

    if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
  header("Location:ApprovalUsers.php");
} else {
    header("ApprovalUsers.php");
  echo "Error updating record: " . $conn->error;
}

  }


 if(isset($_GET['EmployeIDofThisAccount']))
 { 

   $uid =$_GET['EmployeIDofThisAccount'];  
   header("location:ProductDescription.php?uid=$uid");
 }
  if (isset($_POST['AddComment_btn']))
  {
  add_New_comment();

 }

 function add_New_comment(){
 global $db;    
 $tdtp=date("Y-m-d  H:i:s",time()); 

 $CommentText= e($_POST['commentArea']);
 $PostID=e($_POST['ProductID']);
 $EmployeUid=e($_POST['EmployeUid']);

 $UserCommentedID=$_SESSION['uid'] ;
 if($CommentText=="")
 {
     echo'<div>the comment can not be empty</div>';
 }
 else{
 $query = "INSERT INTO commenttable 
  (UserID,EmployeUid,PostID_ProductID, CommentArea,CommentDate,ViewdByEmploye,NotificationType) VALUES('$UserCommentedID','$EmployeUid','$PostID', '$CommentText', '$tdtp',0,'Comment')";
  $result= mysqli_query($db, $query);
  if($result){
      $resultInsertAddOrder = 1;
      header("location:ProductDetails.php?ProductID=$PostID");
 }}   
 }
//SET Defullt Time Server
date_default_timezone_set('Asia/Jerusalem');
$now = new DateTime(null, new DateTimeZone('Asia/Jerusalem'));
$now->setTimezone(new DateTimeZone('Asia/Jerusalem'));
$now = $now->format("g:ia");  
//EMPOLEYER  RIGESTER 
function register(){
  global $db, $errors,$resultInsertArray,$rowNum;  
 /////////////////// POST DATA FROM USER TO INSALIZEINF  //////////////////////////////////
  $fname    =  e($_POST['fname']);
  $user_name=  e($_POST['username']);
  $lname    =  e($_POST['lname']);
  $alias    =  e($_POST['username']);
  $phone    =  e($_POST['phone']);
  $email    =  e($_POST['email']);
  $birthday =  e($_POST['birthday']);
  $gender   =  e($_POST['gender']);
  $address   =  e($_POST['Address_input']);

  $city     =  "NullValue";
  $region   =  "NullValue";
  $career_area= "NullValue";
  $usertype =  "Normal";
  $password1=  e($_POST['password1']);
  $password2=  e($_POST['password2']);
 ///////////////////  VALIDATION DATA FROM USER  //////////////////////////////////
  if (empty($fname)) { 
   array_push($errors, "اﻻﺳﻢ اﻻﻭﻝ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($lname)) { 
   array_push($errors, "اﻻﺳﻢ اﻟﺜﺎﻧﻲ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($phone)) { 
   array_push($errors, "ﺭﻗﻢ اﻟﻬﺎﺗﻒ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($city)) { 
   array_push($errors, " ﺗﺤﺪﻳﺪ اﻟﻤﺪﻳﻨﺔ ﻣﻄﻠﻮﺏ "); 
  }
  if (empty($region)) { 
   array_push($errors, "  ﺗﺤﺪﻳﺪ اﻟﻤﻨﻄﻘﺔ ﻣﻄﻠﻮﺏ "); 
  }
  if (empty($usertype)) { 
   array_push($errors, "ﺗﺤﺪﻳﺪ ﻧﻮﻉ اﻟﻤﺴﺘﺨﺪﻡ ﻣﻄﻠﻮﺏ "); 
  } 
  if (empty($birthday)) { 
   array_push($errors, "ﺗﺎﺭﻳﺦ اﻟﻤﻴﻼﺩ ﻣﻄﻠﻮﺏ"); 
  }
  $today = date("Y-m-d");
  $diff = date_diff(date_create($birthday), date_create($today));
  $age = $diff->format('%y');
  if (($age < 19 ) && ( $usertype == 'employer')) {
  array_push($errors, " ﻗﺎﻧﻮﻥ ﺣﻘﻮﻕ اﻟﻄﻔﻞ اﻟﻔﻠﺴﻄﻴﻨﻲ ﻳﻤﻨﻊ اﻟﻌﻤﻞ ﻟﻤﺎ ﻫﻢ ﺩﻭﻥ 18 ﺳﻨﺔ "); 
  }
  if (($age < 16 ) && ( $usertype == 'user')) {
     array_push($errors, "ﻏﻴﺮ ﻣﺴﻤﻮﺡ ﻟﻻﻃﻔﺎﻝ  ﻣﺎ ﺩﻭﻥ 15 ﺳﻨﺔ اﻟﻤﺸﺎﺭﻛﺔ ﻓﻲ ﻣﻮﻗﻊ ﻣﻬﻨﺘﻲ اﻭﻧﻼﻳﻦ "); 
  }
  if (empty($email)) { 
   array_push($errors, "اﻟﺒﺮﻳﺪ اﻻﻛﺘﺮﻭﻧﻲ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($password1)) { 
   array_push($errors, "ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺑﺔ"); 
  }
  if (empty($password2)) { 
   array_push($errors, "ﺗﺎﻛﻴﺪ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺏ"); 
  }
  if ($password1 != $password2) {
   array_push($errors, "ﻛﻠﻤﺘﻲ اﻟﻤﺮﻭﺭ ﻏﻴﺮ ﻣﺘﻄﺎﺑﻘﺔ");
  }
//CHICK EMAIL IF USED FOR ANOTHER ACCOUNT
  $sql1 = "SELECT email FROM users WHERE email='$email' ";
  $result = mysqli_query($db, $sql1);
  if (mysqli_num_rows($result) > 0) {
   array_push($errors, "ﻧﺎﺳﻒ ﻫﺬا اﻟﺒﺮﻳﺪ ﻣﺴﺘﺨﺪﻡ ﻟﺪﻳﻨﺎ ﺑﺎﻟﻔﻌﻞ");
  } 
 //CHICK username IF USED FOR ANOTHER ACCOUNT
  $sql2 = "SELECT alias FROM users WHERE alias='$user_name' ";
  $result2 = mysqli_query($db, $sql2);
  if (mysqli_num_rows($result2) > 0) {
   array_push($errors, "اسم مستخدم مستعمل من قبل الرجاء اختيار اسم اخر");
  } 
  if (count($errors) == 0) {
    $password = md5($password1);
    $uid= rand(1000000000000,9999999999999);
   //image  uplude 

   //INSERT QUERY 
  $tdtp=date("Y-m-d  H:i:s",time());
  $query = "INSERT INTO users 
  (uid,fname, lname, phone, email, birthday, gender, password , type ,city,region,image,career_area,alias, activity,join_at,isApproval,Address) VALUES
  ('$uid','$fname', '$lname', '$phone', '$email', '$birthday', '$gender', '$password', '$usertype','$city','$region','h','$career_area','$user_name','454','$tdtp',0,'$address')";
   $result= mysqli_query($db, $query);
 if($result)
{ 
$resultInsertArray=1;
} 
else 
{ 
 array_push($errors, " يوجد مشكلة في انشاء الحساب  ");   
}
   // $logged_in_user_id = mysqli_insert_id($db);
   // $_SESSION['user'] = getUserById($logged_in_user_id);
  //  $_SESSION['success']  = "You are now logged in";
   // $query2 = "INSERT INTO emp_details (uid ) VALUES('$uid')";
   // mysqli_query($db, $query2);

   // $query3 = "INSERT INTO sn (uid) VALUES('$uid')";
  //  mysqli_query($db, $query3);

  //  $query4 = "INSERT INTO account_validat (uid) VALUES('$uid')";
   // mysqli_query($db, $query4);
   //  header('location: index.php');    
  }
 }
//USER RIGESTER     
  function register_user(){
  global $db, $errors,$resultInsertArray;
 // POST DATA FROM USER TO INSALIZEINF 
  $fname    =  e($_POST['fname']);
  $lname    =  e($_POST['lname']);
  $alias    =  e($_POST['username']);
  $phone    =  e($_POST['phone']);
  $email    =  e($_POST['email']);
  $birthday =  e($_POST['birthday']);
  $gender   =  e($_POST['gender']);
  $city     =  e($_POST['city']);
  $region   =  e($_POST['region']);
  $usertype =  e($_POST['usertype']);
  $password1=  e($_POST['password1']);
  $password2=  e($_POST['password2']);  
// VALIDATION DATA FROM USER
 if (empty($fname)) { 
   array_push($errors, "اﻻﺳﻢ اﻻﻭﻝ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($lname)) { 
   array_push($errors, "اﻻﺳﻢ اﻟﺜﺎﻧﻲ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($phone)) { 
   array_push($errors, "ﺭﻗﻢ اﻟﻬﺎﺗﻒ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($city)) { 
   array_push($errors, " ﺗﺤﺪﻳﺪ اﻟﻤﺪﻳﻨﺔ ﻣﻄﻠﻮﺏ "); 
  }
  if (empty($region)) { 
   array_push($errors, "  ﺗﺤﺪﻳﺪ اﻟﻤﻨﻄﻘﺔ ﻣﻄﻠﻮﺏ "); 
  }
  if (empty($usertype)) { 
   array_push($errors, "ﺗﺤﺪﻳﺪ ﻧﻮﻉ اﻟﻤﺴﺘﺨﺪﻡ ﻣﻄﻠﻮﺏ "); 
  } 
  if (empty($birthday)) { 
   array_push($errors, "ﺗﺎﺭﻳﺦ اﻟﻤﻴﻼﺩ ﻣﻄﻠﻮﺏ"); 
  }

  $today = date("Y-m-d");
  $diff = date_diff(date_create($birthday), date_create($today));
  $age = $diff->format('%y');

  if (($age < 19 ) && ( $usertype == 'employer')) {
  array_push($errors, " ﻗﺎﻧﻮﻥ ﺣﻘﻮﻕ اﻟﻄﻔﻞ اﻟﻔﻠﺴﻄﻴﻨﻲ ﻳﻤﻨﻊ اﻟﻌﻤﻞ ﻟﻤﺎ ﻫﻢ ﺩﻭﻥ 18 ﺳﻨﺔ "); 
  }
  if (($age < 16 ) && ( $usertype == 'user')) {
     array_push($errors, "ﻏﻴﺮ ﻣﺴﻤﻮﺡ ﻟﻻﻃﻔﺎﻝ  ﻣﺎ ﺩﻭﻥ 15 ﺳﻨﺔ اﻟﻤﺸﺎﺭﻛﺔ ﻓﻲ ﻣﻮﻗﻊ ﻣﻬﻨﺘﻲ اﻭﻧﻼﻳﻦ "); 
  }
  if (empty($email)) { 
   array_push($errors, "اﻟﺒﺮﻳﺪ اﻻﻛﺘﺮﻭﻧﻲ ﻣﻄﻠﻮﺏ"); 
  }

  if (empty($password1)) { 
   array_push($errors, "ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺑﺔ"); 
  }
  if (empty($password2)) { 
   array_push($errors, "ﺗﺎﻛﻴﺪ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺏ"); 
  }
  if ($password1 != $password2) {
   array_push($errors, "ﻛﻠﻤﺘﻲ اﻟﻤﺮﻭﺭ ﻏﻴﺮ ﻣﺘﻄﺎﺑﻘﺔ");
  }
//CHICK EMAIL IF USED FOR ANOTHER ACCOUNT 
  $sql1 = "SELECT email FROM users WHERE email='$email' ";
  $result = mysqli_query($db, $sql1);
  if (mysqli_num_rows($result) > 0) {
   array_push($errors, "ﻧﺎﺳﻒ ﻫﺬا اﻟﺒﺮﻳﺪ ﻣﺴﺘﺨﺪﻡ ﻟﺪﻳﻨﺎ ﺑﺎﻟﻔﻌﻞ");
  } 
  if (count($errors) == 0) {
    $password = md5($password1);
    $uid= rand(1000000000000,9999999999999);
   //   image  uplude
        $images = $_FILES['image']['name'];  
        $tmp_dir=$_FILES['image']['tmp_name'];
        $imageSize=$_FILES['image']['size'];   
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $upload_dir = 'UserUploadImages/';
        $valid_extensions=array('jpeg', 'jpg');
        $image=rand(10000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$image);
 //INSERT QUERY    
$tdtp=date("Y-m-d  H:i:s",time());
$query = "INSERT INTO users (uid,fname, lname, phone, email, birthday, gender, password ,type ,city ,region ,image,career_area,alias,activity,join_at,isApproval) VALUES('$uid','$fname', '$lname', '$phone', '$email', '$birthday', '$gender', '$password','$usertype', '$city', '$region','$image','','$alias',678,'$tdtp',0)";
 $result=   mysqli_query($db, $query);      
if($result)
{       
$resultInsertArray=1;
} 
else 
{ 
 array_push($errors, " يوجد مشكلة في انشاء الحساب  ");   
}
    //$logged_in_user_id = mysqli_insert_id($db);
    //$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
    //$_SESSION['success']  = "You are now logged in";
    //$query2 = "INSERT INTO emp_details (uid ) VALUES('$uid')";
    //mysqli_query($db, $query2);
    //$query3 = "INSERT INTO sn (uid) VALUES('$uid')";
    //mysqli_query($db, $query3);
    //$query4 = "INSERT INTO account_validat (uid) VALUES('$uid')";
    //mysqli_query($db, $query4);
    // header('location: index.php');    
  }
 }
//ADMIN RIGESTER  Requset     
  function register_admin(){
  global $db, $errors;
 // POST DATA FROM ADMIN INSALIZEINF  
  $fname    =  e($_POST['fname']);
  $lname    =  e($_POST['lname']);
  $email    =  e($_POST['email']);
  $usertype =  e($_POST['usertype']);
  $password1=  e($_POST['password1']);
  $password2=  e($_POST['password2']);
 // VALIDATION DATA FROM ADMIN 
  if (empty($fname)) { 
   array_push($errors, "اﻻﺳﻢ اﻻﻭﻝ ﻣﻄﻠﻮﺏ"); 
  }
  if (empty($lname)) { 
   array_push($errors, "اﻻﺳﻢ اﻟﺜﺎﻧﻲ ﻣﻄﻠﻮﺏ"); 
  }

  if (empty($usertype)) { 
   array_push($errors, "ﺗﺤﺪﻳﺪ ﻧﻮﻉ اﻟﻤﺴﺘﺨﺪﻡ ﻣﻄﻠﻮﺏ "); 
  } 

  if (empty($email)) { 
   array_push($errors, "اﻟﺒﺮﻳﺪ اﻻﻛﺘﺮﻭﻧﻲ ﻣﻄﻠﻮﺏ"); 
  }

  if (empty($password1)) { 
   array_push($errors, "ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺑﺔ"); 
  }
  if (empty($password2)) { 
   array_push($errors, "ﺗﺎﻛﻴﺪ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺏ"); 
  }
  if ($password1 != $password2) {
   array_push($errors, "ﻛﻠﻤﺘﻲ اﻟﻤﺮﻭﺭ ﻏﻴﺮ ﻣﺘﻄﺎﺑﻘﺔ");
  }
//  CHICK EMAIL IF USED FOR ANOTHER ACCOUNT 
  $sql1 = "SELECT email FROM users WHERE email='$email' ";
  $result = mysqli_query($db, $sql1);
  if (mysqli_num_rows($result) > 0) {
   array_push($errors, "ﻧﺎﺳﻒ ﻫﺬا اﻟﺒﺮﻳﺪ ﻣﺴﺘﺨﺪﻡ ﻟﺪﻳﻨﺎ ﺑﺎﻟﻔﻌﻞ");
  } 
  if (count($errors) == 0) {
    $password = md5($password1);
    $uid= rand(1000000000000,9999999999999);
 //INSERT QUERY 
$query = "INSERT INTO users (uid ,fname, lname, email , password , type ,activity) VALUES('$uid','$fname', '$lname', '$email', '$password', '$usertype' , '3')";
    mysqli_query($db, $query);
    $query2 = "INSERT INTO emp_details (uid ) VALUES('$uid')";
    mysqli_query($db, $query2);
    $query3 = "INSERT INTO sn (uid) VALUES('$uid')";
    mysqli_query($db, $query3);
    $query4 = "INSERT INTO account_validat (uid) VALUES('$uid')";
    mysqli_query($db, $query4);
    array_push($errors, "   تم ارسال الطلب الى ادارة النظام في حال تمت الموافقة سيتم ارسال رسالة اليك عبر البريد الالكتروني و سيتم تفعيل حساب  ");   
   //  header('location:register.php');    
  }
 }
 // USER FUNCTION 
 function login(){
  global $db, $username, $errors;
  $username = e($_POST['username']);
  $password = e($_POST['password']);
  if ($username == NULL) {
   array_push($errors, "اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ ﻣﻄﻠﻮﺏ ");
  }
  if ($password == NULL) {
   array_push($errors, "  ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺑﺔ   ");
  }
 // CHICK ACCOUNT ACTIVATY
   $query = "SELECT activity FROM users WHERE alias = '$username' or phone='$username' LIMIT 1";
     $result = $db->query($query);
     $row = $result->fetch_assoc(); 
    if ( $row['activity'] == "" ) {
      array_push($errors, " هذا الحساب غير موجود   ");
     } 
    elseif ($row['activity'] == 2) {
     array_push($errors, ". هذا الحساب محذوف   ");
    } 
    elseif ($row['activity'] == 3) {
     array_push($errors, ". هذا الحساب قيد التدقيق     ");
    } 
    elseif ($row['activity'] == 4) {
     array_push($errors, "تم تعطيل هذا الحساب.   ");
    }
  if (count($errors) == 0) { 
  $query = "SELECT * FROM users WHERE alias = '$username' or phone='$username' LIMIT 1";
  $result = $db->query($query);
  $row = $result->fetch_assoc();
  $password = md5($password);  
  if ($password == $row['password'])
  {
   if (mysqli_num_rows($result) == 1)
   { 
    $_SESSION['success']  = "You are now logged in";
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['fname'] =$row['fname'];
    $_SESSION['alias']=$row['alias'];
    $_SESSION['type']= $row['type'];
    $_SESSION['CurrentUsePhone'] =$row['phone'];
    $_SESSION['CurrentUsecity'] =$row['city'];
    $_SESSION['CurrentUserRegion'] =$row['region'];

    header('location: index.php');
    }
   }
   array_push($errors, " خطأ في كلمة المرور");
  }
 }
 // LOGIN ADMIN FUNCTION 
 function login_admin(){
  global $db, $username, $errors;

  $username = e($_POST['username']);
  $password = e($_POST['password']);

  if ($username == NULL) {
   array_push($errors, "اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ ﻣﻄﻠﻮﺏ ");
  }
  if ($password == NULL) {
   array_push($errors, "  ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻣﻄﻠﻮﺑﺔ   ");
  }
 // CHICK ACCOUNT ACTIVATY 
     $query = "SELECT activity FROM users WHERE email = '$username' or phone='$username' LIMIT 1";
     $result = $db->query($query);
     $row = $result->fetch_assoc();
    if ( $row['activity'] == 0) {
      array_push($errors, " هذا الحساب غير موجود   ");
     }
    elseif ($row['activity'] == 2) {
     array_push($errors, ". هذا الحساب محذوف   ");
    }  
    elseif ($row['activity'] == 3) {
     array_push($errors, " هذا الحساب قيد التدقيق   .  ");
    } 
    elseif ( $row['activity'] == 4) {
    array_push($errors, " . ﺗﻢ ﺗﻌﻄﻴﻞ ﻫﺬا اﻟﺤﺴﺎﺏ    ");
     }
 if (count($errors) == 0) { 
  $query = "SELECT * FROM users WHERE email = '$username' or phone='$username' LIMIT 1";
  $result = $db->query($query);
  $row = $result->fetch_assoc();
  $password = md5($password);  
  if ($password == $row['password']) {
   if (mysqli_num_rows($result) == 1) { // user found
     $_SESSION['user'] = $row;
      header('location: home.php');
     } 
    }
   array_push($errors, " ﺧﻄﺄ ﻓﻲ اﺳﻢ اﻟﻤﺴﺘﺨﺪﻡ اﻭ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ");
  }
 }
//get User data By Id 
 function getUserById($id){
  global $db;
  $query = "SELECT * FROM users WHERE id=".$id;
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  return $user;
 }
 //print_r( $_SESSION); 
@$FullName  = $_SESSION['user']['fname']." ".$_SESSION['user']['lname'];
 //CHIKING USER IF IS LOGIN NOW
 function isLoggedIn()
 {
  if (isset($_SESSION['uid'])) {
   return true;
  }else{
   return false;
  }
 }
//chiking use if Admin ?
 function isAdmin()
 {
  if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
   return true;
  }else{
   return false;
  }
 }
//GET STRING WITHOUT signs or commas
 function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
 }
// Display Errors Array 
 function display_error() {
  global $errors; 
  global $resultInsertArray,$resultInsertAddnewProduct,$resultInsertAddOrder;
  if (count($errors) > 0){
   echo '<div class="alert alert-danger" align="right">';
    foreach ($errors as $error){
     echo $error .'<br>';
    }
   echo '</div>';
  }
  if($resultInsertArray == 1) {
      echo '<div class="alert alert-success" align="right">تم انشاء الحساب بنجاح    <a href="login.php">قم بتسجيل الدخول الان  </a></div>'
     ;      
  }
    if($resultInsertAddnewProduct === 1) {
      echo '<div class="alert alert-success" align="right">تم اضافة المنتج بنجاح <a href="login.php"></a></div>';      
  }

      if($resultInsertAddOrder === 1) {
      echo '<div class="alert alert-success" align="right" >تم اضافة المنتج بنجاح <a href="login.php"></a></div>';      
  }


 }
// To copy String  by  count number 
function PrintString($val , $string){
  for ($i=0; $i < $val; $i++) { 
        echo $string;
    }
  }
//  print from db 
function getFromDB($tabel , $colom, $value , $select ){
global $conn;
$sql = "SELECT ".$select." from ".$tabel." where ".$colom." like  '".$value."' ";
 // echo $sql; 
   $SqlResult = $conn->query($sql);
      if ($SqlResult->num_rows > 0) {
         $SqlRow = $SqlResult->fetch_assoc();
         $Data   = (object) $SqlRow;
         echo  $Data -> $select;
         }
          else 
          {
           echo 'ﻻ ﻳﻮﺟﺪ ﺑﻴﺎﻧﺎﺕ '   ;
          }
  }  
 //  GET from db useng return
function getFromDBreturn($tabel , $colom, $value , $select ){
global $conn;
$sql = "SELECT ".$select." from ".$tabel." where ".$colom." like  '".$value."' ";
 //echo $sql; 
   $SqlResult = $conn->query($sql);
      if ($SqlResult->num_rows > 0) {
         $SqlRow = $SqlResult->fetch_assoc();
         $Data   = (object) $SqlRow;
      return  $Data ->$select;}       
  }
// GET CLIENT FullName 
function getFullNameClient($uid){
global $conn;
$sql = "SELECT fname , lname from users where uid =".$uid." ";
 //echo $sql; 
   $SqlResultclient = $conn->query($sql);
      if ($SqlResultclient->num_rows > 0) 
      {
         $Sqlclient = $SqlResultclient->fetch_assoc();
         return   $Sqlclient['fname'].' '. $Sqlclient['lname'];
      }      
  }
 // GET CLIENT IMAGE 
function getClientImage($uid){
global $conn;
$sql = "SELECT image from users where uid =".$uid." ";
 //echo $sql; 
   $SqlResultclient = $conn->query($sql);
      if ($SqlResultclient->num_rows > 0) {
         $Sqlclient = $SqlResultclient->fetch_assoc();

     if (strpos($Sqlclient['image'], 'jpg') !== false) {
          $image = $Sqlclient['image'];
      }else{
        $image = 'avtar.jpg';
        }
          }
       return $image;
   } 
//Functions Add by muna
function Display_Users($career_area) {

global $conn;
   $sql = "SELECT uid,fname,lname,phone,email,image,city from users where career_area ='$career_area' and isApproval=1 ";   
   //career_area =".$career_area." and
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {
    ?>
 <div class="gallery">
  <a target="_blank" href="img_5terre.jpg">
  <?php echo'<a href="server.php?EmployeIDofThisAccount='.($row['uid']).'"><img src="UserUploadImages/'.($row['image'] ).'" height="900" width="100"/></a>'; ?> 
  </a>
  <div class="desc"><?php echo"<br> " .$row["fname"]. ": الاسم<br>";    ?> </div>
  <div class="desc"><?php echo"<br> " .$row["phone"]. ": للتواصل<br>"; ?> </div>
  <div class="desc"><?php echo"<br> " .$row["city"]. ": city<br>"; ?> </div>
 </div>
  <?php      
    }
} 
}   
function Display_SearchedUsers($career_area,$city) {

global $conn;
   $sql = "SELECT uid,fname,lname,phone,email,image,city from users where career_area ='$career_area' and isApproval=1 and city='$city' ";   
   //career_area =".$career_area." and
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {
    ?>
 <div class="gallery">
  <a target="_blank" href="img_5terre.jpg">
  <?php echo'<a href="server.php?EmployeIDofThisAccount='.($row['uid']).'"><img src="UserUploadImages/'.($row['image'] ).'" height="900" width="100"/></a>'; ?> 
  </a>
  <div class="desc"><?php echo"<br> " .$row["fname"]. ": الاسم<br>";    ?> </div>
  <div class="desc"><?php echo"<br> " .$row["phone"]. ": للتواصل<br>"; ?> </div>
   <div class="desc"><?php echo"<br> " .$row["city"]. ": city<br>"; ?> </div>

 </div>
  <?php      
    }
}
}  
function Display_Users_NotApproval() {
global $conn;
 $sql="SELECT uid,fname,lname,phone,email,image from users WHERE type='employer' and isApproval=0";
 $result = $conn->query($sql);
 echo 
 "<table class='tb'>
  <tr>
    <td >uid</td>
    <td >First Name</td>
    <td >Last Name</td>
    <td >Phone</td>
    <td>approval</td>
    <td>Decline</td>
  </tr>";
 while($row = $result->fetch_assoc())
  {
  echo "<tr>";
  echo "<td>".$row['uid']."</td>";
  echo "<td>".$row['fname']."</td>";
  echo "<td>".$row['lname']."</td>";
  echo "<td>".$row['phone']."</td>";
  echo "<td><img src='assets/img/check.png' height=20px style='margin-left: 25px'></i>   </td>";
  echo "<td><img src='assets/img/cancel.png' height=20px style='margin-left: 25px'></i>   </td>";
  echo "</tr>";
  echo "</table>";

  }
 }
function InsertNewProduct(){
  global $db, $errors,$resultInsertAddnewProduct;  
 //POST DATA FROM USER TO INSALIZEINF 
  $NameOfProduct_Var  = e($_POST['NameOfProduct_input']);
  $PriceOfProduct_Var = e($_POST['PriceOfProduct_input']);
  $DiscriptionOfProduct_Var = e($_POST['DiscriptionOfProduct_input']);
  $ProductSector_Var  = e($_POST['ProductSector_input']);
  $ProductAmount_VAr = e($_POST['ProductAmount_Input']);
    if (empty($NameOfProduct_Var)) { 
   array_push($errors, " الرجاء ادخال اسم المنتج"); 
  }
  if (empty($PriceOfProduct_Var)) { 
   array_push($errors, "الرجاء ادخال سعر المنتج"); 
  }
  if (empty($DiscriptionOfProduct_Var)) { 
   array_push($errors, "الرجاء ادخال وصف المنتج"); 
  }
  if (empty($ProductAmount_VAr)) { 
   array_push($errors, " الرجاء ادخال الكمية   "); 
  }




  if (count($errors) == 0 ) {

         $images = $_FILES["Imagepath1_input"]["name"];  
        $tmp_dir=$_FILES["Imagepath1_input"]["tmp_name"];
        $imageSize=$_FILES['Imagepath1_input']['size'];  
        if($imageSize = 0){array_push($errors, " الرجاء ادخال الصورة 1     "); 
  }
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $upload_dir = 'ImageOfProductsUploded/';
        $valid_extensions=array('jpeg', 'jpg');
        $image1=rand(10000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$image1);
          //image  for second image 
        $images = $_FILES["Imagepath2_input"]["name"];  
        $tmp_dir=$_FILES["Imagepath2_input"]["tmp_name"];
        $imageSize=$_FILES['Imagepath2_input']['size'];   
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $upload_dir = 'ImageOfProductsUploded/';
        $valid_extensions=array('jpeg', 'jpg');
        $image2=rand(10000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$image2);
        //image for third image 
        $images = $_FILES["Imagepath3_input"]["name"];  
        $tmp_dir=$_FILES["Imagepath3_input"]["tmp_name"];
        $imageSize=$_FILES['Imagepath2_input']['size'];   
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $upload_dir = 'ImageOfProductsUploded/';
        $valid_extensions=array('jpeg', 'jpg');
        $image3=rand(10000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$image3);
        //image for forth image 
       $images = $_FILES["Imagepath4_input"]["name"];  
        $tmp_dir=$_FILES["Imagepath4_input"]["tmp_name"];
        $imageSize=$_FILES['Imagepath4_input']['size'];   
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $upload_dir = 'ImageOfProductsUploded/';
        $valid_extensions=array('jpeg', 'jpg');
        $image4=rand(10000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$image4);
   $query = "INSERT INTO products 
  (ProductName,ProductPrice, ProductSector, ProductDescription, ProductsAmount, ProductsImg1,ProductsImg2,ProductsImg3,ProductsImg4) VALUES
  ('$NameOfProduct_Var','$PriceOfProduct_Var', '$ProductSector_Var','$DiscriptionOfProduct_Var','$ProductAmount_VAr','$image2','$image2','$image3','$image4')";
   $result= mysqli_query($db, $query); 
   if($result)
{ 
$resultInsertAddnewProduct=1;
} 
else 
{ 
 array_push($errors, " يوجد مشكلة في انشاء الحساب  ");   
}
}}
