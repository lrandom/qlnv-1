<?php
//kiểm tra xem có tồn tại từ khoá truyền từ tang danh_sach hay không
if (isset($_GET['tu_khoa'])) {
    //nếu có
    $tuKhoa = $_GET['tu_khoa'];
    $duongDanGocThuMucDuAn = str_replace("admin/chuc_vu",
        '', __DIR__);//đường dẫn thư mục gốc của dự án
    require_once $duongDanGocThuMucDuAn . 'models/ChucVu.php';//tuyệt đối
    $chucVu = new ChucVu();
    $danhSachChucVu = $chucVu->timKiemTheoTenChucVu($tuKhoa);
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
            <th scope="col">Tên chức vụ</th>
            <th scope="col">Hệ số lương</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($danhSachChucVu as $chucVu) {
            ?>

            <tr>
                <th scope="row"><?php echo $chucVu['ma']; ?></th>
                <td><?php echo $chucVu['ten']; ?></td>
                <td><?php echo $chucVu['he_so_luong']; ?></td>
                <td>
                    <a href="?thao_tac=sua&ma=<?php echo $chucVu['ma']; ?>"
                       class="btn btn-warning">Sửa</a>

                    <a href="?thao_tac=xoa&ma=<?php echo $chucVu['ma']; ?>"
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
