<?php
session_start();
//kiểm tra xem có session da_dang_nhap hay không
if (isset($_SESSION['da_dang_nhap'])) {
    //huỷ session da_dang_nhap
    unset($_SESSION['da_dang_nhap']);
    header('location:/qlnv/admin/dang_nhap.php');
}
