<?php
include_once('../conection.php');
  $career_area = $_POST['career_area'];
$sql = "SELECT * from career where control = '".$career_area."' ";
echo ' <option class="form-control" value=" ">    </option>';

$result = $db->query($sql);

   while($row = $result->fetch_assoc()) {

 
      echo '<option class="form-control" value="'.$row['career_en'].'"> '.$row['career_ar'].' </option>';

  }
  
