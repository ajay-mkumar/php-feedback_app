<?php
 include('config/db_connect.php');
$username=$password=$errors='';
 if(isset($_POST['submit'])){
 	
 	$username=mysqli_real_escape_string($conn,$_POST['username']);
 	$password=mysqli_real_escape_string($conn,$_POST['password']);
    
    
 	$password = password_hash($password, PASSWORD_DEFAULT); 
    

 	$sql="INSERT INTO users(username, password) VALUES('$username', '$password')";

 	$result=mysqli_query($conn,$sql);

 	if($result){
 		echo "register us done";
 	}else {
 		$errors='error';
 	}
 }
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
		<input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
		<input type="submit" name="submit" value="login">
		<P><?php echo $errors; ?></P>
	</form>

</body>
</html>