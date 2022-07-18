<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
if (!isset($_GET['ma']) || !is_numeric($_GET['ma'])) {
    //chuyển về trang danh sách
    header("Location: /qlnv/admin/chuc_vu/danh_sach.php");
}
$duongDanGocThuMucDuAn = str_replace("admin/chuc_vu",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'models/ChucVu.php';//tuyệt đối
$chucVu = new ChucVu();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Chức Vụ - Sửa</title>
    <link rel="stylesheet"
          href="../../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<?php
//kiem tra xem co ton tai 1 du lieu day len hay khong
if (isset($_POST['ten_chuc_vu'])) {
    //lay ve du lieu
    $tenChucVu = $_POST['ten_chuc_vu'];
    //lay ve he so luong
    $heSoLuong = $_POST['he_so_luong'];
    //khoi tao mot doi tuong dai dien cua lop ChucVu
    $phongBan = new ChucVu();
    //lấy về mã phòng ban của phòng ban muốn sửa
    $maChucVu = $_GET['ma'];
    //chen ten phong ban vao bang chuc vu
    $thanhCong = $phongBan->suaMotChucVu($maChucVu, $tenChucVu, $heSoLuong); //$phongBan->themMotPhongBan($tenChucVu);
    if ($thanhCong) {
        echo "<script>alert('Sửa thành công');</script>";
    } else {
        echo "<script>alert('Sửa thất bại');</script>";
    }
}

//lấy về 1 phòng ban theo mã phòng ban người dùng truyền lên
$motChucVu = $chucVu->layMotChucVu($_GET['ma']);
//kiểm tra xem phòng ban với mã truyền vào có tồn tại hay không
if ($motChucVu == null) {
    echo "<script>alert('Không tìm thấy chức vụ cần sửa');</script>";
    //header("Location: /qlnv/admin/phong_ban/danh_sach.php");
    //dùng lệnh js để chuyển hướng
    echo "<script>window.location='/qlnv/admin/chuc_vu/danh_sach.php'</script>";
}
?>
<div class="container">
    <?php require_once './../dung_chung/navbar.php'; ?>
    <h5>Sửa Phòng Ban</h5>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Chức Vụ</label>
            <input type="text" name="ten_chuc_vu"
                   value="<?php echo $motChucVu['ten']; ?>"
                   class="form-control" id="name" placeholder="Tên Chức Vụ">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Hệ số lương</label>
            <input type="text" name="he_so_luong"
                   value="<?php echo $motChucVu['he_so_luong']; ?>"
                   class="form-control" id="name" placeholder="Hệ số lương">
        </div>

        <div>
            <button class="btn btn-primary">Sửa</button>
        </div>
    </form>
</div>
</body>
</html>