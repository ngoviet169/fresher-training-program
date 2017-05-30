<?php
/**
 * Created by PhpStorm.
 * User: vietbeo
 * Date: 30/05/2017
 * Time: 10:06
 */
namespace HinhTron;

class Shape
{
    public $bankinh;
    const PI = 3.14;

    public function __construct($bankinh)
    {
        $this->bankinh = $bankinh;
    }

    public function getBanKinh()
    {
        return $this->bankinh;
    }

    public function getChuVi()
    {
        return 2 * self::PI * $this->bankinh;
    }

    public function getDienTich()
    {
        return self::PI * ($this->bankinh * $this->bankinh);
    }

    public function getDuongKinh()
    {
        return 2 * $this->bankinh;
    }
}