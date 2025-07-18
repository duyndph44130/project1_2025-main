<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quan ly sản phẩm</h1>
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
                                <h3 class="card-title">Thêm sản phẩm</h3>
                            </div>

                            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="ten" placeholder="Enter tên sản phẩm">
                                        <?php if (isset($error['ten'])) { ?>
                                            <p class="text-danger"><?= $error['ten'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                                        <input type="number" class="form-control" name="gia_coso" placeholder="Enter giá sản phẩm">
                                        <?php if (isset($error['gia_coso'])) { ?>
                                            <p class="text-danger"><?= $error['gia_coso'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh</label>
                                        <input type="file" class="form-control" name="hinhanh" placeholder="Enter hình ảnh">
                                        <?php if (isset($error['hinhanh'])) { ?>
                                            <p class="text-danger"><?= $error['hinhanh'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Số lượng</label>
                                        <input type="number" class="form-control" name="cosan_stock" placeholder="Enter số lượng">
                                        <?php if (isset($error['cosan_stock'])) { ?>
                                            <p class="text-danger"><?= $error['cosan_stock'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày nhập</label>
                                        <input type="datetime-local" class="form-control" name="ngay_capnhat" placeholder="Enter hình ảnh">
                                        <?php if (isset($error['ngay_capnhat'])) { ?>
                                            <p class="text-danger"><?= $error['ngay_capnhat'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Danh mục</label>
                                        <select class="form-control" name="id_danhmuc" id="exampleFormControlSeclect1">
                                            <option selected disabled>Chọn danh mục sản phẩm</option>

                                            <?php foreach ($listDanhMuc as $danhMuc): ?>
                                                <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?php if (isset($error['id'])) { ?>
                                            <p class="text-danger"><?= $error['id'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mã hàng</label>
                                        <input type="text" class="form-control" name="ma_hang" placeholder="Enter mã hàng">
                                        <?php if (isset($error['ma_hang'])) { ?>
                                            <p class="text-danger"><?= $error['ma_hang'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng thái</label>
                                        <select class="form-control" name="trang_thai" id="exampleFormControlSeclect1">
                                            <option selected disabled>Chọn trạng thái</option>
                                            <option value="1">Có sẵn</option>
                                            <option value="2">Hết hàng</option>
                                        </select>
                                        <?php if (isset($error['trang_thai'])) { ?>
                                            <p class="text-danger"><?= $error['trang_thai'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea name="mota" id="" placeholder="Enter mô tả" class="form-control"></textarea>
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