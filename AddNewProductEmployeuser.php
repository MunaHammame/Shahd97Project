 <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include ('Nav.php');?>
       
 <link href = "/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>


      <script src="https://oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
     feedbackIcons: {
                 valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            PriceOfProduct_input: 
                    {
                    validators: {
                    notEmpty: {
                    message: 'يجب تعبئة الحقل'
            
                    },

                     regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'يجب أن يتكون السعر من ارقام فقط'
                    }
                
                    } },

                NameOfProduct_input: {
                validators: {
                    notEmpty: {
                        message: 'يجب تعبئة الحقل'
                    },
                        regexp: {
                        regexp: /^[a-zA-Zء-ي]+$/
,
                        message: ' يجب ان يتكون الاسم من حروف فقط       '
                    },
                        stringLength: {
                        min: 2,
                        max: 30,
                        message: 'الاسم يجب ان لا يقل عن حرفين وان لا يزيد عن  ثلاثين حرف'
                    }
                    
                }
            },
            Imagepath1_input: {
                message: 'The last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'يجب ادراج صورة للمنتج'
                    }
                }
            },
                   Imagepath2_input: {
                message: 'The last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'يجب ادراج صورة للمنتج'
                    }
                }
            },

             DiscriptionOfProduct_input: {
                message: 'وصف المنتج غير صحيح',
                validators: {
                    notEmpty: {
                        message: 'يجب تعبئة الحقل'
                    },
                    stringLength: {
                        min: 2,
                        max: 200,
                        message: 'الاسم يجب ان لا يقل عن حرفين وان لا يزيد عن  مئتان حرف'
                    }
              
                }
            }
 



        }
           
    });
     
   
 });
</script>
<style>
    form {
    height: 600px;
    width: 900px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 42%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgb(8 7 16 / 60%);
    padding: 20px 35px;
}
</style>

      
 </head>
<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row  h-100">
      <div class="col-12 col-lg-9 col-xl-7">
       
     
          
             <form id="registrationForm" method="post" class="card-body form-style" enctype="multipart/form-data">
                  <h3 class="form-label mb-4 pb-2 pb-md-0 mb-md-5" style="text-algin:right" >ادخال منتج جديد </h3>
    <?php display_error() ?>
           
    <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                      <label class="form-label"  for="firstName">سعر المنتج </label>
                      <input type="text" id="Product_Price" name="PriceOfProduct_input"  class="form-control form-control-lg" />
                            

                  </div>

                </div>
                    <div class="col-md-6 mb-4">

                  <div class="form-outline">
                   
                    <label class="form-label" for="firstName"> اسم المنتج</label>
                    <input type="text"  name="NameOfProduct_input" class="form-control form-control-lg" />                 
                  
                  </div>
                </div>
    </div>
              <div class="row">
    
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                      <label class="form-label" for="lastName">وصف المنتج </label>
                    <input type="text" id="DiscriptionOfProductinput" name="DiscriptionOfProduct_input" class="form-control form-control-lg" />
                    
                  </div>

                </div>
    
              </div>

      

             <div class="row">

                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label">  :   صورة المنتج    </label>         
                    <input type="file" class="form-control form-control-lg" name="Imagepath1_input">
                  </div>

                </div>
                    <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label">  :  صورة اخرى للمنتج   </label>         
                    <input type="file" class="form-control form-control-lg" name="Imagepath2_input">
                  </div>

                </div>
              </div>
          
 
 
              <div  align="center"  >
                 <input type="hidden" name="usertype" value="user" /> 
                 <input type="hidden" name="alias" value="" /> 
                 <input type="hidden" name="salary" value="" /> 

               
              </div>
                    
               <div align="center">
            <button type="submit" name="InsertNewProduct_btn" class="btn btn-primary btn-xl"> ادخال البيانات</button>
                </div>

          </form>
         
     
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

