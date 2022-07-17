<?php
include_once "ConNguoi.php";

class GiaoVien extends ConNguoi
{
    function dayHoc()
    {

    }
}

$gvLuan = new GiaoVien();
$gvLuan->ngu();
