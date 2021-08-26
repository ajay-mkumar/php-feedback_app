<?php   
  
  
include('config/db_connect.php');
if (isset($_POST['delete'])){
	$id_to_del=mysqli_real_escape_string($conn,$_POST['id_to_del']);

	$sql="DELETE FROM detail WHERE id=$id_to_del";

	if(mysqli_query($conn,$sql)){
		header('location:home.php');
	}
	else{
		"error occured:" .mysqli_error();
	}
}


$sql="SELECT * FROM detail";

$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>




<html>  
<?php include('templates/header.php'); 
 $count=$_SESSION['count']; ?>
<?php if($count!=0): ?>
    
    
<?php foreach($details as $detail): ?>
      <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo "username:" .$detail['username']; ?></span>
    	
    	<p><?php echo "feedback:" .$detail['feedback']; ?></p>
    </div>
    <div class="card-action">
    	<form action="home.php" method="POST">
    		<input type="hidden" name="id_to_del" value="<?php echo $detail['id']; ?>">
    		<button class="btn waves-effect waves-red" type="submit" name="delete" value="Delete">
    			  <i class="large material-icons">delete</i>
    	</form>
    	
    </div>
</div>
</div>
</div>

    
<?php endforeach; ?>
    <?php include('templates/footer.php'); ?>

   <?php else: ?>
   	<?php include('user_authenticate.php'); ?>
   	<?php endif; ?>