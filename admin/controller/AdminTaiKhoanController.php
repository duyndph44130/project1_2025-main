<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan('admin');

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
    }

    public function postQuanTri()
    {
        //Kiểm tra dữ liệu đc submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten = $_POST['ten'];
        $ho = $_POST['ho'];
        $email = $_POST['email'];
        $dien_thoai = $_POST['dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $thanhpho = $_POST['thanhpho'];
        $vai_tro = $_POST['vai_tro'];
        $ngay_capnhat = $_POST['ngay_capnhat'];

        $error = [];
        if (empty($ten)) {
            $error['ten'] = 'Tên không được để trống';
        }

        if (empty($error)) {
            $mat_khau = password_hash('123@123ac', PASSWORD_BCRYPT);

            $this->modelTaiKhoan->insertTaiKhoan($ten, $ho, $dien_thoai, $dia_chi, $thanhpho, $ngay_capnhat, $email, $mat_khau, $vai_tro);
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
            exit();
        }
        }
    }
    public function formEditQuanTri()
    {
        $id_quantri = $_GET['id_quantri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quantri);
        if ($quanTri) {
        require_once './views/taikhoan/quantri/editQuanTri.php';
        } else {
        header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
        exit();
        }
    }

    public function postEditQuanTri()
    {
        //Kiểm tra dữ liệu đc submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $dien_thoai = $_POST['dien_thoai'];

        $error = [];
        if (empty($ten)) {
            $error['ten'] = 'Tên không được để trống';
        }
        if (empty($email)) {
            $error['email'] = 'Email không được để trống';
        }
        if (empty($dien_thoai)) {
            $error['dien_thoai'] = 'Số điện thoại không được để trống';
        }

        if (empty($error)) {
            $this->modelTaiKhoan->updateTaiKhoan($id, $ten, $email, $dien_thoai);

            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quantri=' . $id);
            exit();
        }
        }
    }

    public function resetPassword() 
    {
        $tai_khoan_id = $_GET['id_quantri'];
        $mat_khau = password_hash('123@123ac', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $mat_khau);
        if ($status) {
        header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
        } else {
        var_dump('Error');
        die;
        }
    }


    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan('khách hàng');

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khachhang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        require_once './views/taikhoan/khachhang/editKhachHang.php';
    }
    public function postEditKhachHang()
    {
        //Kiểm tra dữ liệu đc submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $dien_thoai = $_POST['dien_thoai'];
        $dia_chi = $_POST['dia_chi'];

        $error = [];
        if (empty($ten)) {
            $error['ten'] = 'Tên không được để trống';
        }
        if (empty($email)) {
            $error['email'] = 'Email không được để trống';
        }
        if (empty($dien_thoai)) {
            $error['dien_thoai'] = 'Số điện thoại không được để trống';
        }

        if (empty($error)) {
            $this->modelTaiKhoan->updateKhachHang($id, $ten, $email, $dien_thoai, $dia_chi);

            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khachhang=' . $id);
            exit();
        }
        }
    }
    public function detailKhachHang()
    {
        $id = $_GET['id_khachhang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id);

        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id);
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $mat_khau = $_POST['mat_khau'];

        // Gọi phương thức checkLogin để kiểm tra đăng nhập
        $user = $this->modelTaiKhoan->checkLogin($email, $mat_khau);

        // Kiểm tra nếu là tài khoản admin
        if (is_array($user) && $user['vai_tro'] == 'admin') {
            $_SESSION['user_admin'] = $user['email'];
            header("Location: " . BASE_URL_ADMIN);
            exit();
        } else {
            $_SESSION['error'] = $user;
            $_SESSION['flash'] = true;
            header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
            exit();
        }
        }
    }



    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
        unset($_SESSION['user_admin']);
        header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        }
    }
}