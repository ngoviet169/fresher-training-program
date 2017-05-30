<?php
/**
 * Created by PhpStorm.
 * User: vietbeo
 * Date: 30/05/2017
 * Time: 10:07
 */

namespace HinhChuNhat;

class Shape
{
    public $chieudai;
    public $chieurong;

    public function __construct($chieudai, $chieurong)
    {
        $this->chieudai = $chieudai;
        $this->chieurong = $chieurong;
    }

    public function getChuVi()
    {
        return 2 * ($this->chieurong + $this->chieudai);
    }

    public function getDienTich()
    {
        return $this->chieudai * $this->chieurong;
    }

    public function getChieuDai()
    {
        return $this->chieudai;
    }

    public function getChieuRong()
    {
        return $this->chieurong;
    }
}