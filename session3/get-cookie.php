<?php
//super variable -> siêu biến
if (isset($_COOKIE['views'])) {
    echo $_COOKIE['views'];//1000
} else {
    echo "Không có cookie tên là views";
}

?>