<?php
    include('ChainMail/ChainMail.php');
    include('Dark_Armor/DarkArmor.php');
    include('Dragon_Blade/DragonBlade.php');
    include('Excalibur/Excalibur.php');
    include('Knight/Knight.php');
    include('Soldier/Soldier.php');

    function isBlock($num)
    {
        $flag = '';
        $random = rand(1,100);
        if($num >= $random)
        {
            $flag = true;
        }
        return $flag;
    }

    function isCrit($num)
    {
        $flag = "";
        $random = rand(1,100);
        if($num >= $random)
        {
            $flag = true;
        }
        return $flag;
    }

    function battle($unit_one, $unit_two)
    {
        $turn = 0;
        $health_two = $unit_two['health'];
        $health_one = $unit_one['health'];
        
        while ($health_two  >= 0 && $health_one >= 0 ) {

            $unit_one_tan_cong = $unit_one['dame'] - $unit_two['def'];
            $unit_two_tan_cong = $unit_two['dame'] - $unit_one  ['def'];

            $turn++;
            echo "<p style=color:lime> turn {$turn}  {$unit_one['name']} tan cong.<br> </p>";

            //check unit_two block, if block = true 
            if(isBlock($unit_two['block']) == true)
            {
                echo "     {$unit_one['name']} missing dame. <br>";
            }
            
            elseif(isCrit($unit_one['crit']) == true)
            {
                $unit_one_tan_cong = $unit_one_tan_cong * 2;
                $health_two -= $unit_one_tan_cong;
                echo "<p style=color:red style=fontsize:bold>   => crit: health of {$unit_two['name']} {$health_two}  <br></p>";
            } 

            else
            {
                echo "   -not crit: health of {$unit_two['name']} " . ($health_two -= $unit_one_tan_cong) . "<br>";
            }

            //when unit_two die
            if($health_two <= 0){
                echo "<p style=color:red>  {$unit_two['name']} lose !</p>";
                break;
            }

            $turn++;
            echo "<p style=color:blue> turn {$turn}  {$unit_one['name']} tan cong.<br> </p>";

            if(isBlock($unit_one['block']) == true)
            {
                echo "     {$unit_two['name']} missing dame. <br>";
            }

            elseif(isCrit($unit_two['crit']) == true)
            {
                $unit_two_tan_cong = $unit_two_tan_cong * 2;
                $health_one -= $unit_two_tan_cong;
                echo "   => crit: health of {$unit_one['name']} " . $health_one . "<br>";
            } else
            {
                echo "   -not crit: health of {$unit_one['name']} " . ($health_one -= $unit_two_tan_cong) . "<br>";
            }

            //when unit_one die
            if($health_one <= 0){
                echo "<p style=color:red>  {$unit_one['name']} lose !</p>";
                break;
            }
        }
    }

    $info_chainmail = array(
        'item_def'       => 20,
        'item_health'    => 10,
        'item_block'     => 10
        );

    $info_darkarmor = array(
        'item_def'       => 20,
        'item_health'    => 10,
        'item_block'     => 10
        );

    $info_dragonblade = array(
        'base_dame'   => 20,
        'base_crit'   => 10
        );

    $info_excalibur = array(
        'base_dame'    => 20,
        'base_crit'    => 10
        );

    $info_knight = array(
        'base_dame'   => 20,
        'base_def'    => 10,
        'base_health' => 200
        );

    $info_soldier = array(
        'base_dame'   => 20,
        'base_def'    => 10,
        'base_health' => 200
        );

    $chainmail = new ChainMail($info_chainmail);
    $chainmail_detail = $chainmail->getInfo();

    $darkarmor = new DarkArmor($info_darkarmor);
    $darkarmor_detail = $darkarmor->getInfo();

    $dragonblade = new DragonBlade($info_dragonblade);
    $dragonblade_detail = $dragonblade->getInfo();

    $excalibur = new Excalibur($info_excalibur);
    $excalibur_detail = $excalibur->getInfo();

    $knight = new Knight($info_knight);
    $knight_detail = $knight->getInfo();

    $soldier = new Soldier($info_soldier);
    $soldier_detail = $soldier->getInfo();


    //khoi tao thuoc tinh nhan vat sau khi trang bi item
    $knight_prop = array(
        'name' => 'Knight',
        'dame' => $dragonblade_detail['dragonblade_dame'] + $knight_detail['knight_dame'],
        'def' => $darkarmor_detail['darkarmor_def'] + $knight_detail['knight_def'],
        'health' => $darkarmor_detail['darkarmor_health'] + $knight_detail['knight_health'],
        'block' => $darkarmor_detail['darkarmor_block'],
        'crit' => $dragonblade_detail['dragonblade_crit'],
        );

    $soldier_prop = array(
        'name' => 'Soldier',
        'dame' => $excalibur_detail['excalibur_dame'] + $soldier_detail['soldier_dame'],
        'def' => $chainmail_detail['chainmail_def'] + $soldier_detail['soldier_def'],
        'health' => $chainmail_detail['chainmail_health'] + $soldier_detail['soldier_health'],
        'block' => $chainmail_detail['chainmail_block'],
        'crit' => $excalibur_detail['excalibur_crit'],
        );

    echo "<pre>";
    print_r($knight_prop);

    print_r($soldier_prop);

    $a = battle($knight_prop, $soldier_prop);

    