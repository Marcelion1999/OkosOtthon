<?php 
  session_start(); 

  if (!isset($_SESSION['subscriber'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['subscriber']);
  	header("location: index.php");
  }
  //$_SESSION["subscriber"] = NULL;
  //$_SESSION["uid"] = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    
    <?php 
     
     var_dump($_SESSION);
    
    ?>
</body>
</html>