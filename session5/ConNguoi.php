<?php

class ConNguoi
{
    //thể hiện cho đặc điểm
    //của đối tượng được tạo ra từ lớp
    public $hoTen;
    var $mauToc;
    var $mauMat;
    var $chieuCao;
    var $canNang;

    static $tenLop = "Con người";

    //hàm khởi tạo là một hàm đặc biệt được
    // triệu gọi ngay khi mà tạo ra đối tượng
    /**
     * @param $hoTen
     * @param $mauToc
     * @param $mauMat
     * @param $chieuCao
     * @param $canNang
     */
    public function __construct($hoTen,
                                $mauToc,
                                $mauMat,
                                $chieuCao,
                                $canNang)
    {
        $this->hoTen = $hoTen;
        $this->mauToc = $mauToc;
        $this->mauMat = $mauMat;
        $this->chieuCao = $chieuCao;
        $this->canNang = $canNang;
    }


    function an()
    {
        echo $this->hoTen . ' ăn';
    }

    function chay()
    {
        echo $this->hoTen . 'chạy';
    }

    function ngu()
    {
        echo $this->hoTen . 'ngủ';
    }

}


?>

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
/*$luan = new ConNguoi(); //tạo ra một bạn Luân từ lớp Con người
$luan->hoTen = "Nguyễn Thành Luân";//truy cập vào đặc điểm họ tên và set cho một cái tên là Nguyễn Thầnh Luân
$luan->chieuCao = "1.72";
$luan->canNang = "75";
$luan->mauToc = "Đen";
$luan->mauMat = "mắt nâu";*/

$luan = new ConNguoi("Nguyễn Thành Luân",
    "màu đen",
    "màu nâu",
    "1.72",
    "75");
$luan->an();
echo '<br>';
$luan->chay();
echo '<br>';
$luan->ngu();
echo '<br>';
echo $luan->mauMat;

//$nam = new ConNguoi(); //tạo ra một bạn Nam từ lớp con người
$nam = new ConNguoi("Trần Nam",
    "màu đen",
    "màu đen", "1.76", "80");

$nam->an();
echo '<br>';
$nam->chay();
echo '<br>';
$nam->ngu();

echo ConNguoi::$tenLop; // Con người
?>
</body>
</html>
