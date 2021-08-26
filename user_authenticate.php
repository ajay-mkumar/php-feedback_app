<?php
 include('config/db_connect.php');
$username=$password=$errors='';
 if(isset($_POST['submit'])){
 	session_start();
 	$username=mysqli_real_escape_string($conn,$_POST['username']);
 	$password=mysqli_real_escape_string($conn,$_POST['password']);
    $_SESSION['name']= $_POST['username'];
       

 	$sql="SELECT * FROM user WHERE username='$username'";

 	$result=mysqli_query($conn,$sql);
 	$count  = mysqli_num_rows($result);
 	$_SESSION['count']=$count;
 	
 	if($count>0){
 		$row = mysqli_fetch_array($result);
         $encrypted_password= $row["password"];
         $verify=password_verify($password, $encrypted_password);
         
         

 	          if($verify)  
                     {  
 		              header('location:home.php');
 		          }else{
 	                
 		             $errors='invalid password';
 		
 	}

}else{
	$errors="user doesn't exist";
}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	   <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: lightpink;
    }


    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>
<body>
	
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 82px 48px 0px 48px; margin: 82px 48px 0px 288px; border: 1px solid #EEE;">

	<div class="row">
	<form  class="col s12" action="user_authenticate.php" method="POST">
		<div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
		<input class="validate" type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
	</div>
</div> <div class='row'>
              <div class='input-field col s12'>
		<input  class="validate" type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
	</div>
	   <br />
            <center>
              <div class='row'>
                <button type='submit' name='submit' class='col s12 btn btn-large waves-effect pink'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
		

		<P><?php echo $errors; ?></P>
	</div>
</div>
	</form>
</div>
</div>
</body>
</html>