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

        public $viettel = array(
                '098', '097', '096', '0169', '0168', '0167', '0166', '0165', '0164', '0163', '0162'
            );
        public $vinaphone = array(
                '091', '094', '0123', '0124', '0125', '0127', '0129'
            );
        public $mobiphone = array(
                '090', '093', '0120', '0121', '0122', '0126', '0128'
            );

        const Nam_HIEN_TAI = 2017;

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
            foreach ($this->fresherPhp as $key => $value) {
                $phone_number[] = substr($value['phone_number'], 0, 4);
            }
            return $phone_number;
        }
    }

$fresher = new FresherPhp();
$result = $fresher->__construct();
echo '<pre>';
var_dump($result);
$after_convert = $fresher->getFullName();
echo $after_convert[0] . '<br>';
$namsinh = $fresher->tinhTuoi();
var_dump($namsinh[0]) . '<br>';
$tenNhaMang = $fresher->getTenNhaMang();
echo $tenNhaMang[0];