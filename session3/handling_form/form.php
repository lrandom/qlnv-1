<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Đăng ký</h3>
<form action="handler-data.php" method="post">
    <div>
        <label>Họ tên</label>
        <input type="text" name="full_name" placeholder="Họ tên"/>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" placeholder="Email"/>
    </div>
    <div>
        <label>Mật khẩu</label>
        <input type="password" name="password" placeholder="Mật khẩu"/>
    </div>
    <div>
        <button>Đăng ký</button>
    </div>
</form>
</body>
</html>
