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
                                <?php 
                                    $sub_array = array();
                                    require("subscriber.php");
                                    require("ILoader.php");
                                    require("monitor.php"); 
                                    $monitor_array = array();
                                    get_monitor($sub_array);
                                    $value; $monitor_obj; $bojlerállapot; $klímaállapot;
                                    function get_monitor($sub_array)
                                    {
                                        for ($i=0; $i < count($sub_array); $i++)
                                        { 
                                            $url = 'http://193.6.19.58:8182/smarthome/' . $sub_array[$i]->get_home();
                                            $json = file_get_contents($url);
                                            $monitor_objektum = new Monitor($json);
                                            $monitor_array[$i] = $monitor_objektum;
                                        }   
                                        for ($i=0; $i < count($sub_array); $i++)
                                        {
                                            $monitor = $monitor_array[$i];
                                            if ($monitor_array[$i]->get_boiler() == true) { $bojlerállapot = "Bekapcsolva";}
                                            else{$bojlerállapot = "Kikapcsolva";}
                                            if ($monitor_array[$i]->get_air() == true) { $klímaállapot = "Bekapcsolva";}
                                            else{ $klímaállapot = "Kikapcsolva";}
                                            echo "Jelentés -> <b>" .  $monitor->get_ID() . "</b><- ". date("h:i:s") . "<br>";
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;Bojler állapot: " . $bojlerállapot . "<br>";
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;Klíma állapot: " . $klímaállapot  . "<br>";
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;Hőmérséklet: " . $monitor->get_temp() . "°C <br>" ;
                                        } 
                                    }
                                    
                                ?>
                                </div>
                            </p>
                        </div>
                    </div>

    </div>
  </div>

</div>
    
</body>
</html>