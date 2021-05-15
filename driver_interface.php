<?php 
    function send_Data($url, $bojler, $klima, $cur_user)
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
            $myvars = 'homeId=' . $cur_user->get_homeId() . '&boilerCommand=' . $bojler . '&airConditionerCommand=' . $klima;

            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec( $ch );
            var_dump($response);
        }
?> 

