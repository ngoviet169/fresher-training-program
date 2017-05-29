<?php

session_start();

require_once('Interface/Muon.php');
require_once('Interface/Tra.php');
require_once('TaiLieu.php');
require_once('Bao/Bao.php');
require_once('Sach/Sach.php');
require_once('Truyen/Truyen.php');

$sach = [
    array(
        'id' => 1,
        'ten' => 'PHP',
        'gia' => 100000,
        'tac_gia' => 'abcd',
        'loai_sach' => 'Giao Duc',
        'tong' => 203
    ),
    array(
        'id' => 2,
        'ten' => 'C++',
        'gia' => 200000,
        'tac_gia' => 'efgh',
        'loai_sach' => 'Lap Trinh',
        'tong' => 100
    )
    ];
foreach ($sach as $key => $value) {
    $a[] = new Sach($value['id'], $value['ten'], $value['gia'], $value['tac_gia'], $value['loai_sach'], $value['tong']);
}
if($_GET['id'] == '1')
{
    $obj = $a[0];
}
if($_GET['id'] == '2')
{
    $obj = $a[1];
}
if($_GET['function'] == 'muon')
{
    $obj->muon();
}
if($_GET['function'] == 'tra')
{
    $obj->tra();
}
echo "<pre>";
print_r($obj);
if($_GET['function'] == 'huy')
{
    session_destroy();
}
?>

<html>
    <table>
        <tr>
            <td>Mượn : </td>
            <td><a href="index.php?function=muon&id=1"> Sách PHP</a> </td>
            <td><a href="index.php?function=muon&id=2"> Sách C++</a> </td>
        </tr>
        <tr>
            <td>Trả : </td>
            <td><a href="index.php?function=tra&id=1"> Sách PHP</a> </td>
            <td><a href="index.php?function=tra&id=2"> Sách C++</a> </td>
        </tr>
        <tr>
            <td><a href="index.php?function=huy">Hủy session</a> </td>
        </tr>
    </table>

</html>

