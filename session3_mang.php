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
$arr = [3, 4, 6, 7];
for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i];
}

foreach ($arr as $item) {
    echo $item;
}

$arr2 = [
    "name" => "Luan",
    "age" => 20
];

foreach ($arr2 as $k=>$v) {
  echo 'key:'.$k.', value:'.$v;
}
?>
</body>
</html>