 

<?php
include_once('..\..\conection.php'); 
 
$stmt   = array(); 
if ($_POST['email'] != null) {
	array_push($stmt,  "email ='".$_POST['email']."' " ); 
}

if ($_POST['phone'] != null) {
 
   array_push($stmt,  "phone ='".$_POST['phone']."' " ); 
} 
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
$query = "UPDATE users set ".$array_data." where uid = '".$_POST['uid']."'"; 
mysqli_query($db, $query); 
//echo $query ;
?> 
