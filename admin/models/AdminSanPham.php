<?php
class AdminSanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham()
    {
        try {
        $sql = 'SELECT product.*, category.ten AS ten_danhmuc FROM product 
            INNER JOIN category ON product.id_danhmuc = category.id';
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
        } catch (Exception $e) {
        echo "Loi" . $e->getMessage();
        }
    }

    public function insertSanPham($ten, $mota, $id_danhmuc, $gia_coso, $cosan_stock, $ma_hang, $trang_thai, $ngay_capnhat, $hinhanh)
    {
        try {
        $sql = 'INSERT INTO product (ten,mota,id_danhmuc,gia_coso,cosan_stock,ma_hang,trang_thai,ngay_capnhat,hinhanh)
                VALUES (:ten,:mota,:id_danhmuc,:gia_coso,:cosan_stock,:ma_hang,:trang_thai,:ngay_capnhat,:hinhanh) ';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':ten' => $ten,
            ':mota' => $mota,
            ':id_danhmuc' => $id_danhmuc,
            ':gia_coso' => $gia_coso,
            ':cosan_stock' => $cosan_stock,
            ':ma_hang' => $ma_hang,
            ':trang_thai' => $trang_thai,
            ':ngay_capnhat' => $ngay_capnhat,
            ':hinhanh' => $hinhanh,

        ]);

        return true;
        } catch (Exception $e) {
        echo "Loi" . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        try {
        $sql = 'SELECT * FROM product WHERE id = :id';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id,
        ]);

        return $stmt->fetch();
        } catch (Exception $e) {
        echo "Loi" . $e->getMessage();
        }
    }

    public function updateSanPham($id, $ten, $mota, $id_danhmuc, $gia_coso, $cosan_stock, $ma_hang, $trang_thai, $hinhanh, $ngay_capnhat)
    {
        try {
        $sql = "UPDATE product
            SET ten = :ten, mota = :mota, id_danhmuc = :id_danhmuc, 
                gia_coso = :gia_coso, cosan_stock = :cosan_stock, 
                ma_hang = :ma_hang, trang_thai = :trang_thai, 
                hinhanh = :hinhanh ,  ngay_capnhat = :ngay_capnhat
            WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':ten' => $ten,
            ':mota' => $mota,
            ':id_danhmuc' => $id_danhmuc,
            ':gia_coso' => $gia_coso,
            ':cosan_stock' => $cosan_stock,
            ':ma_hang' => $ma_hang,
            ':trang_thai' => $trang_thai,
            ':hinhanh' => $hinhanh,
            ':ngay_capnhat' => $ngay_capnhat,
        ]);
        return true;
        } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        }
    }


    public function destroySanPham($id)
    {
        try {
        $sql = 'DELETE FROM product WHERE id = :id';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id,
        ]);

        return true;
        } catch (Exception $e) {
        echo "Loi" . $e->getMessage();
        }
    }

    public function getBinhLuanFromKhachHang($id) {}
}