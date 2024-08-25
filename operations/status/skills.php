<?php
include_once('..\..\conection.php'); 
$query = "UPDATE emp_details set skills ='".$_POST['skills']."' where uid = '".$_POST['uid']."'";
mysqli_query($db, $query); 
?>