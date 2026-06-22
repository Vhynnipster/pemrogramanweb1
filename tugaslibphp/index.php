<?php
require_once 'IdDate.php';

echo '<h2>Test Library IdDate</h2>';

echo '<h3>1. Format Tanggal</h3>';
echo IdDate::format('2026-06-22');

echo '<br><br>';

echo '<h3>2. Waktu yang Lalu</h3>';
echo IdDate::waktuLalu('2026-06-20 10:00:00');

echo '<br><br>';

echo '<h3>3. Cek Tahun Kabisat</h3>';
$tahun = 2024;
if (IdDate::kabisat($tahun)) {
    echo "Tahun $tahun adalah <b>KABISAT</b>";
} else {
    echo "Tahun $tahun <b>BUKAN</b> kabisat";
}
