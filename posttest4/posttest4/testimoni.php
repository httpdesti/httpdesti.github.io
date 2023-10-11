<?php
$pesan = ''; // Pesan awal kosong

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $ulasan = $_POST["ulasan"];

    // Validasi sederhana
    if (empty($nama) || empty($email) || empty($ulasan)) {
        $pesan = '<p style="color: red;">Silakan lengkapi semua field.</p>';
    } else {
        // Simpan review ke dalam file teks, contoh: 'reviews.txt'
        $review = "Nama: $nama, Email: $email, Ulasan: $ulasan";
        file_put_contents('reviews.txt', $review . "\n", FILE_APPEND);
        $pesan = '<p style="color: green;">Terima kasih atas ulasan Anda! Ulasan Anda sudah terekam.</p>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Review</title>
    <link rel="stylesheet" type="text/css" href="testimoni.css"> 
</head>
<body>

<h1>Input Review Produk</h1>

<?php
echo $pesan; // Menampilkan pesan
?>

<form method="post">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="ulasan">Ulasan:</label>
    <textarea name="ulasan" rows="4" cols="50" required></textarea><br>

    <input type="submit" value="Kirim Ulasan">
</form>

</body>
</html>


