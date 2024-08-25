<?php 

include('..\..\server.php');

// echo "<pre>";
//  print_r($_FILES);
// print_r($_REQUEST); 
  
$stmt   = array(); 
if ($_POST['fname'] != null) {
	array_push($stmt,  "fname ='".$_POST['fname']."' " ); 
	$_SESSION['user']['fname'] = $_POST['fname'];
}

if ($_POST['lname'] != null) {
 
   array_push($stmt,  "lname ='".$_POST['lname']."' " ); 
   $_SESSION['user']['lname'] = $_POST['lname'];
}

if ($_POST['alias'] != null) {
 
   array_push($stmt,  "alias ='".$_POST['alias']."' " ); 
}

if ($_POST['career_area'] != ' ') {
 
   array_push($stmt,  "career_area ='".$_POST['career_area']."' " ); 
}

if ($_POST['career'] != ' ') {
 
   array_push($stmt,  "career ='".$_POST['career']."' " ); 
}

if ($_POST['salary'] != null) {
 
   array_push($stmt,  "balance ='".$_POST['salary']."' " ); 
}


if ($_POST['birthday'] != null) {
 
   array_push($stmt,  "birthday ='".$_POST['birthday']."' " ); 
}
if ($_POST['city'] != ' ') {
 
   array_push($stmt,  "city ='".$_POST['city']."' " ); 
}
if ($_POST['pranch'] != '') {
 
   array_push($stmt,  "region ='".$_POST['pranch']."' " ); 
} 

if(isset($_FILES['file']['name'])){

	array_push($stmt,  "image ='".$_FILES['file']['name']."' " ); 

   $_SESSION['user']['image'] = $_FILES['file']['name'];


 		/* Getting file name */
	$filename = $_FILES['file']['name'];

	/* Location */
	$location = "..\..\users/".$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	/* Valid extensions */
	$valid_extensions = array("jpg","jpeg","png");

	$response = 0;
	/* Check file extension */
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
	   	/* Upload file */
	    move_uploaded_file($_FILES['file']['tmp_name'],$location); 
	      
		} 
 
 
 
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
$query = "UPDATE users set ".$array_data." where uid = '".$_SESSION['user']['uid']."'"; 
  mysqli_query($db, $query); 
 // echo $query; 	
?>