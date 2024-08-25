
<html>
<head> 
<?php include ('Nav.php') ?>
</head>
<style>
div.gallery {
 
  margin-top: 150px;
  margin-left: 50px;
  border: 1px solid #ccc;
  float: left;
  width: 250px;
}
div.gallery:hover {
  border: 1px solid #777;
}
div.gallery img {
  width: 100px;
  height: 100px;
  margin-top: 10px;
}
div.desc {
  padding-bottom: 5px;
  text-align: center;
}
.gradient-custom {
/* fallback for old browsers */
background-image: url('./assets/img/11.png');

}
table {
  margin-top:20px;
  background-color: white;
  margin-left:10%;
  padding: 10%;
  border-collapse: collapse !important;
   border: 1px solid #ddd; 
}
th, td {
    border: 2px solid #ddd; /* Adds border to each cell */
    padding: 8px; /* Adds padding inside cells */
    text-align: center; /* Aligns text to the left */
    color: #eb6cd0;
    
}
</style>
<body>
<?php  global $conn;
 $userID= $_SESSION['uid'] ;
 $sql="SELECT * from users WHERE uid =$userID";
 $result = $conn->query($sql);
?>

      
        <?php
        $sql="SELECT * from ordertable as x INNER JOIN products as p on x.ProductId  = p.ProductId INNER JOIN users on uid = UserID WHERE Accepted=0" ;
        $result = $conn->query($sql);
          $num_rows = $result->num_rows;
          if($num_rows == 0 ){ 
              ?> <div style="margin-top:20%;margin-left:40%"><h3 style="color:white">لا يوجد طلبات لعرضها </h3></div> 
              <?php 
              
          }
          else {
              ?>
       <section  >
      <table   >
      <thead>
      <tr>
     <th >رقم الطلب </th>
    <th > رقم المسخدم</th>
    <th > الأسم </th>
    <th > رقم المنتج</th>
     <th  > إسم المنتج</th>
    <th >رقم تلفون </th>
    <th >العنوان</th>  
    <th >قبول الطلب </th>
    <th > رفض الطلب </th>
   
      
        </tr>
      </thead>
      <?php
          while( $row = $result->fetch_assoc() )
   {
         echo "<tr>";
  echo "<td>".$row['OrderID']."</td>";
  echo "<td>".$row['UserID']."</td>";
  echo "<td>".$row['fname']." ".$row['lname']."</td>";
  echo "<td>".$row['ProductID']."</td>";
  echo "<td>".$row['ProductName']."</td>";
  echo "<td>".$row['Phone']."</td>";
  echo "<td>".$row['Address']."</td>";
  
  

  echo "<td>"?>

 
      <a href="server.php?AcceptOrderId= <?= $row['OrderID']?>&productId=<?=$row['ProductID']?> ">
      <img src='assets/img/check.png' height=20px style='margin-left: 25px'  ></a></i> <?php " </td>";
      echo "<td>"?>
      <a href="server.php?AcceptOrderId= <?= $row['OrderID']?>&productId=<?=$row['ProductID']?> ">
      <img src='assets/img/cancel.png' height=20px style='margin-left: 25px'  ></a></i> <?php " </td>";
      

          }}
        ?>
      
    </table>
     </section>
    
    
    <script>
    function successCehck()
    {
     
    alert("hello");
       global $conn;
    }
 
    </script>
  
    <?php 
    
    function successCehck(){
        echo 'hai';
    }
    
    
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
</body>
</html>