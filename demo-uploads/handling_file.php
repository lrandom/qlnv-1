<?php
if (isset($_FILES['img'])) {
    //var_dump($_FILES['img']);
    move_uploaded_file($_FILES['img']['tmp_name'],
        'uploads/'.time(). $_FILES['img']['name']);
}
?>