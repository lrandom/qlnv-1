<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
$duongDanGocThuMucDuAn = str_replace("admin/chuc_vu",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'models/ChucVu.php';//tuyệt đối
$chucVu = new ChucVu();
$danhSachChucVu = $chucVu->layDanhSachChucVu();
//kiểm tra xem có thao tác xoá hay không
if (isset($_GET['thao_tac'])) {
    //người dùng nhấn vào thao tác
    $thaoTac = $_GET['thao_tac'];
    //lấy về mã của bản ghi muốn xoá
    $ma = $_GET['ma'];
    //nếu là thao tác xoá
    if ($thaoTac == 'xoa') {
        $chucVu->xoaMotChucVu($ma);
        //tải lại trang danh sách
        header('location:/qlnv/admin/chuc_vu/danh_sach.php');
    }

    if ($thaoTac == 'sua') {
        header('location:/qlnv/admin/chuc_vu/sua.php?ma=' . $ma);
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
        <a href="/qlnv/admin/chuc_vu/them.php" class="btn btn-success">
            Thêm Chức Vụ</a>
        <form method="get" action="/qlnv/admin/chuc_vu/tim_kiem.php"
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