<?php
require_once "DB.php";

class PhongBan extends DB
{
    public function layDanhSachPhongBan()
    {
        $sql = "SELECT * FROM phong_ban";
        //thực thi câu lệnh sql thông qua đối tượng kết nối (pdo)
        $ketQuaTraVe = $this->ketNoi->query($sql);
        $danhSachPhongBan = array();
        while ($banGhi = $ketQuaTraVe->fetch_assoc()) {
            $danhSachPhongBan[] = $banGhi;
        }
        return $danhSachPhongBan;
    }


    public function themMotPhongBan($tenPhongBan)
    {
        //prepared statement - cho phép chúng ta
        // giữ chỗ các vị trí giá trị trong câu lệnh sql
        $sql = "INSERT INTO phong_ban(ten) VALUES(:ten_phong_ban)";
        //tạo ra một đối tượng chuẩn bị lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ten_phong_ban",
            $tenPhongBan);
        //thực thi câu lệnh chuẩn bị sql = chen dl vào CSDL
        $doiTuongChuanBiLenhSql->execute();
    }

    public function suaMotPhongBan($maPhongBan, $tenPhongBan)
    {
        $sql = "UPDATE phong_ban SET ten=:ten_phong_ban WHERE ma=:ma_phong_ban";
        //tạo ra một đối tượng chuẩn bị lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ten_phong_ban",
            $tenPhongBan);
        $doiTuongChuanBiLenhSql->bindParam(":ma_phong_ban", $maPhongBan);
        $doiTuongChuanBiLenhSql->execute();
    }

    public function xoaMotPhongBan($maPhongBan)
    {
        $sql = "DELETE FROM phong_ban WHERE ma=:ma_phong_ban";
        //tạo ra một đối tượng chuẩn bị lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ma_phong_ban", $maPhongBan);
        $doiTuongChuanBiLenhSql->execute();
    }

    public function timKiemTheoTenPhongBan($tenPhongBan)
    {
        $sql = "SELECT * FROM phong_ban WHERE ten LIKE %:ten_phong_ban%";
        //tạo ra một đối tượng chuẩn bị lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ten_phong_ban", $tenPhongBan);
        $doiTuongChuanBiLenhSql->execute();
    }
}