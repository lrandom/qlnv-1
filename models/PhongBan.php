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
        /*   while ($banGhi = $ketQuaTraVe->fetch_assoc()) {
               $danhSachPhongBan[] = $banGhi;
           }*/
        foreach ($ketQuaTraVe as $banGhi) {
            $danhSachPhongBan[] = $banGhi;
        }
        return $danhSachPhongBan;
    }

    public function layMotPhongBan($ma)
    {
        $sql = "SELECT * FROM phong_ban WHERE ma = $ma";
        //thực thi câu lệnh sql thông qua đối tượng kết nối (pdo)
        $ketQua =  $this->ketNoi->query($sql);
        //set cơ chế lấy về dữ liệu (1 bản ghi tương ứng vs 1 mảng liên hợp)
        $ketQua->setFetchMode(PDO::FETCH_ASSOC);
        //tiến hành lọc lấy dữ liệu từ kết quả trả về
        $motPhongBan = $ketQua->fetch();
        return $motPhongBan;
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
        try {
            $doiTuongChuanBiLenhSql->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }

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
