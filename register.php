<?php 
 include("config/db_connect.php");

 if(isset($_POST['submit'])){
 	$username=mysqli_real_escape_string($conn,$_POST['username']);
 	$password=mysqli_real_escape_string($conn,$_POST['password']);

 	$password=password_hash($password, PASSWORD_DEFAULT);

 	$sql="INSERT INTO user(username,password) VALUES ('$username','$password')";

 	if(mysqli_query($conn,$sql)){
 		echo "success";
 	}else{
 		echo "error";
 	}
 }

?>



<!DOCTYPE html>
<html>
<head>
	<title>reg</title>
</head>
<body>
<form action="register.php" method="POST">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>
</body>
</html>