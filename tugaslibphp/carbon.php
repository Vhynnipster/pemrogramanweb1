<?php
require __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;

// Tanggal sekarang
$now = Carbon::now();
echo $now; // 2026-06-22 10:30:00

// Format tanggal
echo $now->format('d-m-Y'); // 22-06-2026
echo $now->isoFormat('dddd, D MMMM YYYY'); // Minggu, 22 Juni 2026

// Tambah/kurang hari
$besok = Carbon::tomorrow();
echo $besok; // 2026-06-23 00:00:00

$lusa = Carbon::now()->addDays(2);
echo $lusa; // 2026-06-24 10:30:00

// Selisih waktu
$lahir = Carbon::create(2000, 1, 1);
$umur = $lahir->age;
echo "Umur: $umur tahun"; // Umur: 26 tahun

// Human readable
echo Carbon::now()->subHours(2)->diffForHumans(); // 2 jam yang lalu