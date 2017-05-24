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
                'birth_day' => '16-09-199',
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
        //co the dung ham date('Y') de thay the

        //ham constructor
        public function __construct()
        {
            return $this->fresherPhp[0];
        }

        //ham lay fullnam cua hoc vien
        public function getFullName()
        {

            //vong lap su dung ham tim va xoa khoang trang
            // su dung ham viet hoa ky tu dau tien
            // sau do noi cac chuoi voi nhau
            foreach ($this->fresherPhp as $key => $value) {
                $full_name[] = ucfirst(str_replace(' ', '', $value['first_name'])) . ' ' . 
                ucfirst(str_replace(' ', '', $value['last_name'])) . ' ' .
                ucfirst(str_replace(' ', '', $value['middle_name']))
                ;
            }
            return $full_name;
        }

        //ham tinh tuoi
        public function tinhTuoi()
        {

            foreach ($this->fresherPhp as $key => $value) {
                $tuoi[] = self::Nam_HIEN_TAI - (int)substr($value['birth_day'], -4, 4);
            }
            return $tuoi;
        }

        //ham lay ten nha mang
        public function getTenNhaMang()
        {
            $newArray = array(); //tao 1 mang moi va check nha mang cua tung nguoi roi luu vao mang nay
            foreach ($this->fresherPhp as $key => $value) {
                $dauso = substr($value['phone_number'], 0, 3);
                $is_Viettel = in_array($dauso, array('016', '098', '097', '096'));
                $is_VinaPhone = in_array($dauso, array('091', '094'));
                $is_MobiPhone = in_array($dauso, array('090', '093', '012'));
                if($is_Viettel)
                {
                    array_push($newArray, 'Viettel');
                }
                if($is_MobiPhone)
                {
                    array_push($newArray, 'Mobiphone');
                }
                if($is_VinaPhone)
                {
                    array_push($newArray, 'Vinaphone');
                }
            }
            return $newArray;
        }
    }

$fresher = new FresherPhp();

$result = $fresher->__construct();

$choose = 1; //chon nguoi muon hien thi

echo '<pre>';

var_dump($result);

$after_convert = $fresher->getFullName();

echo $after_convert[$choose] . '<br>';

$namsinh = $fresher->tinhTuoi();

var_dump($namsinh[$choose]) . '<br>';

$tenNhaMang = $fresher->getTenNhaMang();

print_r($tenNhaMang[$choose]);
