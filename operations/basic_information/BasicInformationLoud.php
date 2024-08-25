<?php include_once('..\..\server.php'); 
 
  $qery = "SELECT * from users  WHERE uid = ".$_SESSION['user']['uid']."";
					$result = $conn->query($qery);
 			       $row = $result->fetch_assoc(); 
  
 	        	  if ((strpos($row["image"], 'jpg') !== false) || (strpos($row["image"], 'jpeg') !== false)||(strpos($row["image"], 'png') !== false)) {
							  $cliant_image = $row["image"];
							}else{
						 	 $cliant_image = 'avtar.jpg';
						  }
 	        	  ?> 

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
 			<center><img src="users/<?php echo $cliant_image ?>" style="max-width: 89%;" ></center>
		<center>	<h3><?php echo $FullName; ?></h3>
 
			<a   class="btn btn-outline-primary" data-toggle="modal" data-target="#basic_information_model" 
			class="btn btn-outline-primary">    تحديث البيانات    </a>
		</center>


  				<h4><span class="glyphicon glyphicon-pencil"></span>&nbsp; نوع الحساب :  
  					<?php 
  					if ($row['type'] =='employer') {  echo '(حرفي)'; }
  					else { echo '(مستخدم)'; } ?> 
  				</h4>
  				<h4><span class="glyphicon glyphicon-asterisk"></span>&nbsp;  نطاق العمل :  

  					<?php if ($row['career_area'] != null) {
  						 getFromDB('career_area', 'career_area_en' , $row['career_area'] , 'career_area_ar' );
  					}
  					  ?>

  					 </h4>
  				<h4><span class="glyphicon glyphicon-certificate"></span>&nbsp;  الحرفة :  
 
  					<?php if ($row['career'] != null) {
  						 getFromDB('career', 'career_en' , $row['career'] , 'career_ar' );
  					}
  					  ?> 
   				</h4>
  				<h4><span class="glyphicon glyphicon-map-marker"></span>&nbsp;  المدينة : 

  					<?php if ($row['city'] != null) {
  						 getFromDB('citys', 'city_name_en' , $row['city'] , 'city_name_ar' );
  					}
  					  ?>  
  				</h4>
  				<h4><span class="glyphicon glyphicon-map-marker"></span>&nbsp;  المنطقة : 

  				<?php if ($row['region'] != null) {
  						 getFromDB('city_pranch', 'pranch_name_en' , $row['region'] , 'pranch_name_ar' );
  					}
  					  ?>   
  				</h4>
  				<h4><span class="glyphicon glyphicon-calendar"></span>&nbsp; تاريخ الميلاد :  <?php echo $row['birthday']; ?> </h4>
  				<h4><span class="glyphicon glyphicon-heart"></span> &nbsp;  الجنس   :

  				<?php if ($row['gender'] == 'male') {
  					echo 'ذكر ' ;
  						}else{
  							echo 'انثى ';
  						}

  					?>  
  				 </h4>

  				<h4><span class="glyphicon glyphicon-calendar"> </span>&nbsp;   انضم فيــ:  <?php echo $row['join_at']; ?> </h4>
 	   		 </div>
<!--End Main profile card-->

<!--Contact Information-->
	<div id="Contact_Information">
	</div>
<!--End Contact Information-->

 

 