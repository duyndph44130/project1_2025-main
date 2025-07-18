<?php
class AdminBinhLuanController
{
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    // Hiển thị danh sách bình luận
    public function danhSachBinhLuan()
    {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        require_once './views/binhluan/listBinhLuan.php';
    }
    // Xóa bình luận
    public function deleteBinhLuan()
    {
        $id = $_GET['id_binhluan'];
        $this->modelBinhLuan->deleteBinhLuan($id);
        header("Location: " . BASE_URL_ADMIN . '?act=binh-luan');
        exit();
    }
}
