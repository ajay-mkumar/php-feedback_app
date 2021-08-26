<?php

$conn=mysqli_connect('remotemysql.com','cCkQ3QCarg','X9WYlPz4J6','cCkQ3QCarg');

//$conn=mysqli_connect('localhost','ajay','0911ajay','feedback');
if(!$conn){
	echo "error:" . mysqli_connect_error();
}
?>
