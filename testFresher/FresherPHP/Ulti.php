<?php
    /**
    * 
    */

    class FresherPhp
    {

        public $fresherPhp = array([
                'first_name' => 'v i e t',
                'last_name' => 'ngo',
                'middle_name' => 'xuan',
                'birth_day' => '16-09-1993',
                'phone_number' => '0989850441',
            ],[
                'first_name' => 'thuyet',
                'last_name' => 'nguyen',
                'middle_name' => 'van',
                'birth_day' => '16-09-1994',
                'phone_number' => '0169850441',
            ],[
                'first_name' => 'dung',
                'last_name' => 'nguyen',
                'middle_name' => 'cong',
                'birth_day' => '16-09-1995',
                'phone_number' => '091850441',
            ],[
                'first_name' => 'bang',
                'last_name' => 'tu',
                'middle_name' => 'tu',
                'birth_day' => '16-09-1996',
                'phone_number' => '090850441',
            ],[
                'first_name' => 'chung',
                'last_name' => 'phung',
                'middle_name' => 'van',
                'birth_day' => '16-09-1997',
                'phone_number' => '0128850441',
            ],[
                'first_name' => 'hai',
                'last_name' => 'do',
                'middle_name' => 'minh',
                'birth_day' => '16-09-1998',
                'phone_number' => '0125850441',
            ],[
                'first_name' => 'thang',
                'last_name' => 'luong',
                'middle_name' => 'dinh',
                'birth_day' => '16-09-1990',
                'phone_number' => '0163850441',
            ]
            );

        const Nam_HIEN_TAI = 2017;

        //ham constructor
        public function __construct()
        {
            return $this->fresherPhp;
        }

       
        public function timMax()
        {

            foreach ($this->fresherPhp as $key => $value) {
                $tuoi[] = self::Nam_HIEN_TAI - (int)substr($value['birth_day'], -4, 4);
            }
            $max = $tuoi[0];
            //echo $tuoi[0];
            for($i = 0; $i < count($tuoi); $i++)
            {
                if($max < $tuoi[$i])
                {
                    $max = $tuoi[$i];
                    // var_dump($max);
                }
            }
            return $max;
        }

        public function timMin()
        {

            foreach ($this->fresherPhp as $key => $value) {
                $tuoi[] = self::Nam_HIEN_TAI - (int)substr($value['birth_day'], -4, 4);
            }
            $min = $tuoi[0];
            for($i = 0; $i < count($tuoi); $i++)
            {
                if($min > $tuoi[$i])
                {
                    $min = $tuoi[$i];
                    // echo $min . "<br>";
                }
            }
            return $min;
        }

        public function phan_loai_hoc_vien_theo_sdt()
        {
            $phanloai['Viettel'] = 0;
            $phanloai['Mobiphone'] = 0;
            $phanloai['Vinaphone'] = 0;
            foreach ($this->fresherPhp as $key => $value) {
                $dauso = substr($value['phone_number'], 0, 3);
                $is_Viettel = in_array($dauso, array('016', '098', '097', '096'));
                $is_VinaPhone = in_array($dauso, array('091', '094'));
                $is_MobiPhone = in_array($dauso, array('090', '093', '012'));
                if($is_Viettel)
                {
                    $phanloai['Viettel'] = $phanloai['Viettel'] + 1;
                }
                if($is_MobiPhone)
                {
                    $phanloai['Mobiphone'] = $phanloai['Mobiphone'] + 1;
                }
                if($is_VinaPhone)
                {
                    $phanloai['Vinaphone'] = $phanloai['Vinaphone'] + 1;
                }
            }
            return $phanloai;
        }

    }

$fresher = new FresherPhp();
$result = $fresher->__construct();
echo '<pre>';
// var_dump($result);
$min = $fresher->timMin();
echo 'min: ' . $min . '<br>';
$max = $fresher->timMax();
echo 'max: ' . $max . "<br>";
$phanloai = $fresher->phan_loai_hoc_vien_theo_sdt();
print_r($phanloai);