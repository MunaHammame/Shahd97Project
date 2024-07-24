
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
    <section class="gradient-custom" >
      <table class="tb" border="2" style= "  margin-top:3px;backdrop-filter:blur(5px)" >
      <thead>
        <tr>
     <th >Details </th>
     <th >Comment Detail</th>
    <th > Comment Date</th>
    <th > View Comment </th>
  
      
        </tr>
      </thead>
      
        <?php
        $sql="SELECT * from commenttable as m inner Join Users inner Join productdetails as x on UserID=uid And x.ID=PostID_ProductID where m.EmployeUid=$userID ORDER BY CommentDate DESC;" ;
        $result = $conn->query($sql);
          while( $row = $result->fetch_assoc() )
          {
              if($row['NotificationType']=='Comment'){
         echo "<tr>";

  echo "<td style='width:600px';><a href='ProfilePage.php?useruid=".$row['UserID']."'>".$row['fname'].' '.$row['lname'].'</a>  Commented in your Post  ID '.$row['PostID_ProductID'].' '.'Product Name '.$row['NameOfProduct']."</td>";
  echo "<td  style='width:400px'; >".$row['CommentArea']."</td>";
  echo "<td>".$row['CommentDate']."</td>";
  echo "<td><a class='btn btn-primary' href='ProductDetails.php?ProductID=".$row['PostID_ProductID']."&CommentID=".$row['CommentID']."'>view comment </a></td>";

          echo "</tr>" ;}
          else{
                    echo "<tr style='background-color:#a9c686'>";

  echo "<td style='width:600px';><a href='ProfilePage.php?useruid=".$row['UserID']."'>".$row['fname'].' '.$row['lname'].'</a> response to your order Post  ID '.$row['PostID_ProductID'].' '.'Product Name '.$row['NameOfProduct']."</td>";
  echo "<td  style='width:400px'; >".$row['CommentArea']."</td>";
  echo "<td>".$row['CommentDate']."</td>";
  echo "<td><a class='btn btn-primary' href='ProductDetails.php?ProductID=".$row['PostID_ProductID']."&CommentID=".$row['CommentID']."'>view Product </a></td>";

          echo "</tr>" ;
          }
          
              }?>

 
   
      

          
      
      
    </table>
    </section>
</body>
</html>