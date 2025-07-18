<?php
class AdminDanhMucController
{
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    // READ - Hiển thị danh sách danh mục
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }

    // CREATE - Form thêm danh mục
    public function formAddDanhMuc()
    {
        $error = [];
        require_once './views/danhmuc/addDanhMuc.php';
    }

    // CREATE - Xử lý submit thêm danh mục
    public function postDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ten = trim($_POST['ten'] ?? '');
        $mieuta = trim($_POST['mieuta'] ?? '');
        $ngay_capnhat = $_POST['ngay_capnhat'] ?? date('Y-m-d H:i:s');

        $error = [];

        if (empty($ten)) {
            $error['ten'] = 'Tên danh mục không được để trống';
        }

        if (empty($error)) {
            $this->modelDanhMuc->insertDanhMuc($ten, $mieuta, $ngay_capnhat);
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        } else {
            require_once './views/danhmuc/addDanhMuc.php';
        }
        }
    }

    // UPDATE - Form sửa danh mục
    public function formEditDanhMuc()
    {
        $id = $_GET['id_danhmuc'] ?? null;

        if (!$id || !is_numeric($id)) {
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
        }

        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if ($danhmuc) {
        $error = [];
        require_once './views/danhmuc/editDanhMuc.php';
        } else {
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
        }
    }

    // UPDATE - Xử lý cập nhật danh mục
    public function postEditDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $ten = trim($_POST['ten'] ?? '');
        $mieuta = trim($_POST['mieuta'] ?? '');
        $ngay_capnhat = $_POST['ngay_capnhat'] ?? date('Y-m-d H:i:s');

        $error = [];

        if (empty($ten)) {
            $error['ten'] = 'Tên danh mục không được để trống';
        }

        if (empty($error)) {
            $this->modelDanhMuc->updateDanhMuc($id, $ten, $mieuta, $ngay_capnhat);
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        } else {
            $danhmuc = ['id' => $id, 'ten' => $ten, 'mieuta' => $mieuta, 'ngay_capnhat' => $ngay_capnhat];
            require_once './views/danhmuc/editDanhMuc.php';
        }
        }
    }

    // DELETE - Xóa danh mục
    public function deleteDanhMuc()
    {
        $id = $_GET['id_danhmuc'] ?? null;

        if ($id && is_numeric($id)) {
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhmuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
        }

        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}
