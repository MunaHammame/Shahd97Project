 

<?php
include_once('..\..\server.php'); 
 
$stmt   = array(); 
if ($_POST['avalibel_in'] != null) {
	array_push($stmt,  "avalibel_in ='".$_POST['avalibel_in']."' " ); 
} 
if ($_POST['avalibel_to'] != null) {
	array_push($stmt,  "avalibel_to ='".$_POST['avalibel_to']."' " ); 
} 
if ($_POST['time_in'] != null) {
	array_push($stmt,  "time_in ='".$_POST['time_in']."' " ); 
} 
if ($_POST['time_out'] != null) {
	array_push($stmt,  "time_out ='".$_POST['time_out']."' " ); 
} 
if ($_POST['exiption'] != null) {
	array_push($stmt,  "exiption ='".$_POST['exiption']."' " ); 
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
$query = "UPDATE emp_details set ".$array_data." where uid = '".$_SESSION['user']['uid']."'"; 
mysqli_query($db, $query); 
//echo $query ;
?> 
