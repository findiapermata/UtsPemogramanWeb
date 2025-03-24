<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Entri transaksi penjualan baru
    $produk_id = $_POST['produk_id'];
    $pelanggan_id = $_POST['pelanggan_id'];
    $jumlah = $_POST['jumlah'];
    
    // Mendapatkan produk dan pelanggan
    $produk = $_SESSION['produk'][$produk_id];
    $pelanggan = $_SESSION['pelanggan'][$pelanggan_id];
    
    // Menghitung total harga
    $total = $produk['harga'] * $jumlah;
    
    // Menyimpan transaksi ke dalam session
    $_SESSION['transaksi'][] = ['produk' => $produk['nama'], 'pelanggan' => $pelanggan['nama'], 'jumlah' => $jumlah, 'total' => $total];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Transaksi Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Entri Transaksi Penjualan</h1>

    <form method="post">
        <label for="produk_id">Pilih Produk:</label>
        <select name="produk_id" required>
            <?php
            if (isset($_SESSION['produk'])) {
                foreach ($_SESSION['produk'] as $index => $produk) {
                    echo "<option value='{$index}'>{$produk['nama']} (Rp {$produk['harga']})</option>";
                }
            }
            ?>
        </select>

        <label for="pelanggan_id">Pilih Pelanggan:</label>
        <select name="pelanggan_id" required>
            <?php
            if (isset($_SESSION['pelanggan'])) {
                foreach ($_SESSION['pelanggan'] as $index => $pelanggan) {
                    echo "<option value='{$index}'>{$pelanggan['nama']}</option>";
                }
            }
            ?>
        </select>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" required>

        <input type="submit" value="Simpan Transaksi">
    </form>

    <h2>Daftar Transaksi</h2>
    <table>
        <tr>
            <th>Produk</th>
            <th>Pelanggan</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
        if (isset($_SESSION['transaksi'])) {
            foreach ($_SESSION['transaksi'] as $transaksi) {
                echo "<tr><td>{$transaksi['produk']}</td><td>{$transaksi['pelanggan']}</td><td>{$transaksi['jumlah']}</td><td>Rp {$transaksi['total']}</td></tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>