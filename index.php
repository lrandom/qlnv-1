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
/*$myName = "Nguyễn Thành Luân";
$myAge = 30;

echo $myName;
echo $myAge;*/

//PasCalCase
//camelCase
//under_score = snake_case

/*$MyFullName = "Luan";//Pascal- > tên lớp trong OOP
$myFullName = "Luan";//camelCase-> tên biến, tên hàm
$my_full_name = "Luan";//under_score->tên biến, tên hàm

define('BASE_URL', 'http://localhost/qlnv');//định nghĩa ra một hằng tên là BASE_URL
echo BASE_URL;*/


//toán tử toán học
$numberA = 10;
$numberB = 5;
echo $numberA + $numberB; // 15
echo '<br>';
echo $numberA - $numberB; // 5
echo '<br>';
echo $numberA / $numberB; // 2
echo '<br>';
echo $numberA % $numberB; //chia lấy dư - chia module 0
echo '<br>';
echo $numberA * $numberB; //50
echo '<br>';
echo ++$numberA;//11
echo '<br>';
echo $numberA; // 11;
echo '<br>';
echo --$numberB;//4
echo '<br>';
echo $numberB;//4
echo '<br>';
//toán tử quan hệ (toán tử so sánh)
echo 10 == 10; //true
echo '<br>';
echo 10 > 10; //false
echo '<br>';
echo 10 < 10; //false
echo '<br>';
echo 10 >= 10;// true
echo '<br>';
echo 10 <= 10;//true
echo '<br>';
echo 10 != 10;//false

//Toán tử logic
echo(10 == 10 && 5 == 5);//true
echo(10 != 10 && 5 == 5);//false
echo(10 != 10 || 5 == 5);//true
$flag = false;
echo(!$flag);//true

//Toán tử gán toán học
$age = 20;
$age += 10;
echo $age;//30

//toán tử điều kiện/ toán tử 3 ngôi/ unary operation
$age = (30 > 10) ? 20 : 10;

$weather = "trời nắng";
if($weather=="trời mưa"){
    echo "Ở nhà";
}else{
    echo "Đi chơi";
}

//if-else-if
$age = 10;
if($age<=10){
    echo "Nhi đồng";
}else if($age>10 && $age<16){
    echo "Thiếu niên";
}else if($age>16 && $age<30){
    echo "Thạnh niên";
}else if ($age > 30) {
    echo "Trung niên";
}

//switch - case
$weather = "Trời mưa";
switch ($weather) {
    case "Trời mưa":
        echo "Đi chơi";
        break;

    case "Trời nắng":
        echo "Ở nhà";
        break;

    case "Trời bão":
        echo "Ra ngoài chụp ảnh";
        break;

    default:
        echo "Không biết làm gì";
}

//nested if - lồng nhau
if (true) {
    if (true) {
        if (true) {

        }
    }
}
?>
</body>
</html>