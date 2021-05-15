<?php
class Subscriber{

    public $subscriber;
    public $homeId;
    public $boilerType;
    public $airConditionerType;
    public $temperatures;
   
    function __construct($array) {
            $this->subscriber = $array["subscriber"];
            $this->homeId = $array["homeId"];
            $this->boilerType = $array["boilerType"];
            $this->airConditionerType = $array["airConditionerType"];
            $this->temperatures = $array["temperatures"];
    }

    public function get_sub() {
        return $this->subscriber;
    }
    public function get_home() {
        return $this->homeId;
    }
    public function get_boiler() {
        return $this->boilerType;
    }
    public function get_air() {
        return $this->airConditionerType;
    }
    public function get_temp() {
        return $this->temperatures;
    }
}


?>