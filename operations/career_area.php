<?php
include_once('../conection.php');
 
$sql = "SELECT * from career_area ";
echo ' <option class="form-control" value=" ">    </option>';

$result = $db->query($sql);

   while($row = $result->fetch_assoc()) {

 
      echo '<option class="form-control" value="'.$row['career_area_en'].'"> '.$row['career_area_ar'].' </option>';

  }
  
 