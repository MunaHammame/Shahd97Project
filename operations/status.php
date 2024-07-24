<?php include_once('..\server.php');?>

<!--Employer Profile Details-->	

		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-info">
			  <div class="panel-heading panel-info"><h3>تفاصيل ملف المستخدم  /</h3></div>
			</div>
			<div class="panel panel-info">
			  <div class="panel-heading">  حول   </div>
			  <div class="panel-body"><h4> <?php  getFromDB('emp_details', 'uid' , $_SESSION['user']['uid'] , 'about' ); ?> </h4></div>
				 	<div align="left" style="margin:1%">	 
	 			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_about">     تعديل    </a>
				</div>
			</div>
			
			<div class="panel panel-info">
			  <div class="panel-heading"> المهارات   </div>
			  <div class="panel-body"><h4><?php  getFromDB('emp_details', 'uid' , $_SESSION['user']['uid'] , 'skills' ); ?></h4></div>
			   
		   	<div align="left" style="margin:1%">	 
	 			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_skills">     تعديل    </a>
				</div>

			</div>

			<div class="panel panel-info">
			  <div class="panel-heading">  العمل    </div>
			  <div class="panel-body"><h4><?php  getFromDB('emp_details', 'uid' , $_SESSION['user']['uid'] , 'work' ); ?> </h4></div>
			    	<div align="left" style="margin:1%">	 
	 			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_work">     تعديل    </a>
				</div>
 			</div>

 			<div class="panel panel-info">
			  <div class="panel-heading">   متاح     </div>
			  <div class="panel-body"><h4>
										  	<?php
 										  	  $avalibel_in =  getFromDBreturn('emp_details', 'uid' , $_SESSION['user']['uid'] , 'avalibel_in' );
										  	  $avalibel_to =  getFromDBreturn('emp_details', 'uid' , $_SESSION['user']['uid'] , 'avalibel_to' );
								  	    	$time_in 		 =  getFromDBreturn('emp_details', 'uid' , $_SESSION['user']['uid'] , 'time_in' );
								  	      $time_out    =  getFromDBreturn('emp_details', 'uid' , $_SESSION['user']['uid'] , 'time_out' );
								  	      $exiption    =  getFromDBreturn('emp_details', 'uid' , $_SESSION['user']['uid'] , 'exiption' );

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
			    	<div align="left" style="margin:1%">	 
	 			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_avalibel">     تعديل    </a>
				</div>
 			</div>


			<div class="panel panel-info">
			  <div class="panel-heading">  العنوان  بالكامل    </div>
			  <div class="panel-body"><h4><?php  getFromDB('emp_details', 'uid' , $_SESSION['user']['uid'] , 'address' );?></h4></div>
			    	<div align="left" style="margin:1%">	 
	 			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_address">     تعديل    </a>
				</div>
			</div>


		</div>
<!--End Employer Profile Details-->

 

