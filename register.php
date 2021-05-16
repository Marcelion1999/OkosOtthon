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
        <form action="" method="POST"> 
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


            <select class="form-select" name="bojler" aria-label="Default select example" required>
                <option selected disabled>Bojler típus</option>
                <option value="Boiler 1200W">Boiler 1200W</option>
                <option value="Boiler p5600">Boiler p5600</option>
                <option value="Boiler tw560">Boiler tw560</option>
                <option value="Boiler 1400L">Boiler 1400L</option>
            </select>

            <select class="form-select" name="air" aria-label="Default select example" required>
                <option selected disabled>Klíma típus</option>
                <option value="Air p5600">Air p5600</option>
                <option value="Air c3200">Air c3200</option>
                <option value="Air rk110">Air rk110</option>
            </select>

            <p>
				Already have an account ?  <a href="index.php">Login</a>
			</p>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="reg_user">Register</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 All Rights Reserved to XYZ Company</p>
            <?php 
                if (isset($_POST['reg_user'])) 
                { 
                    $data = array(  'subscriber' => $_POST["username"], 'homeId' => uniqid() , 'email' => $_POST["email"],
                                    'password' => $_POST["password"], 'boilerType' => $_POST["bojler"], 'airConditonerType' => $_POST["air"]);

                    $json=file_get_contents('user.json');
                    $temp = json_decode($json,true); 
                    $temp['subscriber'] = $data;
                    $json = json_encode($temp);
                    file_put_contents($json,true);
/*
                    $fp = fopen('user.json', 'a');
                    fwrite($fp, json_encode($data));
                    fclose($fp);
                    header('location: home.php');
                    /**"subscriber": "John Smith",
        "homeId": "KD34AF24DS",
        "boilerType": "Boiler 1200W",
        "airConditionerType": "Air p5600", */

                }
        ?>
           

					</div>
    </main>



    <!-- DO NOT DELETE -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- DO NOT DELETE -->
</body>
</html>