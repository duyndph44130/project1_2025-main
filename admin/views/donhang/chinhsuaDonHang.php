<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng: <?= $donHang['phien_token']  ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Chi tiết đơn hàng -->
                <div class="col-md-7">
                    <?php
                    if ($donHang['trangthai'] == 'xử lý') {
                        $colorAleter = 'primary';
                    } elseif ($donHang['trangthai'] == 'vận chuyển') {
                        $colorAleter = 'warning';
                    } elseif ($donHang['trangthai'] == 'đã giao') {
                        $colorAleter = 'success';
                    } else {
                        $colorAleter = 'danger';
                    }
                    ?>
                    <div class="alert alert-<?= $colorAleter ?>" role="alert">
                        Đơn hàng: <?= $donHang['trangthai'] ?>
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Shop Quần áo TrendingShop
                                    <small class="float-right">Date: <?= $donHang['ngay_capnhat'] ?></small>
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Thông tin người đặt
                                <address>
                                    Tên :<strong><?= $donHang['ten'] ?></strong><br>
                                    Email: <?= $donHang['email'] ?><br>
                                    Số điện thoại: 0<?= $donHang['dien_thoai']  ?><br>
                                    Địa chỉ: <?= $donHang['dia_chi']  ?><br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                Thông tin
                                <address>
                                    <strong>Mã đơn hàng: <?= $donHang['phien_token'] ?></strong><br>
                                    Tổng tiền: <?= $donHang['tong_gia'] ?><br>
                                    Ghi chú: <?= $donHang['vanchuyen_thanhpho'] ?><br>
                                    Thanh toán: Tiền mặt<br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $sanPham['ten'] ?></td>
                                                <td><?= $sanPham['gia'] ?></td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td><?= $sanPham['tong_gia'] ?></td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['tong_gia'] ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <small class="float-right">Ngày đặt: <?= $donHang['ngay_capnhat'] ?></small>
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Thành tiền:</th>
                                            <td><?= $tong_tien ?></td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển</th>
                                            <td>35000</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td><?= $tong_tien + 35000 ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form sửa đơn hàng -->
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin đơn hàng</h3>
                        </div>
                        <?php $isLocked = ($donHang['trangthai'] === 'đã giao'); ?>
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $donHang['id'] ?>">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="trangthai" class="form-control custom-select" <?= $isLocked ? 'disabled' : '' ?>>
                                    <option value="<?= $donHang['trangthai'] ?>" selected><?= $donHang['trangthai'] ?></option>
                                    <?php
                                    $statusOptions = ['xử lý', 'vận chuyển', 'đã giao', 'đã hủy'];
                                    $statusOptions = array_diff($statusOptions, [$donHang['trangthai']]);
                                    foreach ($statusOptions as $status) {
                                        echo "<option value='$status'>$status</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" <?= $isLocked ? 'disabled' : '' ?>>Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End form sửa -->
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>