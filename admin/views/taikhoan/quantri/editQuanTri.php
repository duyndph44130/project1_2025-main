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
                    <h3 class="card-title">Sửa tài khoản quản trị <?= $quanTri['ten']  ?></h3>
                </div>

                <form action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri' ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $quanTri['id'] ?>">

                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên</label>
                        <input type="text" class="form-control" name="ten" value="<?= $quanTri['ten'] ?>" placeholder="Nhập tên">
                        <?php if (isset($error['ten'])) { ?>
                        <p class="text-danger"><?= $error['ten'] ?></p>
                        <?php } ?>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $quanTri['email'] ?>" placeholder="Nhập email">
                        <?php if (isset($error['email'])) { ?>
                        <p class="text-danger"><?= $error['email'] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Điện thoại</label>
                        <input type="number" class="form-control" name="dien_thoai" value="<?= $quanTri['dien_thoai'] ?>" placeholder="Nhập sdt">
                        <?php if (isset($error['dien_thoai'])) { ?>
                        <p class="text-danger"><?= $error['dien_thoai'] ?></p>
                        <?php } ?>
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