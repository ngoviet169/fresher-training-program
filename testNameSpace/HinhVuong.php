<?php
/**
 * Created by PhpStorm.
 * User: vietbeo
 * Date: 30/05/2017
 * Time: 10:08
 */

namespace HinhVuong;

class Shape
{
    public $canh;

    public function __construct($canh)
    {
        $this->canh = $canh;
    }

    public function getChuVi()
    {
        return 4 * $this->canh;
    }

    public function getDienTich()
    {
        return $this->canh * $this->canh;
    }

    public function getCanh()
    {
        return $this->canh;
    }
}