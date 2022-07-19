<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
$duongDanGocThuMucDuAn = str_replace("admin/nhan_vien",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'admin/kiem_tra_dang_nhap.php';

require_once $duongDanGocThuMucDuAn . 'models/NhanVien.php';//tuyệt đối
$nhanVien = new NhanVien();
$soBanGhiTrenMotTrang = 10;
$trangHienTai = isset($_GET['trang_hien_tai']) && is_numeric($_GET['trang_hien_tai'])
    ? $_GET['trang_hien_tai'] : 1; //nếu không có trang hiện tại thì mặc định là 1
//tổng số trang
$soTrang = ceil($nhanVien->layTongSoNhanVien() / $soBanGhiTrenMotTrang);
$danhSachNhanVien = $nhanVien->layDanhSachNhanVien($trangHienTai, $soBanGhiTrenMotTrang);

//kiểm tra xem có thao tác xoá hay không
if (isset($_GET['thao_tac'])) {
    //người dùng nhấn vào thao tác
    $thaoTac = $_GET['thao_tac'];
    //lấy về mã của bản ghi muốn xoá
    $ma = $_GET['ma'];
    //nếu là thao tác xoá
    if ($thaoTac == 'xoa') {
        $nhanVien->xoaMotNhanVien($ma);
        //tải lại trang danh sách
        header('location:/qlnv/admin/nhan_vien/danh_sach.php');
    }

    if ($thaoTac == 'sua') {
        header('location:/qlnv/admin/nhan_vien/sua.php?ma=' . $ma);
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
    <title>Quản lý Chức Vụ - Danh sách</title>
    <link rel="stylesheet"
          href="../../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>

<div class="container">
    <?php require_once './../dung_chung/navbar.php'; ?>
    <h5>Danh Sách Chức Vụ</h5>
    <div style="display: flex; gap:10px">
        <a href="/qlnv/admin/nhan_vien/them.php" class="btn btn-success">
            Thêm Nhân Viên</a>
        <form method="get" action="/qlnv/admin/nhan_vien/tim_kiem.php"
              style="display: flex;
    justify-items: center;
    width: 300px;gap: 5px">
            <input type="text" name="tu_khoa"
                   style="width: 200px"
                   class="form-control" placeholder="Nhập Nội Dung Tìm kiếm"/>
            <button class="btn btn-primary" style="width:100px">Tìm kiếm</button>
        </form>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Mã</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Phòng Ban</th>
            <th scope="col">Chức Vụ</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($danhSachNhanVien as $nhanVien) {
            ?>

            <tr>
                <th scope="row"><?php echo $nhanVien['ma_nhan_vien']; ?></th>
                <td><?php echo $nhanVien['ho_ten']; ?></td>
                <td><?php echo $nhanVien['ngay_sinh']; ?></td>
                <td><?php echo $nhanVien['so_dien_thoai']; ?></td>
                <td><?php echo $nhanVien['dia_chi']; ?></td>
                <td><?php echo $nhanVien['ten_phong_ban']; ?></td>
                <td><?php echo $nhanVien['ten_chuc_vu']; ?></td>
                <td>
                    <a href="?thao_tac=sua&ma=<?php echo $nhanVien['ma_nhan_vien']; ?>"
                       class="btn btn-warning">Sửa</a>

                    <a href="?thao_tac=xoa&ma=<?php echo $nhanVien['ma_nhan_vien']; ?>"
                       onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                       class="btn btn-danger">Xoá</a>
                </td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($i = 0; $i < $soTrang; $i++) {
                ?>
                <li class="page-item">
                    <a class="page-link"
                       href="/qlnv/admin/nhan_vien/danh_sach.php?trang_hien_tai=<?php echo $i + 1; ?>">
                        <?php echo $i + 1; ?></a>
                </li>
                <?php
            }
            ?>

        </ul>
    </nav>


</div>
</body>

<?php
//$offset = ($currentPage - 1) * $limit;
//1 trang có 10 bản ghi -> $limit = 10;
//$offset = (1-1)*10; // 0 -> SELECT * FROM nhan_vien LIMIT 0,10;
//$offset = (2-1)*10; // 10 -> SELECT * FROM nhan_vien LIMIT 10,10;
//$offset = (3-1)*10; // 20 -> SELECT * FROM nhan_vien LIMIT 20,10;
?>
</html>