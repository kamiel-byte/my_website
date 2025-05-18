<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_inventory WHERE id_barang=$id"));

$error = "";
$sukses = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah_barang'];
    $satuan = $_POST['satuan_barang'];
    $harga = $_POST['harga_beli'];
    $status = $_POST['status_barang'];

    if ($kode && $nama && $jumlah !== "" && $satuan && $harga !== "") {
        $query = "UPDATE tb_inventory SET 
                    kode_barang='$kode', 
                    nama_barang='$nama', 
                    jumlah_barang=$jumlah, 
                    satuan_barang='$satuan', 
                    harga_beli=$harga, 
                    status_barang=$status 
                  WHERE id_barang=$id";
        mysqli_query($koneksi, $query);
        header("Location: index.php");
        exit;
    } else {
        $error = "Semua field wajib diisi.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Barang - <?= htmlspecialchars($data['nama_barang']) ?></h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required value="<?= htmlspecialchars($data['kode_barang']) ?>">
        </div>

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required value="<?= htmlspecialchars($data['nama_barang']) ?>">
        </div>

        <div class="mb-3">
            <label>Jumlah Barang</label>
            <input type="number" name="jumlah_barang" class="form-control" required value="<?= $data['jumlah_barang'] ?>">
        </div>

        <div class="mb-3">
            <label>Satuan Barang</label>
            <select name="satuan_barang" class="form-select" required>
                <option value="Pcs" <?= $data['satuan_barang'] == 'Pcs' ? 'selected' : '' ?>>Pcs</option>
                <option value="Unit" <?= $data['satuan_barang'] == 'Unit' ? 'selected' : '' ?>>Unit</option>
                <option value="Meter" <?= $data['satuan_barang'] == 'Meter' ? 'selected' : '' ?>>Meter</option>
                <option value="Rim" <?= $data['satuan_barang'] == 'Rim' ? 'selected' : '' ?>>Rim</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" required value="<?= $data['harga_beli'] ?>">
        </div>

        <div class="mb-3">
            <label>Status Barang</label><br>
            <label><input type="radio" name="status_barang" value="1" <?= $data['status_barang'] == 1 ? 'checked' : '' ?>> Available</label>
            <label class="ms-3"><input type="radio" name="status_barang" value="0" <?= $data['status_barang'] == 0 ? 'checked' : '' ?>> Not-Available</label>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
