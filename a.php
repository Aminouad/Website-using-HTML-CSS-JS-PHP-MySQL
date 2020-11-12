<?php
$conn=mysqli_connect('localhost','root','','logindb');
if(!$conn){
	echo mysqli_connect_error();
  }

$nameh=mysqli_real_escape_string($conn,$_POST['nameh']);
$location=mysqli_real_escape_string($conn,$_POST['location']);
$stars=mysqli_real_escape_string($conn,$_POST['stars']);

if ($stmt = mysqli_prepare($conn, "INSERT INTO hotel(hotelName, location,stars)VALUES(?,?,?)")) {
  mysqli_stmt_bind_param($stmt, 'sss', $nameh, $location, $stars);

}
if (!$stmt) {die('mysqli error: '.mysqli_error($conn));
  // code...
}

if(!mysqli_stmt_execute($stmt)){

die( 'stmt error: '.mysqli_stmt_error($stmt) );}
else {
  header("location: home.php");
}
?>
