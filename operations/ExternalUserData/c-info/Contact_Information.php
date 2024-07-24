<?php include_once('..\..\..\server.php');

  $qery = "SELECT email , phone from users  WHERE uid = ".$_GET['uid']."";
					$Sqlresult = $conn->query($qery);
 			       $rowSql = $Sqlresult->fetch_assoc();

 			         if ($Sqlresult->num_rows > 0) {
  
?>

	<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>معلومات للتواصل</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">إيميل</div>
			  <div class="panel-body"><?php echo $rowSql['email']; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">موبايل</div>
			  <div class="panel-body"><?php echo $rowSql['phone']; ?></div>
			</div> 
		</div>
		<?php 
	}
	?>