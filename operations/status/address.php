<?php
include_once('..\..\conection.php'); 
$query = "UPDATE emp_details set address ='".$_POST['address']."' where uid = '".$_POST['uid']."'";
mysqli_query($db, $query); 
?>