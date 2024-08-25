<?php 
 include_once('..\server.php');
if (isLoggedIn()){ 
 $QueryCountMsg = "SELECT count(reseveruid) as CountMsg from message where reseveruid ='". $_SESSION['user']['uid']."' and seen =0";
     $ResultCountMsg = $conn->query($QueryCountMsg);
      if ($ResultCountMsg->num_rows > 0) {
      	$RowCountMsg = $ResultCountMsg->fetch_assoc(); 
      }

echo '
       <a href="" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
       <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span>';
       if ($RowCountMsg['CountMsg'] > 0 ) {
         echo '<span class="label label-pill label-danger count" style="border-radius:10px;">'.$RowCountMsg['CountMsg'].'</span>';
       }
      	
   echo ' </a>
       <ul class="dropdown-menu" style="width:40rem">
         <caption class="active"> <center><h4> الرسائل </h4></center> </caption>';
 

 $qery = "SELECT MsgText, senderuid , COUNT( senderuid ) dblic from message where  reseveruid ='". $_SESSION['user']['uid']."' and seen =0 GROUP BY senderuid HAVING dblic > 0 order by TimeDate desc limit 8 ";

     $result_msg = $conn->query($qery);
     	 if ($result_msg->num_rows > 0) {
			        while($row_msg = $result_msg->fetch_assoc()) { 
        	echo '
								<li class="border ">
									
											<a href="message.php?uid='.$row_msg['senderuid'].'">
											<b><span> '.getFullNameClient($row_msg['senderuid']).'</span> ('.$row_msg['dblic'].')</b>
											<br>
											<h6>'.$row_msg["MsgText"].'</h6>
											</a>
 							 </li>'; 
        }

      } 
      echo '  <caption class="active"><a  href="message.php"> <center><h4>  عرض جميع الرسائل  </h4></center></a> </caption>
      </ul>
      ';

} ?>

<style type="text/css">
    .bg-custom-1 {
  background-color: #85144b;
}

.bg-custom-2 {
background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
}

.border {      
    background-color: #cfcfcf;
    white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width:40rem;
  } 
</style>