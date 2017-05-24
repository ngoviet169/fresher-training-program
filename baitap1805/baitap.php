<?php

    //bai1 : in ra cac so nguyen to nho hon $n
    function so_nguyen_to ($n) {
        $count = 0;

        for($i = 2; $i <= $n; $i++) 
        {
            for($j = 1; $j <= $i; $j++) 
            {
                if($i % $j == 0) 
                {
                    $count++;
                }
            }
            if($count == 2) //lọc ra số chỉ chia hết cho 1 và chính nó.
            {
                echo $i.", ";
            }
            $count = 0;
        }
    }

    //bai2 : tinh tong binh phuong tu 1->$n
    function tong_binh_phuong ($n) {
        $tong = 0;
        for($i = 1; $i <= $n; $i++){
            $tong = $tong + $i * $i;
        }
        return $tong;
    }

    //bai3: tim boi chung nho nhat cua 2 so
    function bcnn ($a, $b) {
        for($i = 1; $i <= ($a * $b); $i++) 
        {
           if($i % $a == 0 && $i % $b == 0) 
            {
                return $i;
            }
        }
    }

    //bai5 : tim uoc chung lon nhat cua 2 so
    function ucln ($a, $b) {
        return ($b == 0) ? $a : ucln($b, $a % $b);
    }

    //bai4 : tim boi chung nho nhat cua 1 mang cac so nguyen duong
    function bcnn_array($arr) {
        $kq = $arr[0];
        $n = count($arr);
        for($i = 1; $i < $n; $i++)
        {
            $kq = bcnn($kq, $arr[$i]);
        }
        return $kq;
    }

    //bai6 : tim uoc chung lon nhat cua 1 mang cac so nguyen duong
    function ucln_array($arr) {
        $kq = $arr[0];
        $n = count($arr);
        for($i = 1; $i < $n; $i++)
        {
            $kq = ucln($kq, $arr[$i]);
        }
        return $kq;
    }

    //bai 7: in ra hinh tam giac
    function bai7 ($n) {
        for($i = 1; $i <= $n; $i++)
        {
            for($j = 1; $j <= $i; $j++)
            {
                echo '*';
            }
            echo '<br>';
        }
    }
    // $arr = array(8,9,21);
    // echo bcnn_array($arr);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bài tập</title>
</head>
<body>
<form action="" method="post">
    <table>
        <th>Nhập số cần tính</th>
        <tr>
            <td>số a: </td>
            <td><input type="text" name="soa"></td>
        </tr>
        <tr>
            <td>số b: </td>
            <td><input type="text" name="sob"></td>
        </tr>
        <tr>
            <td>Chọn bài: </td>
            <td>
                <select name="select">
                    <option value="1">Bài 1</option>
                    <option value="2">Bài 2</option>
                    <option value="3">Bài 3</option>
                    <option value="4">Bài 4</option>
                    <option value="5">Bài 5</option>
                    <option value="6">Bài 6</option>
                    <option value="7">Bài 7</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Tính"></td>
        </tr>
    </table>
</form>
</body>
</html>


<?php
    if(isset($_POST['select']))
    {
        $bai = $_POST['select'];

        switch ($bai) {
        case 1:
            $soa = $_POST['soa'];
            echo so_nguyen_to($soa);
            break;
        
        case 2:
            $soa = $_POST['soa'];
            echo tong_binh_phuong($soa);
            break;

        case 3:
            $soa = $_POST['soa'];
            $sob = $_POST['sob'];
            echo bcnn($soa, $sob);
            break;

        case 4:
            $soa = $_POST['soa'];
            $arr = explode(',', $soa);
            echo bcnn_array($arr);
            break;
        
        case 5:
            $soa = $_POST['soa'];
            $sob = $_POST['sob'];
            echo ucln($soa, $sob);
            break;

        case 6:
            $soa = $_POST['soa'];
            $arr = explode(',', $soa);
            echo ucln_array($arr);
            break;

        case 7:
            $soa = $_POST['soa'];
            echo bai7($soa);
            break;

        default:
            # code...
            break;
        }
    }
?>
