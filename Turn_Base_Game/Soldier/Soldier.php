<?php
    /**
    * 
    */
    class Soldier
    {
        private $base_dame;
        private $base_def;
        private $base_health;
         
        public function __construct($arr)
        {
            $this->base_dame   = $arr['base_dame'];
            $this->base_def    = $arr['base_def'];
            $this->base_health = $arr['base_health'];
        }

        public function getInfo()
        {
            return $arr = array(
                'soldier_dame'   =>$this->base_dame,
                'soldier_def'    =>$this->base_def,
                'soldier_health' =>$this->base_health
                );
        }
    }
    
    // $info = array(
    //     'base_dame'   => 20,
    //     'base_def'    => 10,
    //     'base_health' => 200
    //     );
    // $obj = new Soldier($info);

    // print_r($obj);