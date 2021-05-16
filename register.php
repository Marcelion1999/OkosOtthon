<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="src/style.css" rel="stylesheet">
    <!-- CSS-->
    <title>Okosotthon</title>
</head>
<body class="text-center">
<?php 
session_start();
$sub_array;
require("subscriber.php");
require("ILoader.php");
?>

    <main class="form-signin">
        <form action="server.php" method="POST"> 
        <h1 class="h3 mb-3 font-weight-normal">Regisztráció</h1>		
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="John Smith" name="username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="johnsmith@johnsmith.com" name="email" required>
                <label for="floatingInput">E-mail addres</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password" required>
                <label for="floatingInput">Password</label>
            </div>	
            <p>
				Already have an account ?  <a href="index.php">Login</a>
			</p>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="reg_user">Register</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 All Rights Reserved to XYZ Company</p>
            <?php 
                if (isset($_POST['reg_user'])) 
                {
                    $_SESSION['subscriber'] = $sub_array[$i]->get_sub();
                    $_SESSION['homeId'] = $sub_array[$i]->get_home();
                    $_SESSION['boilerType'] = $sub_array[$i]->get_boiler();
                    $_SESSION['airConditionerType'] = $sub_array[$i]->get_air();
                    $_SESSION['temperature'] = $sub_array[$i]->get_temp();
                    $_SESSION['admin'] = $sub_array;
                    header('location: home.php');
                    //var_dump($_POST["email"], $_POST["password"]);
                }
        ?>
           

					</div>
    </main>



    <!-- DO NOT DELETE -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- DO NOT DELETE -->
</body>
</html>