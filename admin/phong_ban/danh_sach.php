<?php
//session_start();
//error_reporting(E_ALL);
//require_once './../../models/PhongBan.php';//tương đối
//echo __DIR__;//đường dẫn thư mục hiện tại
$duongDanGocThuMucDuAn = str_replace("admin/phong_ban",
    '', __DIR__);//đường dẫn thư mục gốc của dự án
require_once $duongDanGocThuMucDuAn . 'models/PhongBan.php';//tuyệt đối
require_once $duongDanGocThuMucDuAn . 'admin/kiem_tra_dang_nhap.php';
$phongBan = new PhongBan();
$danhSachPhongBan = $phongBan->layDanhSachPhongBan();
//kiểm tra xem có thao tác xoá hay không
if (isset($_GET['thao_tac'])) {
    //người dùng nhấn vào thao tác
    $thaoTac = $_GET['thao_tac'];
    //lấy về mã của bản ghi muốn xoá
    $ma = $_GET['ma'];
    //nếu là thao tác xoá
    if ($thaoTac == 'xoa') {
        $phongBan->xoaMotPhongBan($ma);
        //tải lại trang danh sách
        header('location:/qlnv/admin/phong_ban/danh_sach.php');
    }

    if ($thaoTac == 'sua') {
        header('location:/qlnv/admin/phong_ban/sua.php?ma=' . $ma);
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
    <title>Quản lý Phòng Ban - Danh sách</title>
    <link rel="stylesheet"
          href="../../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>

<div class="container">
    <?php require_once './../dung_chung/navbar.php'; ?>
    <h5>Danh Sách Phòng Ban</h5>
    <div style="display: flex; gap:10px">
        <a href="/qlnv/admin/phong_ban/them.php" class="btn btn-success">
            Thêm Phòng Ban</a>
        <form method="get" action="/qlnv/admin/phong_ban/tim_kiem.php"
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
            <th scope="col">Tên phòng ban</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($danhSachPhongBan as $phongBan) {
            ?>

            <tr>
                <th scope="row"><?php echo $phongBan['ma']; ?></th>
                <td><?php echo $phongBan['ten']; ?></td>
                <td>
                    <a href="?thao_tac=sua&ma=<?php echo $phongBan['ma']; ?>"
                       class="btn btn-warning">Sửa</a>

                    <a href="?thao_tac=xoa&ma=<?php echo $phongBan['ma']; ?>"
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