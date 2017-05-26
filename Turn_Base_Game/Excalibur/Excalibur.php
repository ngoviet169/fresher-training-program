<?php
    /**
    * 
    */
    class Excalibur
    {
        private $item_dame;
        private $item_crit;
         
        public function __construct($arr)
        {
            $this->item_dame   = $arr['base_dame'];
            $this->item_crit    = $arr['base_crit'];
        }

        public function getInfo()
        {
            return $arr = array(
                'excalibur_dame' => $this->item_dame,
                'excalibur_crit' => $this->item_crit
                );
        }
    }
    
    // $info = array(
    //     'base_dame'   => 20,
    //     'base_crit'    => 10
    //     );
    // $obj = new Excalibur($info);
    // echo "<pre>";
    // print_r($obj);