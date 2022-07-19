<?php
session_start();
if (!isset($_SESSION['da_dang_nhap'])) {
    header('location:/qlnv/admin/dang_nhap.php');
}