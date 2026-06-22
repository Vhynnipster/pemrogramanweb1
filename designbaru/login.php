<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    // Simulasi login (ganti dengan query database)
    if ($email === 'demo@pin.com' && $password === 'demo123') {
        $_SESSION['user'] = $email;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Email atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login • PinPurple</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="font-poppins min-h-screen flex items-center justify-center bg-black overflow-hidden relative">

<!-- Animated Background -->
<div class="absolute inset-0 bg-gradient-to-br from-black via-purple-950 to-black"></div>
<div class="absolute inset-0">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
</div>
<div class="stars"></div>

<div class="relative z-10 w-full max-w-md px-6">
    <!-- Logo -->
    <div class="text-center mb-8 animate-fadeIn">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-purple-500 to-fuchsia-600 shadow-neon-purple mb-4">
            <i class="fab fa-pinterest-p text-white text-4xl"></i>
        </div>
        <h1 class="text-4xl font-bold text-white tracking-wider">
            Pin<span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-fuchsia-500">Purple</span>
        </h1>
        <p class="text-gray-400 text-sm mt-2">Temukan inspirasi tanpa batas</p>
    </div>

    <!-- Login Card -->
    <div class="glass-card rounded-3xl p-8 shadow-neon-purple animate-slideUp">
        <h2 class="text-2xl font-bold text-white text-center mb-2">Selamat Datang Kembali</h2>
        <p class="text-gray-400 text-center text-sm mb-6">Masuk untuk melanjutkan</p>

        <?php if ($error): ?>
            <div class="bg-red-500/10 border border-red-500/50 text-red-300 text-sm rounded-xl p-3 mb-4 text-center">
                <i class="fas fa-exclamation-circle mr-1"></i> <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-5">
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-purple-400"></i>
                <input type="email" name="email" required
                    class="w-full bg-black/50 border border-purple-500/30 rounded-xl pl-12 pr-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 focus:shadow-neon-purple transition-all"
                    placeholder="Email Anda">
            </div>

            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-purple-400"></i>
                <input type="password" name="password" id="password" required
                    class="w-full bg-black/50 border border-purple-500/30 rounded-xl pl-12 pr-12 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 focus:shadow-neon-purple transition-all"
                    placeholder="Password">
                <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-purple-400 hover:text-purple-300">
                    <i class="fas fa-eye" id="eyeIcon"></i>
                </button>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-400 cursor-pointer">
                    <input type="checkbox" class="mr-2 accent-purple-500"> Ingat saya
                </label>
                <a href="#" class="text-purple-400 hover:text-purple-300 hover:underline">Lupa password?</a>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-fuchsia-600 hover:from-purple-500 hover:to-fuchsia-500 text-white font-semibold py-3 rounded-xl shadow-neon-purple hover:shadow-neon-fuchsia transition-all transform hover:scale-[1.02] active:scale-95">
                <i class="fas fa-sign-in-alt mr-2"></i> Masuk
            </button>
        </form>

        <div class="my-6 flex items-center">
            <div class="flex-1 h-px bg-gradient-to-r from-transparent to-purple-500/50"></div>
            <span class="px-4 text-gray-500 text-xs">ATAU</span>
            <div class="flex-1 h-px bg-gradient-to-l from-transparent to-purple-500/50"></div>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <button class="flex items-center justify-center gap-2 bg-black/50 border border-purple-500/30 text-white py-2.5 rounded-xl hover:border-purple-500 hover:shadow-neon-purple transition-all">
                <i class="fab fa-google text-red-400"></i> Google
            </button>
            <button class="flex items-center justify-center gap-2 bg-black/50 border border-purple-500/30 text-white py-2.5 rounded-xl hover:border-purple-500 hover:shadow-neon-purple transition-all">
                <i class="fab fa-facebook text-blue-400"></i> Facebook
            </button>
        </div>

        <p class="text-center text-gray-400 text-sm mt-6">
            Belum punya akun? <a href="#" class="text-purple-400 hover:text-purple-300 font-semibold hover:underline">Daftar</a>
        </p>
    </div>

    <p class="text-center text-gray-600 text-xs mt-6">© 2026 PinPurple. All rights reserved.</p>
</div>

<script>
function togglePassword() {
    const pwd = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        pwd.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
</body>
</html>