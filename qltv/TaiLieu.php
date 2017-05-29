<?php

/**
 * Created by PhpStorm.
 * User: vietbeo
 * Date: 26/05/2017
 * Time: 15:26
 */
abstract class TaiLieu implements Muon, Tra
{
    protected $id;
    protected $ten;
    protected $muon;
    protected $tra;
    protected $tong;


    public function muon()
    {
        $id = $_GET['id'];
        $_SESSION['tra'][$id] = $this->tra;
        $_SESSION['muon'][$id] = $_SESSION['muon'][$id] + 1;
        $this->muon = $_SESSION['muon'][$id];
        $_SESSION['tong'][$id] = $_SESSION['tong'][$id] - 1;
        $this->tong = $_SESSION['tong'][$id] + $this->tong;
    }

    public function tra()
    {
    }
}
