<?php
require_once "DB.php";

class NhanVien extends DB
{
    public function layDanhSachNhanVien()
    {
        $sql = "SELECT *,phong_ban.ten as ten_phong_ban,
                chuc_vu.ten as ten_chuc_vu,nhan_vien.ma as ma_nhan_vien
         FROM nhan_vien
         INNER JOIN phong_ban ON nhan_vien.ma_phong_ban = phong_ban.ma
         INNER JOIN chuc_vu ON nhan_vien.ma_chuc_vu = chuc_vu.ma";
        //thực thi câu lệnh sql thông qua đối tượng kết nối (pdo)
        $ketQuaTraVe = $this->ketNoi->query($sql);
        $danhSachNhanVien = array();
        foreach ($ketQuaTraVe as $banGhi) {
            $danhSachNhanVien[] = $banGhi;
        }
        return $danhSachNhanVien;
    }

    public function layMotNhanVien($ma)
    {
        $sql = "SELECT * FROM nhan_vien WHERE ma = $ma";
        //thực thi câu lệnh sql thông qua đối tượng kết nối (pdo)
        $ketQua = $this->ketNoi->query($sql);
        //set cơ chế lấy về dữ liệu (1 bản ghi tương ứng vs 1 mảng liên hợp)
        $ketQua->setFetchMode(PDO::FETCH_ASSOC);
        //tiến hành lọc lấy dữ liệu từ kết quả trả về
        $motNhanVien = $ketQua->fetch();
        return $motNhanVien;
    }

    public function themMotNhanVien($hoTen, $ngaySinh,
                                    $soDienThoai, $diaChi,
                                    $maPhongBan, $maChucVu)
    {
        //prepared statement - cho phép chúng ta
        // giữ chỗ các vị trí giá trị trong câu lệnh sql
        $sql = "INSERT INTO nhan_vien(ho_ten,
                      ngay_sinh,so_dien_thoai,dia_chi,
                      ma_phong_ban,ma_chuc_vu) 
            VALUES(:ho_ten,:ngay_sinh,:so_dien_thoai,:dia_chi,
                  :ma_phong_ban,:ma_chuc_vu)";
        //tạo ra một đối tượng chuẩn bị thực thi lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ho_ten", $hoTen);
        $doiTuongChuanBiLenhSql->bindParam(":ngay_sinh", $ngaySinh);
        $doiTuongChuanBiLenhSql->bindParam(":so_dien_thoai", $soDienThoai);
        $doiTuongChuanBiLenhSql->bindParam(":dia_chi", $diaChi);
        $doiTuongChuanBiLenhSql->bindParam(":ma_phong_ban", $maPhongBan);
        $doiTuongChuanBiLenhSql->bindParam(":ma_chuc_vu", $maChucVu);
        //thực thi câu lệnh chuẩn bị sql = chen dl vào CSDL
        try {
            $doiTuongChuanBiLenhSql->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function suaMotNhanVien($maNhanVien,
                                   $tenNhanVien,
                                   $ngaySinh,
                                   $soDienThoai,
                                   $diaChi,
                                   $maPhongBan,
                                   $maChucVu)
    {
        $sql = "UPDATE nhan_vien SET ho_ten = :ho_ten,
                      ngay_sinh = :ngay_sinh,
                      so_dien_thoai = :so_dien_thoai,
                      dia_chi = :dia_chi,
                      ma_phong_ban = :ma_phong_ban,
                      ma_chuc_vu = :ma_chuc_vu
                      WHERE ma = :ma_nhan_vien";
        //tạo ra một đối tượng chuẩn bị lệnh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay thế vị trí đặt gạch với giá trị từ tham số $tenPhongBan truyền vào
        $doiTuongChuanBiLenhSql->bindParam(":ho_ten", $tenNhanVien);
        $doiTuongChuanBiLenhSql->bindParam(":ngay_sinh", $ngaySinh);
        $doiTuongChuanBiLenhSql->bindParam(":so_dien_thoai", $soDienThoai);
        $doiTuongChuanBiLenhSql->bindParam(":dia_chi", $diaChi);
        $doiTuongChuanBiLenhSql->bindParam(":ma_phong_ban", $maPhongBan);
        $doiTuongChuanBiLenhSql->bindParam(":ma_chuc_vu", $maChucVu);
        $doiTuongChuanBiLenhSql->bindParam(":ma_nhan_vien", $maNhanVien);
        //thực thi câu lệnh chuẩn bị sql = chen dl vào CSDL
        try {
            $doiTuongChuanBiLenhSql->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function xoaMotNhanVien($maNhanVien)
    {
        $sql = "DELETE FROM 
            chuc_vu WHERE ma=:ma_nhan_vien";
        //tao ra mot doi tuong chuan bi lenh sql
        $doiTuongChuanBiLenhSql = $this->ketNoi->prepare($sql);
        //thay the vi tri dat gach voi gia tri tu
        //tham so $tenNhanVien truyen vao
        $doiTuongChuanBiLenhSql->bindParam(":ma_nhan_vien",
            $maNhanVien);
        try {
            $doiTuongChuanBiLenhSql->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function timKiemTheoTenNhanVien($tenNhanVien)
    {
        $sql = "SELECT * FROM nhan_vien WHERE 
                              ho_ten LIKE '%$tenNhanVien%'";
        //thuc thi cau lenh thong qua ket noi
        $ketQuaTraVe = $this->ketNoi->query($sql);
        $danhSachNhanVien = array();
        // while ($banGhi = $ketQuaTraVe->fetch_assoc()){
        // $danhSachPhongBan[] = $banGhi;
        foreach ($ketQuaTraVe as $banGhi) {
            $danhSachNhanVien[] = $banGhi;
        }
        return $danhSachNhanVien;
    }
}