<?php
include 'koneksi.php';

$id = $_GET['id']; // id_barang yang dipakai
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_inventory WHERE id_barang=$id"));

$error = "";
$sukses = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_pakai = (int) $_POST['jumlah_pakai'];

    if ($jumlah_pakai > $data['jumlah_barang']) {
        $error = "Stok tidak mencukupi untuk pemakaian tersebut!";
    } else {
        $jumlah_baru = $data['jumlah_barang'] - $jumlah_pakai;
        $status_baru = ($jumlah_baru == 0) ? 0 : 1;

        mysqli_query($koneksi, "UPDATE tb_inventory 
            SET jumlah_barang=$jumlah_baru, status_barang=$status_baru 
            WHERE id_barang=$id");

        $sukses = "Stok berhasil dikurangi sebanyak $jumlah_pakai";
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pemakaian Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Pemakaian Barang - <?= htmlspecialchars($data['nama_barang']) ?></h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Jumlah Stok Tersedia</label>
            <input type="number" class="form-control" value="<?= $data['jumlah_barang'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah yang Dipakai</label>
            <input type="number" name="jumlah_pakai" class="form-control" required min="1">
        </div>
        <button type="submit" class="btn btn-primary">Kurangi Stok</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
