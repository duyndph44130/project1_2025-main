<?php
class AdminDonHangController
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }

    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }

    // Gộp chi tiết và sửa đơn hàng vào 1 action
    public function detailAndEditDonHang()
    {
        $don_hang_id = $_GET['id_donhang'];
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        $sanPhamDonHang = $this->modelDonHang->getListDonHang($don_hang_id);

        // Lấy lỗi từ session nếu có
        $error = isset($_SESSION['error_form']) ? $_SESSION['error_form'] : [];
        unset($_SESSION['error_form']);

        require_once './views/donhang/chinhsuaDonHang.php';
    }

    // Xử lý cập nhật đơn hàng từ form trên trang chi tiết
    public function postEditDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $trangthai = $_POST['trangthai'];
        $error = [];

        $donHang = $this->modelDonHang->getDetailDonHang($id);
        if ($donHang && $donHang['trangthai'] === 'đã giao') {
            $_SESSION['error'] = 'Đơn hàng đã giao không thể chỉnh sửa!';
            header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-va-sua-don-hang&id_donhang=' . $id);
            exit();
        }

        if (empty($trangthai)) {
            $error['trangthai'] = 'Trạng thái đơn hàng không được để trống';
        }

        if (empty($error)) {
            // Chỉ cập nhật trạng thái
            $this->modelDonHang->updateTrangThaiDonHang($id, $trangthai);
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        } else {
            $_SESSION['error_form'] = $error;
            header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-va-sua-don-hang&id_donhang=' . $id);
            exit();
        }
        }
    }
}
