<?php
/**
 * Created by PhpStorm.
 * User: vietbeo
 * Date: 30/05/2017
 * Time: 10:38
 */
class SoDienThoai
{
    public $sdt;

    public function __construct($sdt)
    {
        $this->sdt =$sdt;
    }

    public function getSDT()
    {
        return $this->sdt;
    }

    public function checkHopLe()
    {
        //kiem tra xem nhap vao sdt co khoang trang khong.
        if(strpos($this->sdt, ' ') != false)
        {
            throw new Exception("So dien thoai khong duoc co khoang trang");
        }

        //kiem tra xem sdt co phai la so khong.
        if(!preg_match("/^[0-9]+$/", $this->sdt))
        {
            throw  new Exception("So dien thoai phai la so");
        }

        $str2 = substr($this->sdt, 0 , 2); //kiem tra xem dau so la 09 hay 01

        $str3 = '';
        $arr = array('098', '097', '096',
            '0169', '0168', '0167', '0166', '0165',
            '0164', '0163', '0162', '091', '094',
            '0123', '0124', '0125', '0127', '0129',
            '090', '093', '0120', '0121', '0122', '0126', '0128');

        if($str2 == '09')
        {
            $str3 = substr($this->sdt, 0, 3); //neu la dau so 09 thi lay 3 so

        }

        if($str2 == '01')
        {
            $str3 = substr($this->sdt, 0, 4); //neu la dau so 01 thi lay 4 so

        }

        //kiem tra xem dau so dien thoai co hop le khong.
        if(in_array($str3, $arr) == false)
        {
            throw new Exception("So dien thoai khong nam trong cac dau so da cho.");

        }

        //kiem tra xem so dien thoai co qua dai khong.
        if(strlen($this->sdt) > 11 || strlen($this->sdt) < 10)
        {
            throw new Exception("so dien thoai khong duoc lon hon 11 so hoac nho hon 10 so");
        }
        echo 'so dien thoai hop le.';
    }
}