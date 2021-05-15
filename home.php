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
    <title>Home Page</title>

    <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="src/header.css" rel="stylesheet">
    <!-- CSS-->
</head>
<body>



    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Főoldal</a></li>
                <li><a href="#" class="nav-link px-2 text-white disable">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white disable">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white disable">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white disable">About</a></li>
                </ul>

                <div class="text-end">
                
                <button type="button" class="btn btn-warning">Kijelentkezés</button>
                </div>
            </div>
        </div>
    </header>


  

  <div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom"> Üdv: <?php echo $_SESSION["subscriber"]; ?></h2>

        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Bojler</h5>
                    <p class="card-text"> Típus: <?php echo $_SESSION['boilerType']; ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div><!-- Col-->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Klíma</h5>
                    <p class="card-text">Típus: <?php echo $_SESSION['airConditionerType']; ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div><!-- Col-->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Legutóbbi hőmérsékletek:</h5>
                    <p class="card-text">
                        <?php 
                        
                            for ($i=0; $i < count($_SESSION['temperature']); $i++) 
                            {
                                echo "<b>Period:</b> " .  $_SESSION['temperature'][$i]["period"] ."</br>"; 
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;Temperature: " .  $_SESSION['temperature'][$i]["temperature"] ."C </br>";
                            }
                        
                        ?> 
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div> <!-- Col-->
        </div> <!-- Row -->

    </div> <!-- Container -->

    <!-- DO NOT DELETE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- DO NOT DELETE -->

</body>
</html>