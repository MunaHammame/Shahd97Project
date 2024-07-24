
<?php include_once('..\..\server.php'); ?>
	<div class="container col-lg-9"  dir="rtl">

		<div class="panel panel-info" >
		<div class="panel-heading"><h3>  تصفح المهنين / </h3></div>
		</div> 
		 <?php 

if(empty($_GET["worker_name"]))
{
}
else
{
 $worker_name = $_GET["worker_name"];

			  $qery = "SELECT * from users where type ='employer' and fname like  '%".$worker_name."%'
   				   or lname like '%".$worker_name."%'  order by fname desc";
					$result = $conn->query($qery);
			 	 if ($result->num_rows > 0) {
 			        while($row = $result->fetch_assoc()) { 
 

	        	  $cliant_name = $row["fname"].' '. $row["lname"];
	 
      	  if ((strpos($row["image"], 'jpg') !== false) || (strpos($row["image"], 'jpeg') !== false)||(strpos($row["image"], 'png') !== false)) {
 					  $cliant_image = $row["image"];
					}else{
					  $cliant_image = 'avtar.jpg';
					  }
  
		 
	        	echo '
	        	<div class="card" style=" padding:10px 10px 10px 10px;margin-top:20px ;">
			    <div class="row">
 			        <div class="col-sm-7">
			            <div class="card-body">
			              <img src="users/'.$cliant_image.'" width="35" height="35"  class="avatar rounded-circle" >&nbsp;
			                <a href="user.php?uid='.$row["uid"].'"><b>'. $cliant_name .' </b></a>';

			                 echo '<fieldset id="jobInfo">
									<legend><b>  حول  : </b></legend>
									<ol>';
								    getFromDB('emp_details', 'uid' , $row["uid"] , 'about' );
							echo 	'</ol>
  									</fieldset>';


							echo    '<fieldset id="jobInfo">
									<legend><b>  المهارات  : </b></legend>
									<ol>';
								    getFromDB('emp_details', 'uid' , $row["uid"] , 'skills' );
							echo 	'</ol>
  									</fieldset>'; 

							echo    '<fieldset id="jobInfo">
									<legend></legend>
									<ol>';

						     echo   '<p class="card-text">     المهنة   : <b>';
						      	    getFromDB('career', 'career_en' , $row["career"] , 'career_ar' );						    
					         echo   '</b></p>';

					         echo   '<p class="card-text">    المدينة   : <b>';
						      	    getFromDB('citys', 'city_name_en' , $row["city"] , 'city_name_ar' );						    
					         echo   '</b></p>';

					         echo   '<p class="card-text">    المنطقة   : <b>';
					        	     getFromDB('city_pranch', 'pranch_name_en' , $row["region"] , 'pranch_name_ar' );						    
					         echo   '</b></p>';
   
					         echo   '<p class="card-text">  الدخل الشهري  : <b>'.$row["balance"].'$ </b></p>';
					       
					         echo   '<p class="card-text">تم الانضمام بتاريخ :<b>'.  $row["join_at"] .'</b></p>';
							 echo 	'</ol>
  									</fieldset>';			  
			               
			                echo   '<div align="left"> 
					               	<a href="user.php?uid='.$row["uid"].'" class="btn btn-outline-primary">بيانات المهني </a>
				               		<a class="btn btn-outline-primary" data-toggle="modal" data-target="#send_msg-'.$row["uid"].'" class="btn btn-outline-primary"> ارسال رسالة  </a>';			               	 

			               	 echo 		'</div>
						            </div>
						        </div>
						        <div class="col-sm-5 img_hover">
		 			    		<img  class="card-img-top h-100 col-sm-12" src="users/'.$cliant_image.'" alt="Card image cap">
					         </div>
					    </div>
					</div>

						<!-- --------------------------------------------  Models MSG  ----------------------------------------------->
								 <div class="modal fade" id="send_msg-'.$row["uid"].'" dir="rtl">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">الغاء</span></button>
									        <h4 class="modal-title"><span><b>   رسالة جديدة    </b></span></h4>
								   	   </div> 
										<div class="modal-body title1">
											<div class="row">

												<div class="col-md-12"><h5 class="form-group">الى :</h5>
													<form role="form" method="post">

													<div class="form-group">
														<input type="text" id="SenTo" value="'.$cliant_name.'" name="SenTo" class="form-control" disabled>
													<input type="hidden" id="reseverUID-'.$row["uid"].'" value="'.$row["uid"].'" name="SeneUID" class="form-control">
													</div>
													<div class="form-group">
														 <textarea id="MsgText-'.$row["uid"].'" name="MsgText"  class="form-control" rows="7" placeholder=" نص الرسالة  ...  "></textarea>
													</div>
										 
													<div class="form-group" align="center">
														<input type="button" id="send-'.$row["uid"].'" name="send" value="ارسال " class="btn btn-info" />
													</div>
													</form>
												</div>
											</div>
								      </div>
								    </div>
								  </div>
								</div>  

								<script type="text/javascript">
						         $(document).ready(function(){
								  $("#send-'.$row["uid"].'").click(function(){
								  
						 		var reseverUID = document.getElementById("reseverUID-'.$row["uid"].'").value;
								var MsgText = document.getElementById("MsgText-'.$row["uid"].'").value;
 						     	  	  $.ajax({  
						            	data:{"reseverUID" : reseverUID , "MsgText" : MsgText},
						                url:"operations/msg/send.php",  
						                method:"POST",  
						                success:function(data){  
  		                	       	     $("#send_msg-'.$row["uid"].'").modal("hide");
 		                	       	      Swal.fire("تم إرسال الرسالة بنجاح  ", "'.$cliant_name.'    الى المستخدم   ", "success")
  
						                 }  
						            });  
						   
						 		  });
								});
						  </script> ';
												 
			            }
			    }

	     else {
	       echo "No Data ";
 
	    }}






if(empty($_GET["uid_name"]))
{
}
else
{
 $uid_name = $_GET["uid_name"];

			  $qery = "SELECT * from users where type ='employer' and email like  '%".$uid_name."%' or phone like '%".$uid_name."%'  order by fname desc";
					$result = $conn->query($qery);
			 	 if ($result->num_rows > 0) {
 			        while($row = $result->fetch_assoc()) { 
 

	        	  $cliant_name = $row["fname"].' '. $row["lname"];
	 
 
	   	    if ((strpos($row["image"], 'jpg') !== false) || (strpos($row["image"], 'jpeg') !== false)||(strpos($row["image"], 'png') !== false)) {
 					  $cliant_image = $row["image"];
					}else{
					  $cliant_image = 'avtar.jpg';
					  }
  
		 
	        	echo '
	        	<div class="card" style=" padding:10px 10px 10px 10px;margin-top:20px ;">
			    <div class="row">
 			        <div class="col-sm-7">
			            <div class="card-body">
			              <img src="users/'.$cliant_image.'" width="35" height="35"  class="avatar rounded-circle" >&nbsp;
			                <a href="user.php?uid='.$row["uid"].'"><b>'. $cliant_name .' </b></a>';

			                 echo '<fieldset id="jobInfo">
									<legend><b>  حول  : </b></legend>
									<ol>';
								    getFromDB('emp_details', 'uid' , $row["uid"] , 'about' );
							echo 	'</ol>
  									</fieldset>';


							echo    '<fieldset id="jobInfo">
									<legend><b>  المهارات  : </b></legend>
									<ol>';
								    getFromDB('emp_details', 'uid' , $row["uid"] , 'skills' );
							echo 	'</ol>
  									</fieldset>'; 

							echo    '<fieldset id="jobInfo">
									<legend></legend>
									<ol>';

						     echo   '<p class="card-text">     المهنة   : <b>';
						      	    getFromDB('career', 'career_en' , $row["career"] , 'career_ar' );						    
					         echo   '</b></p>';

					         echo   '<p class="card-text">    المدينة   : <b>';
						      	    getFromDB('citys', 'city_name_en' , $row["city"] , 'city_name_ar' );						    
					         echo   '</b></p>';

					         echo   '<p class="card-text">    المنطقة   : <b>';
					        	     getFromDB('city_pranch', 'pranch_name_en' , $row["region"] , 'pranch_name_ar' );						    
					         echo   '</b></p>';
   
					         echo   '<p class="card-text">  الدخل الشهري  : <b>'.$row["balance"].'$ </b></p>';
					       
					         echo   '<p class="card-text">تم الانضمام بتاريخ :<b>'.  $row["join_at"] .'</b></p>';
							 echo 	'</ol>
  									</fieldset>';			  
			               
			                echo   '<div align="left"> 
					               	<a href="user.php?uid='.$row["uid"].'" class="btn btn-outline-primary">بيانات المهني </a>
				               		<a class="btn btn-outline-primary" data-toggle="modal" data-target="#send_msg-'.$row["uid"].'" class="btn btn-outline-primary"> ارسال رسالة  </a>';			               	 

			               	 echo 		'</div>
						            </div>
						        </div>
						        <div class="col-sm-5 img_hover">
		 			    		<img  class="card-img-top h-100 col-sm-12" src="users/'.$cliant_image.'" alt="Card image cap">
					         </div>
					    </div>
					</div>

						<!-- --------------------------------------------  Models MSG  ----------------------------------------------->
								 <div class="modal fade" id="send_msg-'.$row["uid"].'" dir="rtl">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">الغاء</span></button>
									        <h4 class="modal-title"><span><b>   رسالة جديدة    </b></span></h4>
								   	   </div> 
										<div class="modal-body title1">
											<div class="row">

												<div class="col-md-12"><h5 class="form-group">الى :</h5>
													<form role="form" method="post">

													<div class="form-group">
														<input type="text" id="SenTo" value="'.$cliant_name.'" name="SenTo" class="form-control" disabled>
													<input type="hidden" id="reseverUID-'.$row["uid"].'" value="'.$row["uid"].'" name="SeneUID" class="form-control">
													</div>
													<div class="form-group">
														 <textarea id="MsgText-'.$row["uid"].'" name="MsgText"  class="form-control" rows="7" placeholder=" نص الرسالة  ...  "></textarea>
													</div>
										 
													<div class="form-group" align="center">
														<input type="button" id="send-'.$row["uid"].'" name="send" value="ارسال " class="btn btn-info" />
													</div>
													</form>
												</div>
											</div>
								      </div>
								    </div>
								  </div>
								</div>  

								<script type="text/javascript">
						         $(document).ready(function(){
								  $("#send-'.$row["uid"].'").click(function(){
								  
						 		var reseverUID = document.getElementById("reseverUID-'.$row["uid"].'").value;
								var MsgText = document.getElementById("MsgText-'.$row["uid"].'").value;
 						     	  	  $.ajax({  
						            	data:{"reseverUID" : reseverUID , "MsgText" : MsgText},
						                url:"operations/msg/send.php",  
						                method:"POST",  
						                success:function(data){  
  		                	       	     $("#send_msg-'.$row["uid"].'").modal("hide");
 		                	       	      Swal.fire("تم إرسال الرسالة بنجاح  ", "'.$cliant_name.'    الى المستخدم   ", "success")
  
						                 }  
						            });  
						   
						 		  });
								});
						  </script> ';
												 
			            }
			    }

	     else {
	       echo "No Data ";
 
	    }}





if(empty($_GET["city"]))
{}
else
{
 $city = $_GET["city"];
     $qery = "SELECT * from users where type ='employer' and city like  '%".$city."%'  order by join_at desc ";

 if(!empty($_GET["pranch"]))
{
  $pranch = $_GET["pranch"];
  $qery = "SELECT * from users where type ='employer' and city like  '%".$city."%' and region like  '%".$pranch."%'  order by join_at desc ";

} 
		 
			
				$result = $conn->query($qery);
			 	 if ($result->num_rows > 0) {
 			        while($row = $result->fetch_assoc()) { 
 

	        	  $cliant_name = $row["fname"].' '. $row["lname"];
	 
 
        	   if ((strpos($row["image"], 'jpg') !== false) || (strpos($row["image"], 'jpeg') !== false)||(strpos($row["image"], 'png') !== false)) {
 					  $cliant_image = $row["image"];
					}else{
					  $cliant_image = 'avtar.jpg';
					  }
		 
	        	echo '
	        	<div class="card" style=" padding:10px 10px 10px 10px;margin-top:20px ;">
			    <div class="row">
 			        <div class="col-sm-7">
			            <div class="card-body">
			              <img src="users/'.$cliant_image.'" width="35" height="35"  class="avatar rounded-circle" >&nbsp;
			                <a href="user.php?uid='.$row["uid"].'"><b>'. $cliant_name .' </b></a>';

			                 echo '<fieldset id="jobInfo">
									<legend><b>  حول  : </b></legend>
									<ol>';
								    getFromDB('emp_details', 'uid' , $row["uid"] , 'about' );
							echo 	'</ol>
  									</fieldset>';


							echo    '<fieldset id="jobInfo">
									<legend><b>  المهارات  : </b></legend>
									<ol>';
								    getFromDB('emp_details', 'uid' , $row["uid"] , 'skills' );
							echo 	'</ol>
  									</fieldset>'; 

							echo    '<fieldset id="jobInfo">
									<legend></legend>
									<ol>';

						     echo   '<p class="card-text">     المهنة   : <b>';
						      	    getFromDB('career', 'career_en' , $row["career"] , 'career_ar' );						    
					         echo   '</b></p>';

					         echo   '<p class="card-text">    المدينة   : <b>';
						      	    getFromDB('citys', 'city_name_en' , $row["city"] , 'city_name_ar' );						    
					         echo   '</b></p>';

					         echo   '<p class="card-text">    المنطقة   : <b>';
					        	     getFromDB('city_pranch', 'pranch_name_en' , $row["region"] , 'pranch_name_ar' );						    
					         echo   '</b></p>';
   
					         echo   '<p class="card-text">  الدخل الشهري  : <b>'.$row["balance"].'$ </b></p>';
					       
					         echo   '<p class="card-text">تم الانضمام بتاريخ :<b>'.  $row["join_at"] .'</b></p>';
							 echo 	'</ol>
  									</fieldset>';			  
			               
			                echo   '<div align="left"> 
					               	<a href="user.php?uid='.$row["uid"].'" class="btn btn-outline-primary">بيانات المهني </a>
				               		<a class="btn btn-outline-primary" data-toggle="modal" data-target="#send_msg-'.$row["uid"].'" class="btn btn-outline-primary"> ارسال رسالة  </a>';			               	 

			               	 echo 		'</div>
						            </div>
						        </div>
						        <div class="col-sm-5 img_hover">
		 			    		<img  class="card-img-top h-100 col-sm-12" src="users/'.$cliant_image.'" alt="Card image cap">
					         </div>
					    </div>
					</div>

						<!-- --------------------------------------------  Models MSG  ----------------------------------------------->
								 <div class="modal fade" id="send_msg-'.$row["uid"].'" dir="rtl">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">الغاء</span></button>
									        <h4 class="modal-title"><span><b>   رسالة جديدة    </b></span></h4>
								   	   </div> 
										<div class="modal-body title1">
											<div class="row">

												<div class="col-md-12"><h5 class="form-group">الى :</h5>
													<form role="form" method="post">

													<div class="form-group">
														<input type="text" id="SenTo" value="'.$cliant_name.'" name="SenTo" class="form-control" disabled>
													<input type="hidden" id="reseverUID-'.$row["uid"].'" value="'.$row["uid"].'" name="SeneUID" class="form-control">
													</div>
													<div class="form-group">
														 <textarea id="MsgText-'.$row["uid"].'" name="MsgText"  class="form-control" rows="7" placeholder=" نص الرسالة  ...  "></textarea>
													</div>
										 
													<div class="form-group" align="center">
														<input type="button" id="send-'.$row["uid"].'" name="send" value="ارسال " class="btn btn-info" />
													</div>
													</form>
												</div>
											</div>
								      </div>
								    </div>
								  </div>
								</div>  

								<script type="text/javascript">
						         $(document).ready(function(){
								  $("#send-'.$row["uid"].'").click(function(){
								  
						 		var reseverUID = document.getElementById("reseverUID-'.$row["uid"].'").value;
								var MsgText = document.getElementById("MsgText-'.$row["uid"].'").value;
 						     	  	  $.ajax({  
						            	data:{"reseverUID" : reseverUID , "MsgText" : MsgText},
						                url:"operations/msg/send.php",  
						                method:"POST",  
						                success:function(data){  
  		                	       	     $("#send_msg-'.$row["uid"].'").modal("hide");
 		                	       	      Swal.fire("تم إرسال الرسالة بنجاح  ", "'.$cliant_name.'    الى المستخدم   ", "success")
  
						                 }  
						            });  
						   
						 		  });
								});
						  </script> ';
												 
			            }
			    }

	     else {
	       echo "No Data ";
 
	    }}
 


		   ?> 

 

	</div> 

<?php include_once('..\..\toster/toster.php'); ?>
