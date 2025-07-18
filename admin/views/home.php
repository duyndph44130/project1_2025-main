<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="content-wrapper bg-gray-100 min-h-screen">
    <section class="content-header py-6">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">📊 Báo cáo thống kê doanh số</h1>

            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                    <h2 class="text-white text-xl font-semibold">Thống kê doanh số theo tháng</h2>
                </div>
                <div class="p-6 overflow-x-auto">
                    <table class="w-full text-left border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-6 py-3 border-b">Tháng</th>
                                <th class="px-6 py-3 border-b">Số lượng bán</th>
                                <th class="px-6 py-3 border-b">Doanh thu (VNĐ)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            $data = [
                                ["Tháng 1", 150, 30000000],
                                ["Tháng 2", 120, 25000000],
                                ["Tháng 3", 180, 40000000],
                                ["Tháng 4", 210, 45000000],
                                ["Tháng 5", 190, 38000000],
                                ["Tháng 6", 230, 50000000]
                            ];
                            $totalRevenue = 0;
                            foreach ($data as $row) {
                                $totalRevenue += $row[2];
                                echo "<tr class='hover:bg-blue-50 transition'>
                                    <td class='px-6 py-4 border-b'>{$row[0]}</td>
                                    <td class='px-6 py-4 border-b'>{$row[1]}</td>
                                    <td class='px-6 py-4 border-b font-semibold text-green-600'>" . number_format($row[2], 0, ',', '.') . " VNĐ</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-50 font-semibold text-gray-800">
                                <td class="px-6 py-4 border-t" colspan="2">Tổng doanh thu</td>
                                <td class="px-6 py-4 border-t text-green-700"><?php echo number_format($totalRevenue, 0, ',', '.'); ?> VNĐ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
