<?php
    /**
    * 
    */
    class ChainMail
    {
        private $item_def;
        private $item_health;
        private $item_block;
         
        public function __construct($arr)
        {
            $this->item_def       = $arr['item_def'];
            $this->item_health    = $arr['item_health'];
            $this->item_block     = $arr['item_block'];
        }

        public function getInfo()
        {
            return $arr = array(
                'chainmail_def'    => $this->item_def,
                'chainmail_health' => $this->item_health,
                'chainmail_block'  => $this->item_block
                );
        }
    }
    
    // $info = array(
    //     'item_def'       => 20,
    //     'item_health'    => 10,
    //     'item_block'     => 10
    //     );
    // $obj = new ChainMail($info);
    // echo "<pre>";
    // print_r($obj);