<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý Bình luận</h1>
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
                                        <th>Nội dung</th>
                                        <th>ID Sản phẩm</th>
                                        <th>ID Người dùng</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listBinhLuan as $key => $binhluan): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= htmlspecialchars($binhluan['noi_dung']) ?></td>
                                            <td><?= $binhluan['id_san_pham'] ?></td>
                                            <td><?= $binhluan['id_nguoi_dung'] ?></td>
                                            <td><?= $binhluan['ngay_dang'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id_binhluan=' . $binhluan['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')">
                                                    <button class="btn btn-danger">Xóa</button>
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

<?php include './views/layout/footer.php'; ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // Gán dữ liệu vào modal khi bấm nút Sửa
        $('.btnEdit').on('click', function() {
            $('#edit-id').val($(this).data('id'));
            $('#edit-noidung').val($(this).data('noidung'));
            // Chuyển ngày tạo về dạng phù hợp input datetime-local
            let ngayTao = $(this).data('ngaytao');
            if (ngayTao && ngayTao.length > 10) {
                ngayTao = ngayTao.replace(' ', 'T');
            }
            $('#edit-ngaytao').val(ngayTao);
        });
    });
</script>