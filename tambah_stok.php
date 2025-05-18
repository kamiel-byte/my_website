<?php
include 'koneksi.php';

$id = $_GET['id']; // id_barang yang ditambahkan stoknya
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_inventory WHERE id_barang=$id"));

$error = "";
$sukses = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_tambah = (int) $_POST['jumlah_tambah'];

    if ($jumlah_tambah < 1) {
        $error = "Jumlah penambahan harus minimal 1.";
    } else {
        $jumlah_baru = $data['jumlah_barang'] + $jumlah_tambah;
        $status_baru = 1; // setelah ditambah pasti Available

        mysqli_query($koneksi, "UPDATE tb_inventory 
            SET jumlah_barang=$jumlah_baru, status_barang=$status_baru 
            WHERE id_barang=$id");

        $sukses = "Stok berhasil ditambahkan sebanyak $jumlah_tambah";
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penambahan Stok Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Stok - <?= htmlspecialchars($data['nama_barang']) ?></h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Stok Saat Ini</label>
            <input type="number" class="form-control" value="<?= $data['jumlah_barang'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah yang Ditambahkan</label>
            <input type="number" name="jumlah_tambah" class="form-control" required min="1">
        </div>
        <button type="submit" class="btn btn-success">Tambah Stok</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
