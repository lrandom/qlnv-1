<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
$duongDanGocThuMucDuAn = str_replace("admin/nhan_vien",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'admin/kiem_tra_dang_nhap.php';
require_once $duongDanGocThuMucDuAn . 'models/NhanVien.php';//tuyệt đối
require_once $duongDanGocThuMucDuAn . 'models/ChucVu.php';
require_once $duongDanGocThuMucDuAn . 'models/PhongBan.php';
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
    <title>Quản lý Nhân Viên - Thêm</title>
    <link rel="stylesheet"
          href="../../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<?php
//kiem tra xem co ton tai 1 du lieu day len hay khong
if (isset($_POST['ho_ten'])) {
    //lay ve du lieu
    $hoTen = $_POST['ho_ten'];

    //biến đổi định dạng ngày sinh
    $ngaySinh = $_POST['ngay_sinh'];
    //tháng - ngày - năm (dd/mm/yyyy) -> năm - tháng - ngày (yyyy-mm-dd)
    //$ngaySinh = "07/28/2022"; //2022-07-28
    //var_dump($_POST['ngay_sinh']);
    //$ngaySinh = explode("/", $ngaySinh);//["07", "28", "2022"]
    //$ngaySinh = $ngaySinh[2] . "-" . $ngaySinh[0] . "-" . $ngaySinh[1];//2022-07-28

    $soDienThoai = $_POST['so_dien_thoai'];
    $diaChi = $_POST['dia_chi'];
    $maPhongBan = $_POST['ma_phong_ban'];
    $maChucVu = $_POST['ma_chuc_vu'];
    //khoi tao mot doi tuong dai dien cua lop PhongBan
    $nhanVien = new NhanVien();
    //chen ten phong ban vao bang phong ban
    $thanhCong = $nhanVien->themMotNhanVien(
        $hoTen,
        $ngaySinh,
        $soDienThoai,
        $diaChi,
        $maPhongBan,
        $maChucVu
    );
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
            <label for="name" class="form-label">Tên Nhân Viên</label>
            <input type="text" class="form-control"
                   name="ho_ten" id="name"
                   placeholder="Tên Nhân Viên">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Số điện thoại </label>
            <input type="text" class="form-control"
                   name="so_dien_thoai" id="name"
                   placeholder="Số điện thoại">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control"
                   name="ngay_sinh" id="name"
                   placeholder="Ngày Sinh">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control"
                   name="dia_chi" id="name"
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
            <button class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
</body>
</html>