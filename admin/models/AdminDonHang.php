<?php
class AdminDonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDonHang()
    {
        try {
            $sql = 'SELECT * FROM orders ORDER BY id DESC';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getDetailDonHang($id)
    {
        try {
            $sql = 'SELECT * FROM orders WHERE id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getListDonHang($id)
    {
        try {
            $sql = 'SELECT * 
                FROM chi_tiet_don_hang
                INNER JOIN product ON chi_tiet_don_hang.id_san_pham = product.id
                WHERE chi_tiet_don_hang.id_donhang = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo ("Lỗi truy vấn getListDonHang: " . $e->getMessage());
        }
    }




    public function updateDonHang($id, $ten, $dien_thoai, $email, $dia_chi, $vanchuyen_thanhpho, $trangthai)
    {
        try {
            $sql = "UPDATE orders
            SET ten = :ten, dien_thoai = :dien_thoai, email = :email, 
                dia_chi = :dia_chi, vanchuyen_thanhpho = :vanchuyen_thanhpho, 
                trangthai = :trangthai
            WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten' => $ten,
                ':dien_thoai' => $dien_thoai,
                ':email' => $email,
                ':dia_chi' => $dia_chi,
                ':vanchuyen_thanhpho' => $vanchuyen_thanhpho,
                ':trangthai' => $trangthai,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDonHangFromKhachHang($id_KH)
    {
        try {
            $sql = 'SELECT * FROM orders WHERE id_KH = :id_KH';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id_KH' => $id_KH
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function updateTrangThaiDonHang($id, $trangthai)
    {
        try {
            $sql = "UPDATE orders SET trangthai = :trangthai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':trangthai' => $trangthai,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
