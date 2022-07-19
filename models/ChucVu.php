<?php
require_once "DB.php";

class ChucVu extends DB
{
    public function layDanhSachChucVu()
    {
        $sql = "SELECT * FROM chuc_vu";
        //thực thi câu lệnh sql thông qua đối tượng kết nối (pdo)
        $ketQuaTraVe = $this->ketNoi->query($sql);
        $danhSachChucVu = array();
        foreach ($ketQuaTraVe as $banGhi) {
            $danhSachChucVu[] = $banGhi;
        }
        return $danhSachChucVu;
    }

    public function layMotChucVu($ma)
    {
        $sql = "SELECT * FROM chuc_vu WHERE ma = $ma";
        //thực thi câu lệnh sql thông qua đối tượng kết nối (pdo)
        $ketQua = $this->ketNoi->query($sql);
        //set cơ chế lấy về dữ liệu (1 bản ghi tương ứng vs 1 mảng liên hợp)
        $ketQua->setFetchMode(PDO::FETCH_ASSOC);
        //tiến hành lọc lấy dữ liệu từ kết quả trả về
        $motChucVu = $ketQua->fetch();
        return $motChucVu;
    }

    public function themMotChucVu($tenChucVu, $heSoLuong)
    {
        //prepared statement - cho phép chúng ta
        // giữ chỗ các vị trí giá trị trong câu lệnh sql
        $sql = "INSERT INTO chuc_vu(ten,he_so_luong) 
            VALUES(:ten_chuc_vu,:he_so_luong)";
        //tạo ra một đối tượng chuẩn bị lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ten_chuc_vu",
            $tenChucVu);
        $doiTuongChuanBiLenhSql->bindParam(":he_so_luong",
            $heSoLuong);
        //thực thi câu lệnh chuẩn bị sql = chen dl vào CSDL
        try {
            $doiTuongChuanBiLenhSql->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function suaMotChucVu($maChucVu, $tenChucVu, $heSoLuong)
    {
        $sql = "UPDATE chuc_vu 
                SET ten=:ten_chuc_vu,
                    he_so_luong=:he_so_luong 
                WHERE ma=:ma_chuc_vu";
        //tạo ra một đối tượng chuẩn bị lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ten_chuc_vu",
            $tenChucVu);
        $doiTuongChuanBiLenhSql->bindParam(":he_so_luong",
            $heSoLuong);
        $doiTuongChuanBiLenhSql->bindParam(":ma_chuc_vu",
            $maChucVu);
        try {
            $doiTuongChuanBiLenhSql->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function xoaMotChucVu($maChucVu)
    {
        $sql = "DELETE FROM 
            chuc_vu WHERE ma=:ma_chuc_vu";
        //tao ra mot doi tuong chuan bi lenh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay the vi tri dat gach voi gia tri tu tham so $tenPhongBan truyen vao
        $doiTuongChuanBiLenhSql->bindParam(":ma_chuc_vu", $maChucVu);
        try {
            $doiTuongChuanBiLenhSql->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function timKiemTheoTenChucVu($tenChucVu)
    {
        $sql = "SELECT * FROM chuc_vu WHERE 
                              ten LIKE '%$tenChucVu%'";
        //thuc thi cau lenh thong qua ket noi
        $ketQuaTraVe = $this->ketNoi->query($sql);
        $danhSachChucVu = array();
        // while ($banGhi = $ketQuaTraVe->fetch_assoc()){
        // $danhSachPhongBan[] = $banGhi;
        foreach ($ketQuaTraVe as $banGhi) {
            $danhSachChucVu[] = $banGhi;
        }
        return $danhSachChucVu;
    }
}
