<div id="loud">
	<?php 
include_once('..\..\server.php');
$id_msg = $_POST['id_msg'];
	 ?>
	  <div class="col-md-8"> 
		<div class="settings-tray">
			<div class="friend-drawer no-gutters friend-drawer--grey">
			<img class="profile-image"  src="users/<?php echo getClientImage($id_msg) ?>"  alt="">
			<div class="text">
			  <h6> <?php echo  getFullNameClient($id_msg) ?></h6>
			  <p class="text-muted"><?php getFromDB('users' , 'uid', $id_msg , 'alias' ) ?></p>
			</div>
			<span class="settings-tray--right">
			  <i class="material-icons">cached</i>
			  <i class="material-icons">message</i>
			  <i class="material-icons">menu</i>
			</span>
		  </div>
		</div>
		<?php 

		  $query = "SELECT * from message where 
		   reseveruid ='". $_SESSION['user']['uid']."'  and senderuid =".$id_msg." or senderuid='". $_SESSION['user']['uid']."'  and  reseveruid=".$id_msg." order by TimeDate asc ; 

 		   ";
  
 

      $result_msg = $conn->query($query);
 
      	 if ($result_msg->num_rows > 0) {
      
			        while($row_msg = $result_msg->fetch_assoc()) { 
			        	if($row_msg['seen'] != 1){
			        		 $sql_msg_update= "UPDATE message set seen =1 , seen_at = NOW() where id =".$row_msg['id']."";
								 mysqli_query($db, $sql_msg_update); 
			        	}			        echo  '<span class="time text-muted small"> seen at  '.$row_msg["seen_at"].'</span>';

								

			        if ($row_msg['senderuid']  == $_SESSION['user']['uid']) {
		        	 
 			        echo '	  <div class="row no-gutters">
								<div class="col-md-11 offset-md-9">
								  <div class="chat-bubble chat-bubble--right">
								'.$row_msg['MsgText'] .'
								  </div>
								</div>
							  </div>
 
					';


			        }elseif ($row_msg['senderuid'] == $id_msg) {
			        	echo '	<div class="chat-panel">
								  <div class="row no-gutters">
									<div class="col-md-11">
									  <div class="chat-bubble chat-bubble--left">
										'.$row_msg['MsgText'] .'
									  </div>
									</div>
								  </div>
							  	   '; 
			        	 
			        }


 			        }}
			        ?> </div>
<form method="post">
		  <div class="row">
			<div class="col-12">
			  <div class="chat-box-tray">
				<i class="material-icons">sentiment_very_satisfied</i>
				<input type="hidden" id="uid" name="uid" value="<?php echo $id_msg ?>">
 				<input type="text" id="msg-<?php echo $id_msg ?>" placeholder="Type your message here...">
				<i class="material-icons">mic</i>
				<i id="send" class="material-icons">send</i>
			  </div>
			</div>
		  </div>
		</div>
	  </div></form>
 <script type="text/javascript">

    function fetch_chat()  
        {  
    	      var id_msg =document.getElementById("uid").value; 
            $.ajax({  
            	data:{"id_msg" : id_msg },
				method:"POST", 
                url:"operations/msg/chat.php",  
                success:function(data){  
                    $('#loud').html(data);  
                }  
            });  
        } 
fetch_chat();
        //update time to chat box 
 //setInterval(function() {  fetch_chat(); }, 1500);

     $("#send").click(function(){
   
      var reseverUID =document.getElementById("uid").value; 
      var MsgText = document.getElementById("msg-<?php echo $id_msg ?>").value; 
               $.ajax({  
                data:{"reseverUID" : reseverUID , "MsgText" : MsgText},
                  url:"operations/msg/send.php",  
                  method:"POST",  
                  success:function(data){ 
                          fetch_chat();
                         

                   }  
              });  
     
        });

</script>
 
 
