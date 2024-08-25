<!DOCTYPE html>
<html>
<head>
  <title>Title of the document</title>
  <?php 
  include('Nav.php');
  $ProductID=$_GET['ProductID'];
  ?>
</head>
<style>

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 5s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}
@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
  /* Split the screen in half */
.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Control the left side */
.left {
  left: 0;
  
}

/* Control the right side */
.right {
  right: 0;
  background-color: #c8baba;
  margin-top: 90px;
}

/* If you want the content centered horizontally and vertically */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

/* Style the image inside the centered container, if needed */
.centered img {
  width: 150px;
  height: 150px;
  
}  
.form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
 
}    
section#comment{
  background-color: #212529;
  background-image: url("../assets/img/map-image.png");
  background-repeat: no-repeat;
  background-position: center;
}
.MunaTest{
  border : solid 4px red;
  margin-left: 150px;
  margin-top: 100px;
  overflow-x: auto;  
}
      .comment {
       margin-left: 100px;
       word-wrap: break-word;
       overflow-x: scroll;
       white-space: nowrap;
      }
        .FixedHeightContainer 
        {
            float:  right;
            height: 650px;      
            border: 1px solid red; 
        }
        .Content
        {
            height: 65%;
            width:  95%;
            overflow-y: auto;
            border: 1px solid red; 
        }
        .mainContainer{
            width: 550px;
            height: 90px;
            border:  2px solid black;         
            margin-left: 5px;
            margin-bottom: 6px;
            background-color: white;
            
        }
        .mainContainer img{
            border:solid 3px #000;
            margin-left: -400px;
            width: 50px;
            height: 50px;
        }
           .mainContainer .header{
            margin-top: -50px;
            background-color: #dcbaba;
           
        }
        .mainContainer p{
            font-family: Arial, Helvetica, sans-serif;
        }
            .mainContainer a{
            color: #6e70ae;
        }
        
</style>
<body>
<?PHP 

 global $conn;
 $sql = "SELECT ID, NameOfProduct,PriceOfProduct,DiscriptionOfProduct,image1,EmployeUid,image2 from productdetails where ID ='$ProductID' ";   

 $sql = "SELECT * from products where ProductId  ='$ProductID' ";   

 $result = $conn->query($sql);
 $row = $result->fetch_assoc();

?>

       <h2>صور  المنتج  </h2>
    <div class="slideshow-container" style="margin-top:60px">
<div class="mySlides ">
  <div class="numbertext">1 / 4</div>
      <img  width="70%" height="50%"  src="ImageOfProductsUploded/<?php echo ''.$row['ProductsImg1'].'' ?>" alt="Avatar woman">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides ">
  <div class="numbertext">2 / 4</div>
      <img width="70%"height="50%"  src="ImageOfProductsUploded/<?php echo ''.$row['ProductsImg2'].'' ?>" alt="Avatar woman">
  <div class="text">Caption Two</div>
</div>
<div class="mySlides">
  <div class="numbertext">3 / 4</div>
     <img width="70%" height="50%"src="ImageOfProductsUploded/<?php echo ''.$row['ProductsImg3'].'' ?>" alt="Avatar woman">
  <div class="text">Caption Three</div>
</div>
        
<div class="mySlides ">
  <div class="numbertext">4 / 4</div>
      <img width="70%" height="50%" src="ImageOfProductsUploded/<?php echo ''.$row['ProductsImg4'].'' ?>" alt="Avatar woman">
  <div class="text">Caption Four</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>
</div>
<br>


<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
    <span class="dot" onclick="currentSlide(4)"></span> 

</div>

  <div>
      <h2>صور  المنتج  </h2>
      <br>
      <h3 style="text-algin:left"> <?php echo ''.$row['ProductName'].'' ?> : أسم المنتج</h3>
      <h3 style="text-algin:right"> <?php echo ''.$row['ProductPrice'].'' ?> : سعر المنتج</h3>
      <h3 style="text-algin:left"> <?php echo ''.$row['ProductDescription'].'' ?> : وصف المنتج</h3>
  </div>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>
