<?php include_once('..\..\server.php');?>

<!--Employer Profile Details-->	
<?php 
$uid = $_GET["uid"];
  $qery_sn = "SELECT * from emp_details where uid = ".$_GET["uid"]."";
			$result_sn = $conn->query($qery_sn);
	        $row_details = $result_sn->fetch_assoc(); ?>


		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-info">
			  <div class="panel-heading panel-info"><h3>تفاصيل ملف المستخدم  /</h3></div>
			</div>
			<div class="panel panel-info">
			  <div class="panel-heading">  حول   </div>
			  <div class="panel-body"><h4> <?php echo $row_details['about']; ?> </h4></div>
 			</div>
			
			<div class="panel panel-info">
			  <div class="panel-heading"> المهارات   </div>
			  <div class="panel-body"><h4><?php echo $row_details['skills']; ?></h4></div>
 			</div>


			<div class="panel panel-info">
			  <div class="panel-heading">  العمل    </div>
			  <div class="panel-body"><h4><?php echo $row_details['work']; ?></h4></div>
 			</div>


 			<div class="panel panel-info">
			  <div class="panel-heading">   متاح     </div>
			  <div class="panel-body"><h4>
										  	<?php
 										  	  $avalibel_in =  getFromDBreturn('emp_details', 'uid' , $_GET["uid"] , 'avalibel_in' );
										  	  $avalibel_to =  getFromDBreturn('emp_details', 'uid' , $_GET["uid"] , 'avalibel_to' );
								  	    	$time_in 		 =  getFromDBreturn('emp_details', 'uid' , $_GET["uid"] , 'time_in' );
								  	      $time_out    =  getFromDBreturn('emp_details', 'uid' , $_GET["uid"] , 'time_out' );
								  	      $exiption    =  getFromDBreturn('emp_details', 'uid' , $_GET["uid"] , 'exiption' );

								  	      if ($avalibel_in !=null) {
								  	       echo ' متاح  منذ يوم   ' . $avalibel_in;
								  	      }
 								  	      if ($avalibel_to !=null) {
								  	       echo  '  حتى يوم   '  . $avalibel_to;
								  	      }
 												  if ($time_in !=null) {
								  	       echo  '    منذ  الساعة  '  . $time_in;
								  	      }
								  	      if ($time_out !=null) {
								  	       echo '    حتى الساعة     '  . $time_out;
								  	      }
													if ($exiption !=null) {
								  	       echo '     باستثناء        '  . $exiption;
								  	      }
 												 ?>
									 </h4>
								</div>
 
 			</div>



			<div class="panel panel-info">
			  <div class="panel-heading">  العنوان  بالكامل    </div>
			  <div class="panel-body"><h4><?php echo $row_details['address']; ?></h4></div>
			</div>


		</div>
<!--End Employer Profile Details-->

 

