<?php
    /**
    * class Circle
    */

    class Circle
    {
        
        const SO_PI = 3.14; //dinh nghia so PI

        //ham tinh chu vi
        function chuVi($r)
        {
            return 2 * self::SO_PI * $r;
        }

        //ham tinh dien tich
        function dienTich($r)
        {
            return self::SO_PI * $r * $r;
        }
    }

//chuong trinh chinh
$tinh = new Circle();
$r = 5;
$result_chuVi = $tinh->chuVi($r);
$result_dienTich = $tinh->dienTich($r);
echo "Chu vi hinh tron co ban kinh $r la: " . $result_chuVi . "<br>";
echo "Dien tich hinh tron co ban kinh $r la: " . $result_dienTich;
