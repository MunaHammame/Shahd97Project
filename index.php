<!--<!DOCTYPE html>-->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include ('Header.php'); ?>
    </head>
    <body id="page-top">
      <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"style="color:white">عن مشروعنا</h2>
                    <h3 class="section-subheading"style="color:white">تعرف علينا</h3>
                </div>
                 <?php display_error() ?>
                <ul class="timeline">
                      <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid-edited " src="Images/toys1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                
                                <h4 class="subheading" style="color:white">ماذا تجد لدينا ؟</h4>
                            </div>
                            <div class="timeline-body"><p style="color:white">
الاشياء الجذابة والمدهشة تجدونها لدينا 
                            </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid-edited " src="Images/toys.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                
                                <h4 class="subheading" style="color:white">مشاهدة البضائع اول بأول</h4>
                            </div>
                            <div class="timeline-body"><p style="color:white">
تسطيع مشاهدة جميع البضائع المتوفرة في المتجر لدينا تسطيع ارسال طلب للشراء من المسؤول عن الموقع وسيتم التواصل معك باسرع وقت للتوصيل المنتج  
                            </div>
                    </li>
                    <li >
                        <div class="timeline-image"><img class="rounded-circle img-fluid-edited " src="Images/Bag.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                               
                                <h4 class="subheading" style="color:white">سعر التوصيل</h4>
                            </div>
                            <div class="timeline-body"><p  style="color:white">
التوصيل 20 للضفة و 30 للقدس و 70 للداخل
                            </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                كن
                                <br />
                                جزء
                                <br />
                                من قصتنا
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
             
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"style="color:white">أقسامنا</h2>
                    <h3 class="section-subheading"style="color:white">تعرف الان على الخدمات الموجودة في موقعنا</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">                       
                    <span class="fa-stack fa-4x">
                             <a href="ViewProductsRelatedToSector.php?SectorName=Al3ab">
                            <img src="Images/toys.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                        </a>
                            </i>
                        </span>
                        <h4 class="my-3">العاب</h4>
                        <p class="text-white-50"> قسم الالعاب</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                             <a href="ViewProductsRelatedToSector.php?SectorName=DomaAtfal">
                  <img src="Images/toys1.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                             </a>
                        </span>
                        <h4 class="my-3">دمى أطفال</h4>
                        <p class="text-white-50">قسم دمى الاطفال</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                             <a href="ViewProductsRelatedToSector.php?SectorName=Feda">
                                  <img src="Images/Feda.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                            </a> 
                        </span>
                        <h4 class="my-3">فضة</h4>
                        <p class="text-white-50" >قسم الفضة</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                             <a href="ViewProductsRelatedToSector.php?SectorName=Eksiswarat">
                     <img src="assets/img/Services/666.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                             </a>
                        </span>
                        <h4 class="my-3">اكسسوارات</h4>
                        <p class="text-white-50">قسم تسويق الاكسسوارات</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                             <a href="ViewProductsRelatedToSector.php?SectorName=MostlzmatBytye">
                     <img src="Images/Home.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                            </a>  
                     </span>
                        <h4 class="my-3">مستلزمات بيتية</h4>
                        <p class="text-white-50">قسم المستلزمات البيتية</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                    <a href="ViewProductsRelatedToSector.php?SectorName=MostlzmatTajmelea">

                        <img src="Images/Makeup.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                           </a>  
                        </span>
                        <h4 class="my-3">مستلزمات تجميلية</h4>
                        <p class="text-white-50">قسم المستلزمات التجميلية</p>
                    </div>
                    
                           <div class="col-md-4">
                        <span class="fa-stack fa-4x">  <a href="ViewProductsRelatedToSector.php?SectorName=ُEnergy">
                        <img src="Images/energy.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                          </a>  
                        </span>
                        <h4 class="my-3">أدوات كهربائية</h4>
                        <p class="text-white-50">قسم الأدوات الكهربائية </p>
                    </div>
                    
                    
                              <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                          <a href="ViewProductsRelatedToSector.php?SectorName=Azafr">
                                                      <img src="Images/Nails.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                          </a>
                                                        </span>                      
                        <h4 class="my-3">أظافر</h4>
                        <p class="text-white-50">قسم الأظافر </p>
                    </div>
                    
                    
                         <div class="col-md-4">
                        <span class="fa-stack fa-4x">
           <a href="ViewProductsRelatedToSector.php?SectorName=kasat">
                        <img src="Images/Cups.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                         </a>
                        </span>
                        <h4 class="my-3">كاسات</h4>
                        <p class="text-white-50">قسم الكاسات </p>
                    </div>
                    
                    
                       <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                                 <a href="ViewProductsRelatedToSector.php?SectorName=shont">      
                        <img src="Images/Bag.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                          </a>
                        </span>
                        <h4 class="my-3">شنط</h4>
                        <p class="text-white-50">قسم الشنط </p>
                    </div>
                    
                        <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                  <a href="ViewProductsRelatedToSector.php?SectorName=3otor">
                        <img src="Images/parfa.jpg" style="width:130px; height:130px; border: 1px solid #000; border-radius: 55%" >
                           </a>
                        </span>
                        <h4 class="my-3">عطور</h4>
                        <p class="text-white-50">قسم العطور </p>
                    </div>
                    
                </div>
            </div>
        </section>
        
  <?php include ('Footer.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
