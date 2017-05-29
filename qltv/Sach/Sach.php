<?php

/**
 * Created by PhpStorm.
 * User: vietbeo
 * Date: 26/05/2017
 * Time: 15:24
 */
class Sach extends TaiLieu
{
    private $tac_gia;
    private $loai_sach;

    public function __construct($id, $ten, $gia, $tac_gia, $loai_sach, $tong)
    {
        $this->id        = $id;
        $this->ten       = $ten;
        $this->gia       = $gia;
        $this->tac_gia   = $tac_gia;
        $this->loai_sach = $loai_sach;
        $this->tong      = $tong;
    }

    public function getInfoSach()
    {
        return [
            'id'        => $this->id,
            'ten'       => $this->ten,
            'gia'       => $this->gia,
            'tac_gia'   => $this->tac_gia,
            'loai_sach' => $this->loai_sach,
            'tong'      => $this->tong,
        ];
    }
}
