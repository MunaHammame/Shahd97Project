<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
<head> 
    <?php include ('Nav.php') ?>

</head>
<style>
div.gallery{
  margin-top: 30px;
  margin-left: 30px;
  border: 1px solid #ccc;
  float: left;
  width: 250px;
}
div.gallery:hover {
  border: 1px solid #777;
}
div.gallery img {
  width: 100px;
  height: 100px;
  margin-top: 10px;
}
div.desc {
  padding-bottom: 5px;
  text-align: center;
}
</style>
<script>
  function get_citys()
    {
        $.ajax({
          type: "POST",
           datatype: 'json',
          url:"operations/city.php", 
           success:function(data){  
                $("#city").html(data); 
                   }
               });  
    }
         get_citys(); 
</script>
<body>  
     
      <form method="POST" action="">
      
          <div style="margin-top:100px" >
                        <select style="width:  700px" id="city" name="city" onchange="this.form.submit()" >  </select>  
                  <label > ابحث عن طريق المنطقة    <span style="color:red">*</span></label>
                                                
                  </div>
                         <h3>البائعين التابعين لهذه المجموعة</h3>

 
</form>
    
    


  
   
      <?php   
   $cityOption= filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
   if(isset($_POST["city"]) and $cityOption !="all_citys"){
       $country=$cityOption;
   Display_SearchedUsers('clothes',$country);   
   }

   if (isset($_POST["city"]) and $cityOption === "all_citys") {
    Display_Users('clothes');
   
 }
 elseif(!isset($_POST["city"]) ) {
       Display_Users('clothes');
 }
   ?>

    
</body>

</html>

