


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <style>
      <!-- CSS only -->
      * {box-sizing:border-box}

/* Slideshow container */
a {
 color: #1A92A3;
 font-size:30px;
 font-weight: 500;
 -webkit-transition: -webkit-transform 0.2s;
 transition: transform 0.2s;
 display: inline-block;
 text-decoration: none;
 position: relative;
 }
 a:hover {
 -webkit-transform: scale(0.9);
 transform: scale(0.9);
 }
 a::before {
 position: absolute;
 top: -2px;
 left: -7px;
 box-sizing: content-box;
 padding: 0 5px;
 width: 100%;
 height: 100%;
 border: 2px solid #0BBAA0;
 content: '';
 opacity: 0;
 -webkit-transition: opacity 0.2s, -webkit-transform 0.2s;
 transition: opacity 0.2s, transform 0.2s;
 -webkit-transform: scale(0.9);
 transform: scale(0.9);
 }
 a:hover::before {
 opacity: 1;
 -webkit-transform: scale(1.2);
 transform: scale(1.2);
 }
.slideshow-container {
  max-width: 900px;
  position: relative;
  top:-135px;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
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
  height: 12px;
  width: 12px;
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
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
.carte{
  width:300px;
}
@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}



.jaw{
text-align: center;
position: absolute;
top: 12%;
left: 50%;
transform: translate(-50%,-50%);
width: 80%;
}
.jaw span{

display: block;
}
.text1{
color: grey;
font-size: 60px;
font-weight: 600;
letter-spacing: 8px;
margin-bottom: -5px;

position: relative;
animation: text 3s 1;
}

.text2{
font-size: 70px;
color: #61ABE7;
letter-spacing: 6px;

}

@keyframes text {
0%{
  color: black;
  margin-bottom: -40px;
}
30%{
  letter-spacing: 20px;
  margin-bottom: -20px;
}
85%{
  letter-spacing: 8px;
  margin-bottom: -5px;
}
.dotPos{
  top:100px;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="jaw">
      <span class="text1">Welcome in</span>
      <span class="text2">Djerba</span>
    </div>
    <img class="carte" src="carte.jpg">
    <!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="img1.jpg" style="width:100%">

  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="img2.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="img3.jpg" style="width:100%">
  </div>
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="img4.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- The dots/circles -->

<div style="text-align:center;position:relative;top:-154px;left:60px;">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
<a style="text-align:center;position:relative;top:-630px;left:500px;"href="logout.php">Logout</a>
</div>
<div style="width:290px;text-align:center;position:relative;top:-470px;left:1210px;border-style: groove;">


<h2 style="color:#B3C4D8;">Here is a list of hotels in Djerba:</h2>
<?php
$conn=mysqli_connect('localhost','root','','logindb');
if(!$conn){
	echo mysqli_connect_error();
}
 $q="SELECT * FROM hotel";
 $res=mysqli_query($conn,$q);
$hotels=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>

<?php foreach($hotels as $hotel){
  echo "{$hotel['hotelName']}---------->{$hotel['location']}---------->{$hotel['stars']} Stars";

    ?><br>
<?php }
?>
</div>
<h3 style="color:#B3C4D8;width:200px;text-align:center;position:relative;left:50px;top:-690px;border-style: groove;">If you know any Hotel Please add it from here to our Database.</h3>
<form style="width:200px;text-align:center;position:relative;left:50px;top:-700px;border-style: groove;"action="a.php"  class="form-group" method="post">
  <label for="nameh">Hotel Name:</label><br>
  <input type="text" id="nameh" name="nameh" value="Hotel name"><br>
  <label for="location">Location:</label><br>
  <input type="text" id="location" name="location" value="Location"><br><br>
	<label for="stars">Nulmber of Stars:</label><br>
  <input type="text" id="stars" name="stars" value="Number of Stars"><br>
  <input type="submit" value="Submit">
  <input type="reset">

</form>

<script type="text/javascript">
  var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
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
