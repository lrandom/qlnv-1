<?php
session_start();
//session_unset();//huỷ hết toàn bộ session
unset($_SESSION['user']);//huỷ session mục tiêu có key là user