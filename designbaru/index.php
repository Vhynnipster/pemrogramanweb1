<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>PinPurple • Beranda</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="font-poppins bg-black text-white min-h-screen">

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-purple-500/20 px-4 py-3">
    <div class="flex items-center gap-4">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-fuchsia-600 flex items-center justify-center shadow-neon-purple">
                <i class="fab fa-pinterest-p text-white text-lg"></i>
            </div>
            <span class="hidden md:block text-xl font-bold">
                Pin<span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-fuchsia-500">Purple</span>
            </span>
        </div>

        <!-- Menu -->
        <div class="hidden md:flex items-center gap-1">
            <button class="px-4 py-2 bg-purple-600 text-white rounded-full font-semibold shadow-neon-purple">Beranda</button>
            <button class="px-4 py-2 text-gray-300 hover:bg-purple-900/50 rounded-full font-medium transition">Jelajahi</button>
            <button class="px-4 py-2 text-gray-300 hover:bg-purple-900/50 rounded-full font-medium transition">Buat</button>
        </div>

        <!-- Search -->
        <div class="flex-1 relative">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-purple-400"></i>
            <input type="text" id="searchInput" placeholder="Cari inspirasi..."
                class="w-full bg-purple-950/50 border border-purple-500/30 rounded-full pl-12 pr-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 focus:shadow-neon-purple transition-all">
        </div>

        <!-- Icons -->
        <div class="flex items-center gap-2">
            <button class="w-10 h-10 rounded-full hover:bg-purple-900/50 flex items-center justify-center transition relative">
                <i class="fas fa-bell text-gray-300"></i>
                <span class="absolute top-1 right-1 w-2 h-2 bg-fuchsia-500 rounded-full shadow-neon-fuchsia"></span>
            </button>
            <button class="w-10 h-10 rounded-full hover:bg-purple-900/50 flex items-center justify-center transition">
                <i class="fas fa-comment text-gray-300"></i>
            </button>
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-fuchsia-600 flex items-center justify-center shadow-neon-purple cursor-pointer">
                <span class="font-bold">U</span>
            </div>
        </div>
    </div>
</nav>

<!-- Category Chips -->
<div class="fixed top-[72px] left-0 right-0 z-40 bg-black/80 backdrop-blur-md border-b border-purple-500/10 px-4 py-3 overflow-x-auto">
    <div class="flex gap-2 whitespace-nowrap">
        <button class="chip chip-active">Semua</button>
        <button class="chip">🎨 Desain</button>
        <button class="chip">📸 Fotografi</button>
        <button class="chip">🏠 Dekorasi</button>
        <button class="chip">👗 Fashion</button>
        <button class="chip">🍕 Makanan</button>
        <button class="chip">✈️ Travel</button>
        <button class="chip">💻 Teknologi</button>
        <button class="chip">🎮 Gaming</button>
        <button class="chip">🎵 Musik</button>
        <button class="chip">📚 Buku</button>
        <button class="chip">🌿 Alam</button>
    </div>
</div>

<!-- Masonry Grid -->
<main class="pt-[140px] px-3 pb-10">
    <div id="masonry" class="masonry">
        <!-- Pins akan di-generate via JS -->
    </div>

    <div class="text-center py-8">
        <button id="loadMore" class="px-8 py-3 bg-gradient-to-r from-purple-600 to-fuchsia-600 rounded-full font-semibold shadow-neon-purple hover:shadow-neon-fuchsia transition-all transform hover:scale-105">
            <i class="fas fa-sync-alt mr-2"></i> Muat Lebih Banyak
        </button>
    </div>
</main>

<!-- Pin Detail Modal -->
<div id="pinModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/80 backdrop-blur-sm p-4">
    <div class="glass-card rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-y-auto grid md:grid-cols-2 shadow-neon-purple">
        <div class="bg-gradient-to-br from-purple-900 to-fuchsia-900 flex items-center justify-center min-h-[300px] md:min-h-full">
            <img id="modalImage" src="" alt="" class="w-full h-full object-cover rounded-t-3xl md:rounded-l-3xl md:rounded-tr-none">
        </div>
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex gap-2">
                    <button class="w-10 h-10 rounded-full hover:bg-purple-900/50 flex items-center justify-center"><i class="fas fa-share"></i></button>
                    <button class="w-10 h-10 rounded-full hover:bg-purple-900/50 flex items-center justify-center"><i class="fas fa-ellipsis-h"></i></button>
                </div>
                <button onclick="closeModal()" class="w-10 h-10 rounded-full hover:bg-purple-900/50 flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-fuchsia-600"></div>
                <div>
                    <p class="font-semibold">Nama Pengguna</p>
                    <p class="text-xs text-gray-400">1.2k followers</p>
                </div>
                <button class="ml-auto px-4 py-2 bg-gradient-to-r from-purple-600 to-fuchsia-600 rounded-full text-sm font-semibold shadow-neon-purple">Ikuti</button>
            </div>

            <h2 id="modalTitle" class="text-2xl font-bold mb-3">Judul Pin</h2>
            <p id="modalDesc" class="text-gray-300 mb-4">Deskripsi pin akan muncul di sini...</p>

            <div class="flex items-center gap-2 mb-4">
                <input type="text" placeholder="Tambahkan komentar..." class="flex-1 bg-purple-950/50 border border-purple-500/30 rounded-full px-4 py-2 text-sm focus:outline-none focus:border-purple-500">
                <button class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-600 to-fuchsia-600 flex items-center justify-center shadow-neon-purple">
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
            </div>

            <button class="w-full py-3 bg-gradient-to-r from-purple-600 to-fuchsia-600 rounded-full font-semibold shadow-neon-purple hover:shadow-neon-fuchsia transition-all">
                <i class="fas fa-thumbtack mr-2"></i> Simpan
            </button>
        </div>
    </div>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>