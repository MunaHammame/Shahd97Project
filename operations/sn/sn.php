<?php
include_once('..\..\conection.php'); 
 
$stmt   = array(); 
if ($_POST['facebook'] != null) {

	if (strpos($_POST['facebook'], 'facebook.com/') !== false) {
	   	array_push($stmt,  "facebook ='".$_POST['facebook']."' " ); 
	}

}

if ($_POST['whatsapp'] != null) {

	if (strpos($_POST['whatsapp'], '+970') !== false) {
	   	  array_push($stmt,  "whatsapp ='".$_POST['whatsapp']."' " ); 
	}   
 
}

if ($_POST['instagram'] != null) {
 	if (strpos($_POST['instagram'], 'instagram.com/') !== false) {
	   	 array_push($stmt,  "instagram ='".$_POST['instagram']."' " ); 
	}   
}

if ($_POST['twitter'] != null) {

	 	if (strpos($_POST['twitter'], 'twitter.com/') !== false) {
	   	 array_push($stmt,  "twitter ='".$_POST['twitter']."' " ); 
	}  
 
  
}

if ($_POST['linkedin'] != null) {

	 	if (strpos($_POST['linkedin'], 'linkedin.com') !== false) {
	   	  array_push($stmt,  "linkedin ='".$_POST['linkedin']."' " ); 
	}  
 
 
}

//  echo "<pre>";
// print_r($stmt);
//print_r($stmt)  ;
	  $array_data ='';
	  $total_count = count($stmt) ; 
	  $count = 1;

foreach ($stmt as $data){
				
				if ($total_count == $count) {
					$array_data .=  $data;
				}else{
					$array_data .=  $data .' ,';
 					
				}
		   $count ++ ;
		}
  // echo $array_data;

$query = "UPDATE sn set  ".$array_data." where uid = '".$_POST['uid']."'"; 
mysqli_query($db, $query); 

?> 

