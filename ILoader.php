<?php 
    $strJsonFileContents = file_get_contents("src/subscribers.json");
    $array = json_decode($strJsonFileContents, true);
    $sub_array = array();
    for ($i=0; $i < count($array["subscribers"]); $i++) { 
        $obj = new Subscriber($array["subscribers"][$i]);
        array_push($sub_array,$obj);
        echo "</br>";
    }

?>