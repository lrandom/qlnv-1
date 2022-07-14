<?php
//hàm không tham số
function printSchool()
{
    echo "Xin chào";
}

printSchool();

//hàm có tham số
function total($numberA, $numberB)
{
    $numberA = 10;
    $numberB = 20;
    return $numberA + $numberB;
}

$a = 40;
$b = 50;
$myTotal = total($a, $b);
echo $myTotal; //30
echo $a;//40;
echo $b;//50


//tham số: tham trị, tham chiếu

//truyền tham chiếu
function total2(&$numberA, &$numberB)
{
    $numberA = 10;
    $numberB = 20;
    return $numberA + $numberB;
}

$a = 40;
$b = 50;
$myTotal = total($a, $b);
echo $myTotal; //30
echo $a;//10;
echo $b;//20
?>