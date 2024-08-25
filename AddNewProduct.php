<!DOCTYPE html>
<html lang="en">
<head>
<?php include ('Nav.php');?>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="vh-100">
  <section class="gradient-custom">
  <div class="row justify-content-center align-items-center h-100 py-3">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;"> 
      <?php display_error()  ?>  
 <form  class="card-body form" id="loginForm" method="post"  enctype="multipart/form-data"> 
    
     <div class="form-label"> <h3 class="form-label">اضافة منتج جديد</h3></div>
   
                   <div class="row">
                                       <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="lastName">سعرالمنتج </label>
                      <input type="text" id="Product_Price" name="PriceOfProduct_input"  class="form-control form-control-lg" />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline"> 
                     <label class="form-label" for="firstName">إسم المنتج</label>
                    <input type="text"  name="NameOfProduct_input" class="form-control form-control-lg" />                 
                  </div>
                </div>       
              </div>
                        <div class="row">
                                       <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="lastName">وصف المنتج </label>
                    <input type="text" id="DiscriptionOfProductinput" name="DiscriptionOfProduct_input" class="form-control form-control-lg" />
                  </div>
                </div>  
                                                            <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="lastName">قطاع المنتج </label>              
         <select name="ProductSector_input" class=" dropdown form-control form-control-lg">
        <option value="Eksiswarat">إكسسوارات</option>
        <option value="Al3ab">ألعاب</option>
        <option value="DomaAtfal">دمى أطفال</option>
        <option value="Feda">فضة</option>
        <option value="MostlzmatBytye">مستلزمات بيتية</option>
        <option value="MostlzmatTajmelea">مستلزمات تجميلية</option>
       <option value="ُEnergy">أدوات كهربائية</option>
        <option value="Azafr">أظافر</option>
        <option value="kasat"> كاسات</option>
        <option value="shont"> شنط</option>
        <option value="3otor"> عطور</option>
    </select>                                       
                               </div>
                                       
                </div>  
              </div>
             <div class="row">
                <div class="col-md-12 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="lastName">عدد الكمية المتوافرة </label>
                    <input type="text" id="DiscriptionOfProductinput" name="ProductAmount_Input" class="form-control form-control-lg" />
                  </div>
                </div>  

              </div>
                <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline"> 
                     <label class="form-label" > 1 صورة المنتج</label>
                    <input type="file" class="form-control form-control-lg" name="Imagepath1_input" id="Image" required>
                  </div>
                </div>       
                               <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline"> 
                     <label class="form-label" >صورة المنتج 2 </label>
                    <input type="file" class="form-control form-control-lg" name="Imagepath2_input" required>
                  </div>
                </div>    
              </div>
                     <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline"> 
                     <label class="form-label" >صورة المنتج  3 </label>
                    <input type="file" class="form-control form-control-lg" name="Imagepath3_input" required>
                  </div>
                </div>    
                                       <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline"> 
                     <label class="form-label" >صورة المنتج 4 </label>
                    <input type="file" class="form-control form-control-lg" name="Imagepath4_input" required>
                  </div>
                </div>  
              </div>
            <div class="row ">
                   <div class="col-md-12 mb-1  pb-2">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <button type="submit" name="InsertNewProduct_btn" class="btn btn-submit btn-lg"> ادخال البيانات</button>
   
                   </div>
              </div>

 </form>
        </div>
      </div>
  </div>
  </Section>
</body>
</html>
