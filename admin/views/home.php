<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100">
<div class="wrapper">
    <?php include './views/layout/header.php'; ?>
    <?php include './views/layout/navbar.php'; ?>
    <?php include './views/layout/sidebar.php'; ?>

    <div class="content-wrapper p-6 space-y-12">
        <!-- Doanh số -->
        <section>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">📊 Thống kê doanh số</h1>
        <div class="bg-white shadow rounded-xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
            <h2 class="text-white text-lg font-semibold">Doanh số theo tháng</h2>
            </div>
            <div class="p-6 overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">Tháng</th>
                    <th class="px-6 py-3 text-left">Số lượng bán</th>
                    <th class="px-6 py-3 text-left">Doanh thu</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
                <?php
                $data = [
                    ["Tháng 1", 150, 30000000],
                    ["Tháng 2", 120, 25000000],
                    ["Tháng 3", 180, 40000000],
                    ["Tháng 4", 210, 45000000],
                    ["Tháng 5", 190, 38000000],
                    ["Tháng 6", 230, 50000000],
                ];
                $totalRevenue = 0;
                foreach ($data as $row):
                    $totalRevenue += $row[2];
                ?>
                <tr>
                    <td class="px-6 py-4"><?= $row[0] ?></td>
                    <td class="px-6 py-4"><?= $row[1] ?></td>
                    <td class="px-6 py-4 text-green-600 font-semibold"><?= number_format($row[2], 0, ',', '.') ?> VNĐ</td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr class="bg-gray-100">
                    <td colspan="2" class="px-6 py-4 font-bold">Tổng doanh thu</td>
                    <td class="px-6 py-4 text-green-700 font-bold"><?= number_format($totalRevenue, 0, ',', '.') ?> VNĐ</td>
                </tr>
                </tfoot>
            </table>
            </div>
        </div>
        </section>

        <!-- Danh mục và Người dùng -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white shadow rounded-xl">
            <div class="px-6 py-4 border-b"><h2 class="font-semibold text-gray-700">📁 Danh mục</h2></div>
            <div class="p-4 overflow-x-auto">
            <table class="min-w-full text-sm divide-y">
                <thead class="bg-gray-50">
                <tr><th class="px-4 py-2">Tên</th><th class="px-4 py-2">Mô tả</th></tr>
                </thead>
                <tbody>
                <?php foreach ($listDanhMuc as $dm): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700"><?= $dm['ten'] ?></td>
                    <td class="px-4 py-2 text-gray-500"><?= $dm['mieuta'] ?></td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>

        <div class="bg-white shadow rounded-xl">
            <div class="px-6 py-4 border-b"><h2 class="font-semibold text-gray-700">👤 Người dùng</h2></div>
            <div class="p-4 overflow-x-auto">
            <table class="min-w-full text-sm divide-y">
                <thead class="bg-gray-50">
                <tr><th class="px-4 py-2">Tên</th><th class="px-4 py-2">Email</th></tr>
                </thead>
                <tbody>
                <?php foreach ($listKhachHang as $user): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700"><?= $user['ten'] ?></td>
                    <td class="px-4 py-2 text-gray-500"><?= $user['email'] ?></td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        </section>

        <!-- Sản phẩm mới nhất -->
        <section>
        <div class="bg-white shadow rounded-xl">
            <div class="px-6 py-4 border-b"><h2 class="font-semibold text-gray-700">📦 Sản phẩm mới nhất</h2></div>
            <div class="p-4 overflow-x-auto">
            <table class="min-w-full text-sm divide-y">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2">Tên</th>
                    <th class="px-4 py-2">Giá</th>
                    <th class="px-4 py-2">Số lượng</th>
                    <th class="px-4 py-2">Danh mục</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listSanPham as $sp): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700"><?= $sp['ten'] ?></td>
                    <td class="px-4 py-2 text-green-600 font-semibold"><?= number_format($sp['gia_coso'], 0, ',', '.') ?>đ</td>
                    <td class="px-4 py-2"><?= $sp['cosan_stock'] ?></td>
                    <td class="px-4 py-2 text-gray-500"><?= $sp['ten_danhmuc'] ?></td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        </section>

        <!-- Đơn hàng gần đây -->
        <section>
        <div class="bg-white shadow rounded-xl">
            <div class="px-6 py-4 border-b"><h2 class="font-semibold text-gray-700">🧾 Đơn hàng gần đây</h2></div>
            <div class="p-4 overflow-x-auto">
            <table class="min-w-full text-sm divide-y">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2">Mã đơn</th>
                    <th class="px-4 py-2">Khách hàng</th>
                    <th class="px-4 py-2">Ngày đặt</th>
                    <th class="px-4 py-2">Trạng thái</th>
                    <th class="px-4 py-2">Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listOrders as $order): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2"><?= $order['id'] ?></td>
                    <td class="px-4 py-2"><?= $order['ten_khach_hang'] ?? 'N/A' ?></td>
                    <td class="px-4 py-2"><?= $order['ngay_dat'] ?></td>
                    <td class="px-4 py-2">
                    <span class="inline-block px-2 py-1 rounded-full
                        <?= $order['trang_thai'] == 'chua_xu_ly' ? 'bg-yellow-200 text-yellow-800' :
                        ($order['trang_thai'] == 'dang_giao' ? 'bg-blue-200 text-blue-800' :
                        ($order['trang_thai'] == 'da_giao' ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800')) ?>">
                        <?= ucfirst(str_replace('_', ' ', $order['trang_thai'])) ?>
                    </span>
                    </td>
                    <td class="px-4 py-2 text-red-600 font-semibold"><?= number_format($order['tong_tien'], 0, ',', '.') ?>đ</td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        </section>

        <!-- Bình luận -->
        <section>
        <div class="bg-white shadow rounded-xl">
            <div class="px-6 py-4 border-b"><h2 class="font-semibold text-gray-700">💬 Bình luận gần đây</h2></div>
            <div class="p-4 overflow-x-auto">
            <table class="min-w-full text-sm divide-y">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2">Nội dung</th>
                    <th class="px-4 py-2">Người dùng</th>
                    <th class="px-4 py-2">Sản phẩm</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listBinhLuan as $bl): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700"><?= htmlspecialchars($bl['noi_dung']) ?></td>
                    <td class="px-4 py-2 text-gray-500"><?= $bl['id_nguoi_dung'] ?></td>
                    <td class="px-4 py-2 text-gray-500"><?= $bl['id_san_pham'] ?></td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
        </section>
    </div>
</div>
<?php include './views/layout/footer.php'; ?>
</body>
</html>
