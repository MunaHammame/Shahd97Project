







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
   Display_SearchedUsers('Decorations',$country);   
   }

   if (isset($_POST["city"]) and $cityOption === "all_citys") {
    Display_Users('Decorations');
 }
 elseif(!isset($_POST["city"]) ) {
       Display_Users('Decorations');
 }
  
   ?> 
   

 
   
   
    
    
    
</body>

</html>























