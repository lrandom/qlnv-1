<?php
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    $adminEmail = "admin@gmail.com";
    $adminPassword = "admin123456";

    $email = $_POST['email'];
    $password = $_POST['password'];
    //nếu mật khẩu và email người dùng gửi lên bằng với mật khẩu và email của admin
    //thì khởi tạo session và chuyển người dùng sang trang danh sách nhân viên
    if ($email == $adminEmail && $password == $adminPassword) {
        $_SESSION['da_dang_nhap'] = true;
        header('location:/qlnv/admin/nhan_vien/danh_sach.php');
    } else {
        //nếu không thì chuyển người dùng về trang đăng nhập lại
        header('location:/qlnv/admin/dang_nhap.php');
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
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet"
          href="../assets/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <form method="post" style="width: 500px;margin:0px auto">
        <h1 style="text-align: center; font-size: 24px">Đăng nhập quản trị</h1>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="staticEmail" value="email@example.com">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
        </div>

        <button class="btn btn-primary">Đăng nhập</button>
    </form>
</div>
</body>
</html>
