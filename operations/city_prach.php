<?php
include_once('../conection.php');
$city = $_POST['city'];
$sql = "SELECT * from city_pranch where control = '".$city."'";
 echo ' <option value="">     المنطقة          </option>
';
$result = $db->query($sql);

 while($row = $result->fetch_assoc()) {
 echo '<option class="form-control" value="'.$row['pranch_name_en'].'"> '.$row['pranch_name_ar'].' </option>';
 }
  
