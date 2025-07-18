<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý Danh Mục</h1>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>">
                                <button class="btn btn-success"> Thêm danh mục</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả </th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $danhMuc['ten'] ?></td>
                                            <td><?= $danhMuc['mieuta'] ?></td>
                                            <td><?= $danhMuc['ngay_capnhat'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danhmuc=' . $danhMuc['id'] ?>"><button class="btn btn-warning">Sửa</button> </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id_danhmuc=' . $danhMuc['id'] ?>" onclick="return confirm('Ban co muon xoa khong?')"><button class="btn btn-danger">Xóa</button></a>
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