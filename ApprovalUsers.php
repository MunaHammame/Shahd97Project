
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
</style>
<body>
<?php  global $conn;
 $sql="SELECT uid,fname,lname,phone,email,image from users WHERE type='employer' and isApproval=0";
 $result = $conn->query($sql);
?>
    
         <table class="tb" border="2" style= "  margin: 120 auto;" >
      <thead>
        <tr>
       <th >uid</th>
    <th >First Name</th>
    <th >Last Name</th>
    <th >Phone</th>
    <th >Carrer area </th>
    <th>approval</th>
    <th>Decline</th>
      
        </tr>
      </thead>
      
        <?php
        $sql="SELECT uid,fname,lname,phone,email,image,career_area from users WHERE type='employer' and isApproval=0";
        $result = $conn->query($sql);
          while( $row = $result->fetch_assoc() )
          {
         echo "<tr>";
  echo "<td>".$row['uid']."</td>";
  echo "<td>".$row['fname']."</td>";
  echo "<td>".$row['lname']."</td>";
  echo "<td>".$row['phone']."</td>";
   echo "<td>".$row['career_area']."</td>";
  echo "<td>"?>

 
      <a href="server.php?ApprovalUserUid=<?=$row['uid']?>">
      <img src='assets/img/check.png' height=20px style='margin-left: 25px'  ></a></i> <?php " </td>";
      echo "<td>"?>
      <a href="server.php?DeclineRegesterUser=<?=$row['uid']?>">
      <img src='assets/img/cancel.png' height=20px style='margin-left: 25px'  ></a></i> <?php " </td>";
      

          }
        ?>
      
    </table>
    
    
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