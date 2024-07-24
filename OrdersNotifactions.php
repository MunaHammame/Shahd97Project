
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
</style>
<body>
<?php  global $conn;
 $userID= $_SESSION['uid'] ;
 $sql="SELECT * from users WHERE uid =$userID";
 $result = $conn->query($sql);
?>
     <section class="gradient-custom" >
         <table class="tb" border="2" style= "  margin-top: 0px;backdrop-filter:blur(5px);" >
      <thead>
        <tr>
     <th >OrderID </th>
    <th > UserID</th>
     <th> NameOfOrderdUser </th>
    <th > ProductID</th>
     <th > NameOfProduct</th>
    <th >Phone</th>
    <th >City</th>
    <th >Region</th>
     
    <th>Accept Order</th>
    <th>Decline Order </th>
   
      
        </tr>
      </thead>
      
        <?php
        $sql="SELECT * from ordertable INNER JOIN  productdetails on ProductID = ID INNER JOIN users on uid  = UserID WHERE EmployeID=$userID and Accepted=0" ;
        $result = $conn->query($sql);
          while( $row = $result->fetch_assoc() )
          {
         echo "<tr>";
  echo "<td>".$row['OrderID']."</td>";
  echo "<td>".$row['UserID']."</td>";
  echo "<td>".$row['fname']." ".$row['lname']."</td>";
  echo "<td>".$row['ProductID']."</td>";
   echo "<td>".$row['NameOfProduct']."</td>";
  echo "<td>".$row['Phone']."</td>";
  echo "<td>".$row['City']."</td>";
  echo "<td>".$row['Region']."</td>";
  

  echo "<td>"?>

 
      <a href="server.php?AcceptOrderId= <?= $row['OrderID']?> ">
      <img src='assets/img/check.png' height=20px style='margin-left: 25px'  ></a></i> <?php " </td>";
      echo "<td>"?>
      <a href="server.php?AcceptOrderId= <?= $row['OrderID']?>">
      <img src='assets/img/cancel.png' height=20px style='margin-left: 25px'  ></a></i> <?php " </td>";
      

          }
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