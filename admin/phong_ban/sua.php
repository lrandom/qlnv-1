<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
$duongDanGocThuMucDuAn = str_replace("admin/phong_ban",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'models/PhongBan.php';//tuyệt đối
$phongBan = new PhongBan();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Phòng Ban - Sửa</title>
    <link rel="stylesheet"
          href="../../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<?php
//kiem tra xem co ton tai 1 du lieu day len hay khong
if (isset($_POST['ten_phong_ban'])) {
    //lay ve du lieu
    $tenPhongBan = $_POST['ten_phong_ban'];
    //khoi tao mot doi tuong dai dien cua lop PhongBan
    $phongBan = new PhongBan();
    //chen ten phong ban vao bang phong ban
    $thanhCong = $phongBan->themMotPhongBan($tenPhongBan);
    if ($thanhCong) {
        echo "<script>alert('Thêm thành công');</script>";
    } else {
        echo "<script>alert('Thêm thất bại');</script>";
    }
}

//lấy về 1 phòng ban theo mã phòng ban người dùng truyền lên
$motPhongBan = $phongBan->layMotPhongBan($_GET['ma']);
?>
<div class="container">
    <h5>Thêm Phòng Ban</h5>

    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Phòng Ban</label>
            <input type="text" class="form-control"
                   name="ten_phong_ban" id="name"
                   placeholder="Tên Phòng Ban" value="<?php echo $motPhongBan['ten']; ?>">
        </div>

        <div>
            <button class="btn btn-primary">Sửa</button>
        </div>
    </form>
</div>
</body>
</html>