<?php
session_start();
if (isset($_SESSION['user'])) {
    echo $_SESSION['user']['name'];
    echo $_SESSION['user']['age'];
} else {
    echo "Không có tồn tại user";
}
?>