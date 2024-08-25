<?php include_once('..\..\..\server.php');?>
 

<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
		<div class="panel panel-success">
		  <div class="panel-heading"><h4> ملفات تعريف  شبكات التواصل الاجتماعي  </h4></div>
		</div>
		<ul class="list-group">

<?php 
  $qery_sn = "SELECT * from sn where uid = ".$_GET['uid']."";
			$result_sn = $conn->query($qery_sn);
	        $row_sn = $result_sn->fetch_assoc();

	        if ($row_sn['facebook'] != null) {
 	      	   $facebook = ' <li class="list-group-item" style="font-size:20px" >
			      			 <a href="'.$row_sn['facebook'].'" target="_blank"> <i class="fab fa-facebook-square"> &nbsp;فيسبوك    </a></i></li>';
			         }
 			if ($row_sn['WhatsApp'] != null) {
	      	   $WhatsApp = ' <li class="list-group-item" style="font-size:20px;">
			      			 <a href="https://wa.me/'.$row_sn['WhatsApp'].'" target="_blank"><i class="fa fa-whatsapp" style="font-size:22px;color:green" aria-hidden="true">&nbsp;  وتساب  </i></a></i></li>';
			         }
 	         if ($row_sn['instagram'] != null) {
	      	   $instagram = ' <li class="list-group-item" style="font-size:20px;">
			      			 <a href="'.$row_sn['instagram'].'" target="_blank"><i class="fa fa-instagram" style="font-size:22px;color:red">&nbsp;    انستغرام  </i></a></i></li>';
			         }

	          if ($row_sn['twitter'] != null) {
	      	   $twitter = ' <li class="list-group-item" style="font-size:20px;">
			      			 <a href="'.$row_sn['twitter'].'" target="_blank"><i class="fa fa-twitter" style="font-size:22px; ">&nbsp;    تويتر    </i></a></i></li>';
			         }


  		       if ($row_sn['linkedin'] != null) {
	      	  	 $linkedin = ' <li class="list-group-item" style="font-size:20px;">
			      			 <a href="'.$row_sn['linkedin'].'" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>&nbsp;       لينكد إن     </i></a></i></li>';
			         }
 	       
			  		 echo  @$facebook.@$WhatsApp.@$instagram.@$twitter.@$linkedin ;
					    ?>
			 

		</ul>
 	</div>
 