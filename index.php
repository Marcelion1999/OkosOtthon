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
$sub_array;
require("subscriber.php");
require("ILoader.php");
?>

    <main class="form-signin">
        <form action="" method="POST">
            <img class="mb-4" src="https://static.thenounproject.com/png/2508990-200.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">

            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="log_user">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 All Rights Reserved to XYZ Company</p>
        </form>
        <?php 
            if (isset($_POST['log_user'])) {
                echo "ASD"; 
                //var_dump($_POST["email"], $_POST["password"]);
                //var_dump($sub_array);
            }
        ?>
    </main>



    <!-- DO NOT DELETE -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- DO NOT DELETE -->
</body>
</html>