<?php 
 
include_once('..\..\server.php'); 
// echo "<pre>";
// print_r($_FILES);
$filename =$_FILES['file']['name'];
  
  	/* Getting file name */
 
	/* Location */
	$location = "..\..\AccountFiles/".$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	/* Valid extensions */
	$valid_extensions = array("jpg","jpeg","png");

	$response = 0;
	/* Check file extension */
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
	   	/* Upload file */
	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	     	$response = $location;

 		$query = "UPDATE account_validat set  file = '".$filename."' , status = 0 WHERE uid ='".$_SESSION['user']['uid']."'";
			  //	echo $query;
				mysqli_query($db, $query);  

			   	}
			}

 	 
 

 	
?>