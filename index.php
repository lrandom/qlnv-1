<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//strong type - static type: chặt chẽ về kề kiểu ví dụ Java, C, C#
//loosely type - dynamic type: lỏng lẻo về kiểu ví dụ PHP, JavaScript, Python
$myName = "Nguyễn Thành Luân";
$myAge = 30;

echo $myName;
echo $myAge;

//PasCalCase
//camelCase
//under_score = snake_case

$MyFullName = "Luan";//Pascal- > tên lớp trong OOP
$myFullName = "Luan";//camelCase-> tên biến, tên hàm
$my_full_name = "Luan";//under_score->tên biến, tên hàm

define('BASE_URL','http://localhost/qlnv');//định nghĩa ra một hằng tên là BASE_URL
echo BASE_URL;
?>
</body>
</html>