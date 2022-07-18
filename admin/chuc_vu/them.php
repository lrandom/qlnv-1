<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
$duongDanGocThuMucDuAn = str_replace("admin/chuc_vu",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'models/ChucVu.php';//tuyệt đối

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Phòng Ban - Thêm</title>
    <link rel="stylesheet"
          href="../../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<?php
//kiem tra xem co ton tai 1 du lieu day len hay khong
if (isset($_POST['ten_chuc_vu'])) {
    //lay ve du lieu
    $tenChucVu = $_POST['ten_chuc_vu'];
    $heSoLuong = $_POST['he_so_luong'];
    //khoi tao mot doi tuong dai dien cua lop PhongBan
    $chucVu = new ChucVu();
    //chen ten phong ban vao bang phong ban
    $thanhCong = $chucVu->themMotChucVu($tenChucVu,$heSoLuong);
    if ($thanhCong) {
        echo "<script>alert('Thêm thành công');</script>";
    } else {
        echo "<script>alert('Thêm thất bại');</script>";
    }
}
?>
<div class="container">
    <?php require_once './../dung_chung/navbar.php'; ?>
    <h5>Thêm Chức Vụ</h5>

    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Chức Vụ</label>
            <input type="text" class="form-control"
                   name="ten_chuc_vu" id="name"
                 placeholder="Tên Chức Vụ">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Hệ số lương</label>
            <input type="text" class="form-control"
                   name="he_so_luong" id="name"
                   placeholder="Hệ số lương">
        </div>

        <div>
            <button class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
</body>
</html>