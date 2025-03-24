<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Entri pelanggan baru
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Menyimpan pelanggan ke dalam session
    $_SESSION['pelanggan'][] = ['nama' => $nama, 'alamat' => $alamat, 'telepon' => $telepon];
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Entri Data Pelanggan</h1>

    <form method="post">
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>

        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" required>

        <input type="submit" value="Simpan Pelanggan">
    </form>

    <h2>Daftar Pelanggan</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
        <?php
        if (isset($_SESSION['pelanggan'])) {
            foreach ($_SESSION['pelanggan'] as $pelanggan) {
                echo "<tr><td>{$pelanggan['nama']}</td><td>{$pelanggan['alamat']}</td><td>{$pelanggan['telepon']}</td></tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>