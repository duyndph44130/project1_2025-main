<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Đăng Nhập</h2>
        <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
            <div class="mb-4">
                <label for="email" class="block text-gray-600 mb-2">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nhập email">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 mb-2">Mật khẩu:</label>
                <input type="password" name="mat_khau" id="mat_khau" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nhập mật khẩu">
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg transition duration-300">Đăng Nhập</button>
            <p class="text-gray-600 mt-4 text-center">Chưa có tài khoản? <a href="register.php" class="text-blue-500 hover:underline">Đăng ký ngay</a></p>
        </form>
    </div>
</body>

</html>