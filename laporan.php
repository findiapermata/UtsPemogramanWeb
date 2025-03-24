<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan dan Stok</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Laporan Penjualan & Stok</h1>

    <h2>Stok Produk</h2>
    <table border="1">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        if (isset($_SESSION['produk']) && !empty($_SESSION['produk'])) {
            foreach ($_SESSION['produk'] as $produk) {
                echo "<tr>
                        <td>{$produk['nama']}</td>
                        <td>Rp " . number_format($produk['harga'], 0, ',', '.') . "</td>
                        <td>{$produk['stok']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Data produk belum tersedia.</td></tr>";
        }
        ?>
    </table>

    <h2>Rekapitulasi Penjualan</h2>
    <table border="1">
        <tr>
            <th>Produk</th>
            <th>Pelanggan</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
        if (isset($_SESSION['transaksi']) && !empty($_SESSION['transaksi'])) {
            $total_penjualan = 0;
            foreach ($_SESSION['transaksi'] as $transaksi) {
                echo "<tr>
                        <td>{$transaksi['produk']}</td>
                        <td>{$transaksi['pelanggan']}</td>
                        <td>{$transaksi['jumlah']}</td>
                        <td>Rp " . number_format($transaksi['total'], 0, ',', '.') . "</td>
                      </tr>";
                $total_penjualan += $transaksi['total'];
            }
            echo "<tr>
                    <td colspan='3'><strong>Total Penjualan</strong></td>
                    <td><strong>Rp " . number_format($total_penjualan, 0, ',', '.') . "</strong></td>
                  </tr>";
        } else {
            echo "<tr><td colspan='4'>Belum ada transaksi.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
