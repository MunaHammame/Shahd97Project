 <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include ('Nav.php');
        ?>

<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

<script>
$(document).ready(function() {
    $('.registrationForm').bootstrapValidator({
        
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok !important',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {    
            username:{
                    validators: {
                    notEmpty: {
                    message: 'The user name is required and cannot be empty'
                    },
                    different: {
                        field: 'password1',
                        message: 'username  and password cannot be the same as each other'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The user name must be more than 2 and less than 30 characters long'
                    }
                
                    } },
            fname: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    }
                }
            },
            lname: {
                message: 'The last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The last name must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'يمكن أن يتكون الاسم الأخير من حروف وارقام فقط'
                    },
                    different: {
                        field: 'password1',
                        message: 'The last name and password cannot be the same as each other'
                    }
                }
            },
            fname: {
                message: 'The first name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The first name must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'يمكن أن يتكون الاسم الأول من حروف وارقام فقط'
                    },
                    different: {
                        field: 'password2',
                        message: 'The first name and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            password1: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The password must have at least 6 characters'
                    }
                
                }
            },
            password2: {
                validators: {
                    notEmpty: {
                        message: 'The password confirmation is required and cannot be empty'
                    },
                    identical: {
                        field: 'password1',
                        message: 'The password  is not matched'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            birthday: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The date of birth is not valid'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
                    }
                }
            },
            usertype: {
                validators: {
                    notEmpty: {
                        message: 'The usertype is required'
                    }
                }
            },
            career: {
                validators: {
                    notEmpty: {
                        message: 'The career is required'
                    }
                }
            },
            career_area: {
                validators: {
                    notEmpty: {
                        message: 'The career seection is required'
                    }
                }
            }
        }
    });
   
 });
</script>
<script ">
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
    
  jQuery(document).ready(function($) {
  $('#city').on('change', function() {
        var city = $(this).val();
        
        
         $.ajax({
              type: "POST",
              data :{'city' : city},
              datatype: 'json',
              url:"operations/city_prach.php", 
               success:function(data){  
                    $("#pranch").html(data); 

                       }
                   });

          });   
          });
                function get_career_area(){
        $.ajax({
          type: "POST",
           datatype: 'json',
          url:"operations/career_area.php", 
           success:function(data){  
                $("#career_area").html(data); 
                   },
               });
            }

        get_career_area();


  $('#career_area').on('change', function() {
      var career_area = $(this).val();

         $.ajax({
              type: "POST",
              data :{'career_area' : career_area},
              datatype: 'json',
              url:"operations/career.php", 
               success:function(data){  
                    $("#career").html(data); 

                       },
                   });

            });

        </script>     
        

      
 </head>
<section class=" gradient-custom">
  <div class="container py-5 h-100">
    <div class="row   h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body ">
              <h3 class="form-label mb-4 pb-2 pb-md-0 mb-md-5" style="text-algin:right" >تسجيل الدخول لمستخدم لديه حرفة    </h3>
            <form id="registrationForm" method="post" class="card-body form-style" enctype="multipart/form-data">
    <?php display_error()  ?>
                <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                      <label class="form-label"  for="firstName">اسم المستخدم</label>
                      <input type="text" id="User_Name" name="username"  class="form-control form-control-lg" />
                    
                  </div>

                </div>
                    <div class="col-md-6 mb-4">

                  <div class="form-outline">
                   
                    <label class="form-label" for="firstName">الاسم الاول</label>
                    <input type="text"  name="fname" class="form-control form-control-lg" />                 
                  
                  </div>
                </div>
                </div>
              <div class="row">
    
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                      <label class="form-label" for="lastName">الاسم الاخير</label>
                    <input type="text" id="lastName" name="lname" class="form-control form-control-lg" />
                    
                  </div>

                </div>
           <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                       <label for="birthdayDate" class="form-label">تاريخ الميلاد</label>
                    <input type="date" class="form-control form-control-lg" id="birthdayDate" name="birthday" placeholder="YYYY-MM-DD"/>
                   
                  </div>

                </div>
              </div>

              <div class="row">

                <div class="col-md-6 mb-4">

                  <h6 class="form-label">الجنس </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                     value="female" checked   />
                    <label class="form-label form-check-label" for="femaleGender">انثى</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                       value="male"  />
                    <label class="form-label form-check-label" for="maleGender" >ذكر</label>
                  </div>
                </div>
                       <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                      <label class="form-label" for="emailAddress">البريد الالكتروني</label>
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" />
                    
                  </div>

                </div>
              </div>

             <div class="row">

                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                     <label class="form-label" for="phoneNumber">رقم الهاتف</label>
                    <input type="tel" id="phoneNumber" name="phone" class="form-control form-control-lg" />
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label">  :  اﻟﺼﻮﺭﺓ (اﺧﺘﻴﺎﺭﻱ)  </label>         
                    <input type="file" class="form-control form-control-lg" name="image">
                  </div>

                </div>
              </div>
             <div class="row">

                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                  <label class="form-label">  : اﻟﻤﺪﻳﻨﺔ  <span style="color:red">*</span></label>
                   <select  id="city" name="city" class="form-control">  </select>                                  
                  </div>
                </div>
                        <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">   
                       <label class="form-label">  :  اﻟﻤﻨﻄﻘﺔ  <span style="color:red">*</span></label>
                       <select id="pranch" name="region" class="form-control" >
                             <option class="form-control" value=" "> </option>
                      </select>                    
                  </div>
                 </div>
              </div>   
              <div class="row">

       
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label control-label">:    نطاق العمل  <span style="color:#ff0000">*</span>   </label>
                      <select id="career_area" name="career_area" class="form-control" >
<!--                              <option class="form-control" value=" ">     </option>
 -->
                     </select>                             
                  </div>
                </div>
            <div class="col-md-6 mb-4 pb-2">
            <div class="form-outline">
            <label class="form-label control-label">كلمة السر<span class="text-danger">*</span></label>
           <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="password1" id="password" placeholder="Choose password (5-15 chars)" value="">
           </div>   
           </div>
           </div>
                  
                  
                  
                  
             </div>        
            <div class="row">
       
           <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">                 
          <label class="form-label control-label ">تأكيد كلمة السر <span class="text-danger">*</span></label>
          
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control"  name="password2" id="cpassword" placeholder="Confirm your password" value="">
            </div>                
                  </div>
                 </div>
                   <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">  
               <div >
                   <br>
                      <button type="submit" name="register" class="btn btn-info btn-lg">ﺇﻧﺸﺎء ﺣﺴﺎﺏ</button>
                </div>
              </div>
                    
                   </div> 
                 </div>
              </div>
 
              <div  align="center"  >
                  <input type="hidden" name="usertype" value="employer" /> 
                  <input type="hidden" name="alias" value="" /> 
                  <input type="hidden" name="salary" value="" /> 
                  
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 <style>
  .teal {margin-top: 10px; margin-left: 200px; padding:20px;background:teal;color:white;}
  .gradient-custom {
/* fallback for old browsers */
background-image: url('./assets/img/42.png');

}

</style>
