<?php
//kiểm tra xem có tồn tại từ khoá truyền từ tang danh_sach hay không
if (isset($_GET['tu_khoa'])) {
    //nếu có
    $tuKhoa = $_GET['tu_khoa'];
    $duongDanGocThuMucDuAn = str_replace("admin/nhan_vien",
        '', __DIR__);//đường dẫn thư mục gốc của dự án
    require_once $duongDanGocThuMucDuAn . 'models/NhanVien.php';//tuyệt đối
    $nhanVien = new NhanVien();
    $danhSachNhanVien = $nhanVien->timKiemTheoTenNhanVien($tuKhoa);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Chức Vụ - Tìm kiếm</title>
    <link rel="stylesheet"
          href="../../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <?php require_once './../dung_chung/navbar.php'; ?>
    <h5>Kết quả tìm kiếm theo từ khoá "<?php echo $_GET['tu_khoa']; ?>"</h5>
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
</div>
</body>
</html>
