<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Quan lý tài khoản quản trị</h1>
            </div>

        </div>
    </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri' ?>">
                    <button class="btn btn-success">Thêm tài khoản </button>
                </a>
                </div>
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
                    <?php foreach ($listQuanTri as $key => $quanTri): ?>
                        <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $quanTri['ten'] ?></td>
                        <td><?= $quanTri['email'] ?></td>
                        <td><?= $quanTri['dien_thoai'] ?></td>
                        <td><?= $quanTri['vai_tro'] ?></td>

                        <td>
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quantri=' . $quanTri['id'] ?>"><button class="btn btn-warning">Sửa</button>
                            <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quantri=' . $quanTri['id'] ?>" onclick="return confirm('Ban co muon reset password tk khong?')"><button class="btn btn-danger">Reset</button></a>
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