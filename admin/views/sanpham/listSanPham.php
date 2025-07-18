<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                                <button class="btn btn-success">Thêm sản phẩm mới</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $sanPham['ten'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $sanPham['hinhanh'] ?>" alt="" style="width: 100px; height: auto; ">
                                            </td>
                                            <td><?= $sanPham['gia_coso'] ?></td>
                                            <td><?= $sanPham['cosan_stock'] ?></td>
                                            <td><?= $sanPham['ten_danhmuc'] ?></td>
                                            <td><?= $sanPham['ngay_capnhat'] ?></td>

                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_sanpham=' . $sanPham['id'] ?>"><button class="btn btn-warning">Sửa</button></a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_sanpham=' . $sanPham['id'] ?>" onclick="return confirm('Ban co muon xoa khong?')"><button class="btn btn-danger">Xóa</button></a>
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