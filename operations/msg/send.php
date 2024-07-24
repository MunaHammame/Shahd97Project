<?php
include_once('..\..\server.php'); 
$query = "INSERT into message( senderuid , reseveruid , MsgText  ) VALUES ('".$_SESSION['user']['uid']."' , '".$_POST['reseverUID']."' , '".$_POST['MsgText']."' ) ";
	//echo $query;
mysqli_query($db, $query); 
?>