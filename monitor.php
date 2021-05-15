<?php
class Monitor{
//{"sessionId":"I0W2O","temperature":21.0,"boilerState":true,"airConditionerState":true}
    public $sessionId;
    public $temperature;
    public $boilerState;
    public $airConditionerState;
   
    function __construct($JSON) {
            $array = json_decode($JSON, true);

            $this->sessionId = $array["sessionId"];
            $this->temperature = $array["temperature"];
            $this->boilerState = $array["boilerState"];
            $this->airConditionerState= $array["airConditionerState"];

    }
    public function get_ID() {
        return $this->sessionId;
    }
    public function get_temp() {
        return $this->temperature;
    }
    public function get_boiler() {
        return $this->boilerState;
    }
    public function get_air() {
        return $this->airConditionerState;
    }

}


?>