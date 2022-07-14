<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//vòng lặp biết trước số lần lặp
/*for ($i = 0; $i < 10; $i++) {
    echo $i;
    echo '<br>';
}*/

//vòng lặp không biết trước số lần lặp
//kiểm tra điều kiện trước
/*$index = 0;
while ($index < 10) {
    //chạy các lệnh bên trong
    echo $index;
    echo '<br>';
    $index++;
}*/

//kiểm tra điều kiện sau
//làm trước kiểm tra sau
/*$index2 = 0;
do {
    $index2++;
    echo '<br>';
    echo $index2;
} while ($index2 < 10);*/


/*for ($i = 0; $i < 10; $i++) {
    echo $i;
    if ($i == 4) {
        break;
    }
    echo '<br>';
}*/

for ($i = 0; $i < 10; $i++) {
    if ($i == 4) {
        continue;
    }
    echo $i;
    echo '<br>';
}//0,1,2,3,5,6,7,8,9


?>
</body>
</html>