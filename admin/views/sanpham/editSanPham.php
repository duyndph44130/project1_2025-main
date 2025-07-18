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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Sửa sản phẩm</h3>
                            </div>

                            <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="ten" value="<?= $sanpham['ten'] ?>" placeholder="Enter tên sản phẩm">
                                        <?php if (isset($error['ten'])) { ?>
                                            <p class="text-danger"><?= $error['ten'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                                        <input type="number" class="form-control" name="gia_coso" value="<?= $sanpham['gia_coso'] ?>" placeholder="Enter giá sản phẩm">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh</label>
                                        <input type="file" class="form-control" name="hinhanh">
                                        <small>Hình ảnh hiện tại: <?= $sanpham['hinhanh'] ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số lượng</label>
                                        <input type="number" class="form-control" name="cosan_stock" value="<?= $sanpham['cosan_stock'] ?>" placeholder="Enter số lượng">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày nhập</label>
                                        <input type="datetime-local" class="form-control" name="ngay_capnhat" value="<?= date('Y-m-d\TH:i', strtotime($sanpham['ngay_capnhat'])) ?>">
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Danh muc</label>
                                        <input type="number" class="form-control" name="id_danhmuc" value="<?= $sanpham['id_danhmuc'] ?>" placeholder="Enter số lượng">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mã hàng</label>
                                        <input type="text" class="form-control" name="ma_hang" value="<?= $sanpham['ma_hang'] ?>" placeholder="Enter mã hàng">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng thái</label>
                                        <select class="form-control" name="trang_thai">
                                            <option disabled>Chọn trạng thái</option>
                                            <option value="1" <?= $sanpham['trang_thai'] == 1 ? 'selected' : '' ?>>Có sẵn</option>
                                            <option value="2" <?= $sanpham['trang_thai'] == 2 ? 'selected' : '' ?>>Hết hàng</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea name="mota" placeholder="Enter mô tả" class="form-control"><?= $sanpham['mota'] ?></textarea>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>