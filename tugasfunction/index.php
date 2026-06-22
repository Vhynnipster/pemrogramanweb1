<!DOCTYPE html>
<html>
<head>
    <title>gass langsung sajaa</title>
</head>
<body>

    <h2>Input Data</h2>
    <form method="post" action="">
        <input type="text" name="kata" placeholder="Masukkan nama" required>
        <input type="number" name="alas" placeholder="Masukkan alas (cm)" required>
        <input type="number" name="tinggi" placeholder="Masukkan tinggi (cm)" required>
        <button type="submit" name="submit">Proses</button>
    </form>

    <?php
    function sapaPengguna($nama) {
        return "Halo, selamat datang " . strtoupper($nama);
    }

    function hitungLuasSegitiga($alas, $tinggi) {
        return 0.5 * $alas * $tinggi;
    }
    function cekStatusUkuran($luas) {
        return ($luas > 50) ? "Area luas" : "Area kecil";
    }

    if (isset($_POST['submit'])) {
        $inputKata = $_POST['kata'];
        $alas = $_POST['alas'];
        $tinggi = $_POST['tinggi'];

        $hasilSapa = sapaPengguna($inputKata);
        $hasilLuas = hitungLuasSegitiga($alas, $tinggi);
        $hasilStatus = cekStatusUkuran($hasilLuas);

        echo "<h3>Hasil:</h3>";
        echo "<p>$hasilSapa</p>";
        echo "<p>Luas Segitiga: $hasilLuas cm²</p>";
        echo "<p>Status Ukuran: $hasilStatus</p>";
    }
    ?>

</body>
</html>
