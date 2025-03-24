<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Entri produk baru
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Menyimpan produk ke dalam session
    $_SESSION['produk'][] = ['nama' => $nama, 'harga' => $harga, 'stok' => $stok];
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Entri Data Produk</h1>

    <form method="post">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama_produk" required>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required>

        <label for="stok">Stok:</label>
        <input type="number" name="stok" required>

        <input type="submit" value="Simpan Produk">
    </form>
