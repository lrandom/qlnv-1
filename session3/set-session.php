<?php
session_start();
//lưu trữ mảng vào session
$_SESSION['user'] = [
    "name" => "Luân",
    "age" => 30
];

$_SESSION['page'] = 'http://localhost';