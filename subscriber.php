<?php
class Subscriber{

    public $subscriber;
    public $homeId;
    public $boilerType;
    public $airConditionerType;
    public $temperatures;
   
    function __construct($array) {
        //var_dump($array);
            $this->subscriber = $array["subscriber"];
            $this->homeId = $array["homeId"];
            $this->boilerType = $array["boilerType"];
            $this->airConditionerType = $array["airConditionerType"];
            $this->temperatures = $array["temperatures"];
    }

    function get_sub() {
        return $this->subscriber;
    }
}


?>