<?php 
 $name=$count='';
 session_start();
 $name=$_SESSION['name'];
 $count=$_SESSION['count'];
?>

<html>
<head>
	<title>Feedback</title>
	 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <script>
        $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  </script>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Feed back</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul  class="right hide-on-med-and-down">
      
      	
      	
      <?php
	if ($count!=0): ?>
			<li>Hello <?php echo $name; ?></li>
      		<li><a href="logout.php">logout</a></li>
      		<?php else:?>
      			<li><a href="user_authenticate.php">Admin</a></li>
      		<?php endif; ?>
      </ul>
  
  </div>
</nav>



<ul class="sidenav" id="mobile-demo">
   <?php
  if ($count!=0): ?>
      <li>Hello <?php echo $name; ?></li>
          <li><a href="logout.php">logout</a></li>
          <?php else:?>
            <li><a href="user_authenticate.php">Admin</a></li>
          <?php endif; ?>
      </ul>
  
<script type="text/javascript" src="js/materialize.min.js"></script>

    