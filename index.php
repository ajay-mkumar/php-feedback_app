<?php 
 include('config/db_connect.php');
 $username=$feedback=$message='';
 $errors=array('username'=>'','feedback'=>'');
if(isset($_POST['submit'])){
	if(empty($_POST['username'])){
		$errors['username']='username is required';
	}else{
		$username=$_POST['username'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
			$errors['username']='username must contain letters only';
		}
	}
	if(empty($_POST['feedback'])){
		$errors['feedback']='feedback is required';
	}

if(array_filter($errors)){

}else{
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$feedback=mysqli_real_escape_string($conn,$_POST['feedback']);

	$sql="INSERT INTO details(username,feedback) VALUES ('$username','$feedback')";

	if(mysqli_query($conn,$sql)){
		$message='your feedback is successfully taken';
			}else{
		echo "error:" . mysqli_error($conn);
	}
}

}

?>

<html>
  <?php include('templates/header.php');  ?>
     <div class="row">
     <form class="col s12" action="index.php" method="POST">
        <div class="row">
          <div class="input-field col s6">
            <input id="input_text" name="username" value="<?php echo htmlspecialchars($username) ?>" type="text" data-length="10">
            <label for="input_text">Username</label>
            <div class="red-text"><?php echo $errors['username']; ?></div>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" name="feedback" value="<?php echo htmlspecialchars($feedback) ?>"class="materialize-textarea" data-length="120"></textarea>
            <label for="textarea2">Feedback</label>
            <div class="red-text"><?php echo $errors['feedback']; ?></div>
            <button class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
            <p><?php echo $message; ?></p>
          </div>
        </div>
      </form>
    </div>
          

<?php include('templates/footer.php'); ?>

