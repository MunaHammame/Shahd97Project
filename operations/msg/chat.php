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

		  $query = "SELECT * from message where  reseveruid ='". $_SESSION['user']['uid']."'  and senderuid =".$id_msg." 
		   or  senderuid='". $_SESSION['user']['uid']."'  and  reseveruid=".$id_msg."   order by TimeDate asc";

$result_msg = $conn->query($query);
$num_row = $result_msg->num_rows;
       	 if ($result_msg->num_rows > 0) {
			        while($row_msg = $result_msg->fetch_assoc()) { 
 

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
								  </div>';

						   
					  	echo ' <span class="time text-muted small"> seen at  '.$row_msg["seen_at"].'</span>';
						 
			        	 
			        }
 
  
			        }}
			        ?> 
<form method="post">
		  <div class="row">
			<div class="col-12">
			  <div class="chat-box-tray">
				<i class="material-icons">sentiment_very_satisfied</i>
				<input type="hidden" id="uid" name="uid" value="<?php echo $id_msg ?>">
 				<input type="text" id="msg-<?php echo $id_msg ?>" placeholder="Type your message here...">
				<i id="enter" href="enter" class="material-icons">send</i>
			  </div>
			</div>
		  </div>
		</div>
	  </div></form>