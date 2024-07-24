<?php
include_once('..\..\conection.php'); 
$query = "UPDATE emp_details set about ='".$_POST['about']."' where uid = '".$_POST['uid']."'";
mysqli_query($db, $query); 
?>