<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
if (!isset($_GET['ma']) || !is_numeric($_GET['ma'])) {
    //chuyển về trang danh sách
    header("Location: /qlnv/admin/nhan_vien/danh_sach.php");
}
$duongDanGocThuMucDuAn = str_replace("admin/nhan_vien",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'models/NhanVien.php';//tuyệt đối
require_once $duongDanGocThuMucDuAn . 'models/ChucVu.php';
require_once $duongDanGocThuMucDuAn . 'models/PhongBan.php';
$nhanVien = new NhanVien();

$chucVu = new ChucVu();
$phongBan = new PhongBan();

$danhSachChucVu = $chucVu->layDanhSachChucVu();
$danhSachPhongBan = $phongBan->layDanhSachPhongBan();
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
    $hoTen = $_POST['ho_ten'];
    $ngaySinh = $_POST['ngay_sinh'];
    $soDienThoai = $_POST['so_dien_thoai'];
    $diaChi = $_POST['dia_chi'];
    $maPhongBan = $_POST['ma_phong_ban'];
    $maChucVu = $_POST['ma_chuc_vu'];
    $maNhanVien = $_GET['ma'];

    //khoi tao mot doi tuong dai dien cua lop ChucVu
    $nhanVien = new NhanVien();
    //lấy về mã phòng ban của phòng ban muốn sửa
    $maChucVu = $_GET['ma'];
    //chen ten phong ban vao bang chuc vu
    $thanhCong = $nhanVien->suaMotNhanVien($maNhanVien,
        $hoTen,
        $ngaySinh,
        $soDienThoai,
        $diaChi,
        $maPhongBan,
        $maChucVu); //$phongBan->themMotPhongBan($tenChucVu);
    if ($thanhCong) {
        echo "<script>alert('Sửa thành công');</script>";
    } else {
        echo "<script>alert('Sửa thất bại');</script>";
    }
}

//lấy về 1 phòng ban theo mã phòng ban người dùng truyền lên
$motNhanVien = $nhanVien->layMotNhanVien($_GET['ma']);
//kiểm tra xem phòng ban với mã truyền vào có tồn tại hay không
if ($motNhanVien == null) {
    echo "<script>alert('Không tìm thấy nhân viên cần sửa');</script>";
    //header("Location: /qlnv/admin/phong_ban/danh_sach.php");
    //dùng lệnh js để chuyển hướng
    echo "<script>window.location='/qlnv/admin/nhan_vien/danh_sach.php'</script>";
}
?>
<div class="container">
    <?php require_once './../dung_chung/navbar.php'; ?>
    <h5>Sửa Phòng Ban</h5>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Nhân Viên</label>
            <input type="text" class="form-control"
                   name="ho_ten" id="name"
                   value="<?php echo $motNhanVien['ho_ten']; ?>"
                   placeholder="Tên Nhân Viên">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Số điện thoại </label>
            <input type="text" class="form-control"
                   name="so_dien_thoai" id="name"
                   value="<?php echo $motNhanVien['so_dien_thoai']; ?>"
                   placeholder="Số điện thoại">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control"
                   name="ngay_sinh" id="name"
                   value="<?php echo $motNhanVien['ngay_sinh']; ?>"
                   placeholder="Ngày Sinh">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control"
                   name="dia_chi" id="name"
                   value="<?php echo $motNhanVien['dia_chi']; ?>"
                   placeholder="Địa chỉ">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Phòng Ban</label>
            <!--    <input type="text" class="form-control"
                       name="ten_chuc_vu" id="name"
                       placeholder="Tên Chức Vụ">-->
            <select name="ma_phong_ban" class="form-control">
                <?php foreach ($danhSachPhongBan as $phongBan): ?>
                    <option value="<?php echo $phongBan['ma'] ?>">
                        <?php echo $phongBan['ten'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Chức Vụ</label>
            <!-- <input type="text" class="form-control"
                    name="ten_chuc_vu" id="name"
                    placeholder="Tên Chức Vụ">-->
            <select name="ma_chuc_vu" class="form-control">
                <?php foreach ($danhSachChucVu as $chucVu): ?>
                    <option value="<?php echo $chucVu['ma'] ?>">
                        <?php echo $chucVu['ten'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <div>
            <button class="btn btn-primary">Sửa</button>
        </div>
    </form>
</div>
</body>
</html>