<?php
class AdminBaoCaoThongKeController
{
    public function home()
{
    $categoryModel = new AdminDanhMuc();
    $userModel = new AdminTaiKhoan();
    $productModel = new AdminSanPham();
    $orderModel = new AdminDonHang();
    $commentModel = new AdminBinhLuan();

    $listDanhMuc = $categoryModel->getAllDanhMuc();
    $listKhachHang = $userModel->getAllTaiKhoan('admin');
    $listSanPham = $productModel->getLatest(5);
    $listOrders = $orderModel->getAllDonHang();
    $listBinhLuan = $commentModel->getLatest(5);

    require_once './views/home.php';
}

}
