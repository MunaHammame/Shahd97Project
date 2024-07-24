<?php
include_once('..\..\conection.php'); 
$query = "UPDATE emp_details set work ='".$_POST['work']."' where uid = '".$_POST['uid']."'";
mysqli_query($db, $query); 
?>