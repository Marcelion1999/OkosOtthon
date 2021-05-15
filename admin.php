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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="src/header.css" rel="stylesheet">
    <!-- CSS-->
</head>
<body>        

<div class="container">

  <div class="row">
    <div class="col">
                    <div class="card">
                        <div class="card-body" id="ide">
                            <h5 class="card-title"> Controller Interface</h5>
                            <p class="card-text"> 
                                <div id="controller"> 
                                  <?php  require("controller_interface.php"); ?>
                                <script src="https://write.corbpie.com/wp-content/litespeed/localres/cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                <script type="text/javascript">

                                    var intervalId = window.setInterval(function(){
                                      document.getElementById("controller").innerHTML+='<?php write_Data(); ?>' ;
                                    }, 5000);
                                   
                                </script>
                            </p>
                        </div>
                    </div>

    </div>
  </div>

</div>
    
</body>
</html>