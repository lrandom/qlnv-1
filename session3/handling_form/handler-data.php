<?php
//tồn tại 1 cái dữ liệu có tên là full_name
//có dữ liệu truyền lên
/*if (isset($_GET['full_name'])) {
    $fullName = $_GET['full_name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    echo "Dữ liệu bạn đã gửi lên là $fullName, $email, $password";
}*/

/*if (isset($_POST['full_name'])) {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Dữ liệu bạn đã gửi lên là $fullName, $email, $password";
}*/

if (isset($_REQUEST['full_name'])) {
    $fullName = $_REQUEST['full_name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    echo "Dữ liệu bạn đã gửi lên là $fullName, $email, $password";
}
?>