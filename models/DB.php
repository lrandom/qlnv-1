<?php

//DB = Database = CSDL
class DB
{
    public $ketNoi = null; // giá trị rỗng

    public function __construct()
    {

        try {
            $this->ketNoi = new PDO("mysql:host=127.0.0.1;dbname=qlnv",
                "root",
                "koodinh@");
            //mở kết nối có hỗ trợ utf8 charset - hỗ bộ ký tự có dấu
            $this->ketNoi->query("SET NAMES 'UTF8'");
            //báo cho đối tượng kết nối sẽ trả về một đối tượng lỗi (ngoại lệ)
            //khi có bất kỳ một câu lệnh sql nào bị lỗi
            $this->ketNoi->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Không thể kết nối đến CSDL, vui lòng kiểm tra lại";
            echo $e->getMessage();//trả về thông điệp lỗi kết nối CSDL
        }
    }
}
