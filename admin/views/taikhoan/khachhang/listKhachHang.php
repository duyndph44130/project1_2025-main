<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Quản lý tài khoản khách hàng</h1>
            </div>

        </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listKhachHang as $key => $khachHang): ?>
                        <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $khachHang['ten'] ?></td>
                        <td><?= $khachHang['email'] ?></td>
                        <td><?= $khachHang['dien_thoai'] ?></td>
                        <td><?= $khachHang['vai_tro'] ?></td>

                        <td>
                            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khachhang=' . $khachHang['id'] ?>"><button class="btn btn-primary">Chi tiết</button>
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khachhang=' . $khachHang['id'] ?>"><button class="btn btn-warning">Sửa</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quantri=' . $khachHang['id'] ?>" onclick="return confirm('Ban co muon reset password tk khong?')"><button class="btn btn-danger">Reset</button></a>
                            </a>
                        </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    </div>

    <?php include './views/layout/footer.php' ?>

    <script>
    $(function() {
        $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
</script>

</body>

</html>