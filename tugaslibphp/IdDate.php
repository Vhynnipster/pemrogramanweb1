<?php
// File: IdDate.php

class IdDate {
    private static $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    private static $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Format: Senin, 22 Juni 2026
    public static function format($tanggal) {
        $time = strtotime($tanggal);
        
        // Validasi: kalau format tanggal salah
        if ($time === false) {
            return "❌ Format tanggal tidak valid!";
        }
        
        $hari = self::$hari[date('w', $time)];
        $tgl  = date('j', $time);
        $bln  = self::$bulan[date('n', $time)];
        $thn  = date('Y', $time);
        return "$hari, $tgl $bln $thn";
    }

    // Selisih waktu: "3 hari yang lalu"
    public static function waktuLalu($tanggal) {
        $time = strtotime($tanggal);
        if ($time === false) return "❌ Format tanggal tidak valid!";
        
        $selisih = time() - $time;
        
        // Kalau waktunya di masa depan
        if ($selisih < 0) {
            $selisih = abs($selisih);
            $prefix = "dalam ";
            $suffix = " lagi";
        } else {
            $prefix = "";
            $suffix = " yang lalu";
        }
        
        if ($selisih < 60) return "Baru saja";
        if ($selisih < 3600) return $prefix . floor($selisih/60) . " menit" . $suffix;
        if ($selisih < 86400) return $prefix . floor($selisih/3600) . " jam" . $suffix;
        if ($selisih < 2592000) return $prefix . floor($selisih/86400) . " hari" . $suffix;
        if ($selisih < 31536000) return $prefix . floor($selisih/2592000) . " bulan" . $suffix;
        return $prefix . floor($selisih/31536000) . " tahun" . $suffix;
    }

    // Cek tahun kabisat
    public static function kabisat($tahun) {
        return ($tahun % 4 == 0 && ($tahun % 100 != 0 || $tahun % 400 == 0));
    }
}