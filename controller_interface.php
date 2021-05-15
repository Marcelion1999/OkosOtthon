 <?php

 function write_Data()
 {
    $sub_array = array();
    require("subscriber.php");
    require("ILoader.php");
    require("monitor.php"); 
    $monitor_array = array();
    $value; $monitor_obj; $bojlerállapot; $klímaállapot; $elso;$masodik;
    $monitor_array = get_files($sub_array);
    get_monitor($sub_array, $monitor_array);

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
        switch ($sub_array[$i]->get_boiler()) {
            case "Boiler 1200W": $boiler_start = "bX3434"; $boiler_stop = "bX1232"; break;
            case "Boiler p5600": $boiler_start = "cX7898"; $boiler_stop = "cX3452";break;
            case "Boiler tw560": $boiler_start = "dX3422"; $boiler_stop = "dX111";break;
            case "Boiler 1400L": $boiler_start = "kx8417"; $boiler_stop = "kx4823";break;
            default:  $boiler_start = "SS2033"; $boiler_stop = "SS2034"; break;
        }
        switch ($sub_array[$i]->get_air()) {
            case "Air p5600": $air_start = "bX5676"; $air_stop = "bX3421"; break;
            case 'Air c3200': $air_start = "cX3452"; $air_stop = "cX5423"; break;
            case 'Air rk110': $air_start = "eX1111"; $air_stop = "eX2222"; break;
            default: $air_start = "SanyiAMacska"; $air_stop = "ElegemVan"; break;
        }
        
        echo "Jelentés -> <b>" .  $monitor->get_ID() . "</b><- ". date("h:i:s") . " for:&nbsp;  " .  $sub_array[$i]->get_home() ." <br> ";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Bojler: ". $sub_array[$i]->get_boiler() ." állapota: " . $bojlerállapot . "<br>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Klíma : ". $sub_array[$i]->get_air() ." állapota: " . $klímaállapot  . "<br>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Jelenlegi hőmérséklet: " . $monitor->get_temp() . "°C <br>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;Elérni kívánt hőmérséklet <br>";
         for ($j=0; $j < count($periods) ; $j++) { 

            list($elso, $masodik ) = explode("-", $sub_array[$i]->get_temp()[$j]["period"]); 
            $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $cur_hour = (int)date('H');
            $bojler_bool = false;
            $klima_bool = false;
            $send_url = 'http://193.6.19.58:8182/smarthome/' . $sub_array[$i]->get_home();
            //var_dump($cur_hour);
            if ($elso <= $cur_hour &&  $cur_hour <= $masodik) 
            {
                echo "<b>" . $tab . $elso . " - " . $masodik . "-> " . $sub_array[$i]->get_temp()[$j]["temperature"] . "°C </b> <br>";

                echo "<b> <i>";
                if ( $monitor->get_temp() ==  $sub_array[$i]->get_temp()[$j]["temperature"]) {
                    echo "A hőmérséklet megfelelő <br>";
                    if ($monitor_array[$i]->get_boiler() == true) {

                        echo "Bojlert ki kell kapcsolni <br>"; $bojler_bool = false;
                    }
                    if ($monitor_array[$i]->get_air() == true)
                    {
                        echo "Klímát ki kell kapcsolni <br>"; $klima_bool = false;
                    }
                    fiszfasz($send_url, $bojler_bool, $klima_bool, $sub_array[$i]);
                }
                elseif ((int)$sub_array[$i]->get_temp()[$j]["temperature"] >=  (int)$monitor->get_temp()) {
                    echo "Fűteni kell <br> Bojlert be kell kapcsolni <br> Klímát ki kell kapcsolni <br>";
                    $bojler_bool = true; 
                    $klima_bool = false;
                    fiszfasz($send_url, $bojler_bool, $klima_bool, $sub_array[$i]); echo "Bojlert true és klíma false";
                }
                elseif((int)$sub_array[$i]->get_temp()[$j]["temperature"] <  (int)$monitor->get_temp())
                {
                    echo "Hűteni kell <br> Bojlert ki kell kapcsolni <br> Klímát be kell kapcsolni <br>"; $bojler_bool = false; $klima_bool = true;
                    fiszfasz($send_url, $bojler_bool, $klima_bool, $sub_array[$i]); echo "Bojlert false és klíma true";
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

 function fiszfasz($url, $bojler, $klima, $cur_user)
    {
        switch ($cur_user->get_boiler()) {
            case "Boiler 1200W": $boiler_start = "bX3434"; $boiler_stop = "bX1232"; break;
            case "Boiler p5600": $boiler_start = "cX7898"; $boiler_stop = "cX3452";break;
            case "Boiler tw560": $boiler_start = "dX3422"; $boiler_stop = "dX111";break;
            case "Boiler 1400L": $boiler_start = "kx8417"; $boiler_stop = "kx4823";break;
            default:  $boiler_start = "SS2033"; $boiler_stop = "SS2034"; break;
        }
        switch ($cur_user->get_air()) {
            case "Air p5600": $air_start = "bX5676"; $air_stop = "bX3421"; break;
            case 'Air c3200': $air_start = "cX3452"; $air_stop = "cX5423"; break;
            case 'Air rk110': $air_start = "eX1111"; $air_stop = "eX2222"; break;
            default: $air_start = "SanyiAMacska"; $air_stop = "ElegemVan"; break;
        }
        if ($bojler) {
            if ($klima)
            { // bojler és klíma kapcsolás fel
                send_Json($url, $boiler_start, $air_start, $cur_user);
            }
            else
            {//bojler igen, air nem
                send_Json($url, $boiler_start, $air_stop, $cur_user);
            }
        }
        else{
            if ($klima)
            { //bojler nem, air igen
                send_Json($url, $boiler_stop, $air_start, $cur_user);
            }
            else //ULTIMA ELSE ÁG
            { // bojler se, air se
                send_Json($url, $boiler_stop, $air_stop, $cur_user);
            }
        }


    }


    function send_Json($url, $bojler, $klima, $cur_user)
    {
            echo $cur_user->get_home() . "<br>";
            echo $bojler . "<br>";
            echo  $klima . "<br>";
            $data = array('homeId' => $cur_user->get_home(), 'boilerCommand' => $bojler , 'airConditionerCommand' => $klima);
            $options = array(
                    'http' => array(
                    'header'  => "Content-type: text/Plain\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                )
            );
            //echo $options["content"];
        $context  = stream_context_create($options);
       // print_r($options);
        $result = file_get_contents($url, true, $context);
        if ($result == 100) {
            echo "Visszakapott kód: " . $result . " -  Sikeresen végrehajtva";
        }
        if ($result == 101) {
            echo "Visszakapott kód: " . $result . " -  Hibás parancs";
        }
        if ($result == 102) {
            echo "Visszakapott kód: " . $result . " -  Nem létezik ilyen eszköz";
        }
       
    }
      
  ?>