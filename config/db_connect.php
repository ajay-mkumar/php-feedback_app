<?php

$conn=mysqli_connect('localhost','ajay','0911ajay@','feedback');
if(!$conn){
	echo "error:" . mysqli_connect_error();
}
?>