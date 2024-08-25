<?php
include_once('../conection.php');
 $sql = "SELECT * from citys ";
echo ' <option  value="">     المدينة         </option>
';

$result = $db->query($sql);

   while($row = $result->fetch_assoc()) {

 
      echo '<option class="form-control" value="'.$row['city_name_en'].'"> '.$row['city_name_ar'].' </option>';
  }
    
?>
