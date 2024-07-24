<?php 

include('..\server.php');

echo "<pre>";
// print_r($_FILES);
//print_r($_REQUEST);

	if(isset($_FILES['file']['name'])){
 	/* Getting file name */
	$filename = $_FILES['file']['name'];

	/* Location */
	$location = "..\image/".$filename;
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
 	     	$uid      = $_SESSION['user']['uid'];
			$titel    = $_POST['titel'];
			$career    = $_POST['career'];
			$career_area = $_POST['career_area'];
		    $text     = $_POST['text'];
		    $city     = $_POST['city'];
            $pranch   = $_POST['pranch'];
 			$value    = $_POST['value'];
 			$post_id  = rand(99999999999,100000000000000);

 
			$query = "INSERT INTO works (uid , post_id, titel, career ,career_area ,city ,pranch , text  , value )  
							    VALUES ('$uid' , $post_id,'$titel','$career','$career_area','$city','$pranch', '$text','$value')";
 			mysqli_query($db, $query);
 
			$query2 = "INSERT INTO image (post_id , image , main )  
							     VALUES ( $post_id,'$filename', 1)";
 			mysqli_query($db, $query2);


	   	}
	}




		$file_path = "..\image/";
		$totalfiles = count($_FILES['documentfiles']['name']);
 		// Looping over all files
		for($i=0;$i<$totalfiles;$i++){
		$file_name = $_FILES['documentfiles']['name'][$i];

	
		
		if(move_uploaded_file($_FILES["documentfiles"]["tmp_name"][$i],$file_path.$file_name)){
			$insert_file_name =  $_FILES["documentfiles"]["name"][$i];
			$insert = "INSERT into image(post_id,image ,main) values('$post_id','".$insert_file_name."',0)";
			mysqli_query($db, $insert);
			// echo $insert ;

			}
		}
 
	}

 	
?>