<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Quản lý tài khoản quản trị </h1>
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
                    <h3 class="card-title">Thêm tài khoản quản trị</h3>
                </div>

                <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên</label>
                        <input type="text" class="form-control" name="ten" placeholder="Nhập tên">
                        <?php if (isset($error['ten'])) { ?>
                        <p class="text-danger"><?= $error['ten'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="ho">Họ</label>
                        <input type="text" class="form-control" name="ho" placeholder="Nhập họ">
                        <?php if (isset($error['ho'])) { ?>
                        <p class="text-danger"><?= $error['ho'] ?></p>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email">
                        <?php if (isset($error['email'])) { ?>
                        <p class="text-danger"><?= $error['email'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Điện thoại</label>
                        <input type="number" class="form-control" name="dien_thoai" placeholder="Nhập sdt">
                        <?php if (isset($error['dien_thoai'])) { ?>
                        <p class="text-danger"><?= $error['dien_thoai'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ">
                        <?php if (isset($error['dia_chi'])) { ?>
                        <p class="text-danger"><?= $error['dia_chi'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Thành phố</label>
                        <input type="text" class="form-control" name="thanhpho" placeholder="Nhập thành phố">
                        <?php if (isset($error['thanhpho'])) { ?>
                        <p class="text-danger"><?= $error['thanhpho'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Vai trò</label>
                        <select class="form-control" name="vai_tro" id="exampleFormControlSeclect1">
                        <option selected disabled>Chọn vai trò</option>
                        <option value="1">Admin</option>
                        <option value="2">Khách hàng</option>
                        </select>
                        <?php if (isset($error['vai_tro'])) { ?>
                        <p class="text-danger"><?= $error['vai_tro'] ?></p>
                        <?php } ?>
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