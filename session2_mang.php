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
//liệt kê
$arr = array([
    10,
    20,
    30
]);
echo $arr[0];//10

$arr2 = [
    10, 20, "Luan"
];

//gán
$arr3 = array();
$arr3[] = 10;
$arr3[] = 20;
$arr3[] = 40; //10,20,40


//phân ra 2 loại
//1. mảng chỉ số nguyên (indexed array)
//2. mảng liên hợp, liên kết (associative array)//từ điển
//3. mảng nhiều chiều

$arr4 = [
    "name" => "Luân",
    "age" => 30,
    "job" => "Developer"
];

echo $arr4["name"];//Luân
echo $arr4["age"];//30
echo $arr4["job"];//Developer

$arr5 = [
    [0, 1, 2],
    [3, 4, 5],
    [2, 2, 3]
];

echo $arr5[1][1];//4

$arr6 = [
    [
        [
            0, 1, 2
        ],
        [
            4, 5, 6
        ]
    ],
    [
        [
            1, 2, 3
        ],
        [
            6, 7, 8
        ]
    ]
];
echo $arr6[1][1][0];//6

$arr7 = [
    [
        "name" => "Luan",
        "age" => 30
    ]
]
?>
</body>
</html><!doctype html>
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
//liệt kê
$arr = array([
    10,
    20,
    30
]);
echo $arr[0];//10

$arr2 = [
    10, 20, "Luan"
];

//gán
$arr3 = array();
$arr3[] = 10;
$arr3[] = 20;
$arr3[] = 40; //10,20,40


//phân ra 2 loại
//1. mảng chỉ số nguyên (indexed array)
//2. mảng liên hợp, liên kết (associative array)//từ điển
//3. mảng nhiều chiều

$arr4 = [
    "name" => "Luân",
    "age" => 30,
    "job" => "Developer"
];

echo $arr4["name"];//Luân
echo $arr4["age"];//30
echo $arr4["job"];//Developer

$arr5 = [
    [0, 1, 2],
    [3, 4, 5],
    [2, 2, 3]
];

echo $arr5[1][1];//4

$arr6 = [
    [
        [
            0, 1, 2
        ],
        [
            4, 5, 6
        ]
    ],
    [
        [
            1, 2, 3
        ],
        [
            6, 7, 8
        ]
    ]
];
echo $arr6[1][1][0];//6

$arr7 = [
    [
        "name" => "Luan",
        "age" => 30
    ],
    [
        "name" => "Nam",
        "age" => 20
    ]
];
echo $arr7[0]["name"];//Luan
?>
</body>
</html>