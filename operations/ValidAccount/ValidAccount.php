<?php include_once('..\..\server.php');

 $status = getFromDBreturn('account_validat' , 'uid', $_SESSION['user']['uid'] , 'status' );
if ( $status == 0 ) {

	echo '<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
		<div class="panel panel-success">
		  <div class="panel-heading"><h4> تأكيد الحساب </h4></div>
		</div> 
 		    	<div align="center" style="margin:1%">	 
	 			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_ValidAccount">    تأكيد  حسابي    </a>
				</div>
			</div>';
 }else { 
 	echo '<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
		<div class="panel panel-success">
		  <div class="panel-heading"><h4>  تم التحقق من الحساب   </h4></div>
		</div>
     	<div align="center"  class="panel-heading">
     	 <a href="AccountFiles/'.getFromDBreturn("account_validat" , "uid", $_SESSION["user"]["uid"] , "file" ).'" data-lightbox="example-1" >	
     		   <img class=" col-md-12 "  src="AccountFiles/'.getFromDBreturn("account_validat" , "uid", $_SESSION["user"]["uid"] , "file" ).'" alt="Card image cap">
     		   </a> &nbsp

      
			</div>
	</div>';
}

?>



 