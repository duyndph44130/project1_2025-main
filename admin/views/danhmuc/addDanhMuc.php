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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm danh mục</h3>
                            </div>

                            <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input type="text" class="form-control" name="ten" placeholder="Enter tên danh mục">
                                        <?php if (isset($error['ten'])) { ?>
                                            <p class="text-danger"><?= $error['ten'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea name="mieuta" id="" placeholder="Enter mô tả" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày cập nhật</label>
                                        <input type="datetime-local" class="form-control" name="ngay_capnhat">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php' ?>

</body>

</html>