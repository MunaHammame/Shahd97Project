
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

?>
    <form method="post" >
    <section class="gradient-custom" >
      <table class="tb" border="2" style= "  margin-top:3px;backdrop-filter:blur(5px)" >
      <thead>
        <tr>
     <th >اسم المستخدم </th>
     <th >حالة المستخدم</th>
    <th > نوع المستخدم </th>
    <th > مجال عمله في حال كان مهني </th>
    <th > الجنس </th>
    <th > تم الانضمام بتاريخ </th>
    <th > الغاء الحساب </th>
    <th > الغاء تنشيط الحساب </th>
      
        </tr>
      </thead>
      
        <?php
        $sql="SELECT * from users " ;
        $result = $conn->query($sql);
        $rowcount = mysqli_num_rows( $result );
      
        echo '<h3>عدد المستخدمين الحالين*'.$rowcount.'مستخدم </h3>';
      
    
          while( $row = $result->fetch_assoc() )
          {
         echo "<tr>";

  echo "<td><a href='ProfilePage.php?useruid=".$row['uid']."'>".$row['fname'].' '.$row['lname']."</a> </td>";
 
  if($row['activity']=='454'){echo "<td>حساب فعال</td>";}
  else{  echo "<td>حساب غير فعال</td>";}
  echo "<td>".$row['type']."</td>";
  echo "<td>".$row['career_area']."</td>";
  echo "<td>".$row['gender']."</td>";
  echo "<td>".$row['join_at']."</td>";
  echo "<td><a class='btn btn-primary' href='server.php?DeleteAccountuid=".$row['uid']."'>الغاء الحساب بشكل كامل  </a></td>";
   echo "<td><a class='btn btn-primary' href='server.php?changeAccountStatusUid=".$row['uid']."&AccountStatus=".$row['activity']."'>  تغير حالة الحساب     </a></td>";
          echo "</tr>" ;}
          
          ?></form>

 
   
      

          
      
      
    </table>
    </section>
</body>
</html>