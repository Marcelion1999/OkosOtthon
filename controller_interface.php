 <?php

 function write_Data()
 {
    $sub_array = array();
    require("subscriber.php");
    require("ILoader.php");
    require("monitor.php"); 
    $monitor_array = array();
    $value; $monitor_obj; $bojlerállapot; $klímaállapot;
    $monitor_array = get_files($sub_array);
    get_monitor($sub_array, $monitor_array);
    $elso;$masodik;
 }
function get_files($sub_array)
{
    for ($i=0; $i < count($sub_array); $i++)
    { 
        $url = 'http://193.6.19.58:8182/smarthome/' . $sub_array[$i]->get_home();
        $json = file_get_contents($url);
       
        $monitor_objektum = new Monitor($json);
        $monitor_array[$i] = $monitor_objektum;
    }   
    return $monitor_array;
}
 function get_monitor($sub_array, $monitor_array)
 {
  
     for ($i=0; $i < count($sub_array); $i++)
     {
         $monitor = $monitor_array[$i];
         if ($monitor_array[$i]->get_boiler() == true) { $bojlerállapot = "Bekapcsolva";}
            else{$bojlerállapot = "Kikapcsolva";}
         if ($monitor_array[$i]->get_air() == true) { $klímaállapot = "Bekapcsolva";}
            else{ $klímaállapot = "Kikapcsolva";}
        $periods = array();
        $periods =  $sub_array[$i]->get_temp() ;
        
        echo "Jelentés -> <b>" .  $monitor->get_ID() . "</b><- ". date("h:i:s") . " for:&nbsp;  " .  $sub_array[$i]->get_home() ." <br> ";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Bojler állapot: " . $bojlerállapot . "<br>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Klíma állapot: " . $klímaállapot  . "<br>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Jelenlegi hőmérséklet: " . $monitor->get_temp() . "°C <br>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Elérni kívánt hőmérséklet <br>";
         for ($j=0; $j < count($periods) ; $j++) { 

            list($elso, $masodik ) = explode("-", $sub_array[$i]->get_temp()[$j]["period"]); 
            $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $cur_hour = (int)date('H');
            //var_dump($cur_hour);
            if ($elso <= $cur_hour &&  $cur_hour <= $masodik) 
            {
                echo "<b>" . $tab . $elso . " - " . $masodik . "-> " . $sub_array[$i]->get_temp()[$j]["temperature"] . "°C </b> <br>";
                /*$beállított = $sub_array[$i]->get_temp()[$j]["temperature"];
                $jelenlegi =$monitor->get_temp() ;*/
                echo "<b> <i>";
                if ( $monitor->get_temp() ==  $sub_array[$i]->get_temp()[$j]["temperature"]) {
                    echo "A hőmérséklet megfelelő <br>";
                    if ($monitor_array[$i]->get_boiler() == true) {
                        echo "Bojlert ki kell kapcsolni <br>";
                    }
                    if ($monitor_array[$i]->get_air() == true)
                    {
                        echo "Klímát ki kell kapcsolni <br>";
                    }

                }
                elseif ((int)$sub_array[$i]->get_temp()[$j]["temperature"] >=  (int)$monitor->get_temp()) {
                    echo "Fűteni kell <br>";
                }
                elseif((int)$sub_array[$i]->get_temp()[$j]["temperature"] <  (int)$monitor->get_temp())
                {
                    echo "Hűteni kell <br>";
                }
                echo "</b> </i> <br>";
            }
            else
            {
                echo  $tab . $elso . " - " . $masodik .  "-> " . $sub_array[$i]->get_temp()[$j]["temperature"] . "°C <br>";
            }
           
         }
         echo "<br>";
        
     } 
     for ($i=0; $i < count($sub_array); $i++)
     {
        $monitor = $monitor_array[$i];
        //$periods = $sub_array[$i]->get_temp();
     }
 }
      
  ?>