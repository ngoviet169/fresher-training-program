<?php
/**
 * Created by PhpStorm.
 * User: vietbeo
 * Date: 30/05/2017
 * Time: 10:09
 */

require_once ('HinhChuNhat.php');
require_once ('HinhVuong.php');
require_once ('HinhTron.php');
require_once ('SoDienThoai.php');

$hinhtron = new HinhTron\Shape(4);

echo "Ban kinh hinh tron: " . $hinhtron->getBanKinh() . "<br>";
echo "Chu vi hinh tron: " . $hinhtron->getChuVi() . "<br>";
echo "Dien tich hinh tron: " . $hinhtron->getDienTich() . "<br>";
echo "Duong kinh hinh tron: " . $hinhtron->getDuongKinh() . "<br>";

$hinhchunhat = new HinhChuNhat\Shape(4, 8);

echo "Chieu dai hinh chu nhat: " . $hinhchunhat->getChieuDai() . "<br>";
echo "Chieu rong hinh chu nhat: " . $hinhchunhat->getChieuRong() . "<br>";
echo "Chu vi hinh chu nhat: " . $hinhchunhat->getChuVi() . "<br>";
echo "Dien tich hinh chu nhat: " . $hinhchunhat->getDienTich() . "<br>";

$hinhvuong = new HinhVuong\Shape(5);

echo "Chieu dai canh hinh vuong: " . $hinhvuong->getCanh() . "<br>";
echo "Chu vi hinh vuong: " . $hinhvuong->getChuVi() . "<br>";
echo "Dien tich hinh vuong: " . $hinhvuong->getDienTich() . "<br>";

$sdt = new SoDienThoai( '0989850441');

try
{
    $sdt->checkHopLe();
}
catch (Exception $e)
{
    echo $e->getMessage() . "<br>";
    echo $e->getLine() . "<br>";
    echo $e->getFile() . "<br>";
}