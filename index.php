<?php
include 'koneksi.php';

$kode_barang = $nama_barang = $jumlah_barang = $harga_barang = $status_barang = $satuan_barang = "";
$error = $sukses = "";

if (isset($_POST['submit'])) {
    $kode_barang   = $_POST['kode_barang'];
    $nama_barang   = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $harga_barang  = $_POST['harga_beli'];
    $status_barang = $_POST['status_barang'];
    $satuan_barang = $_POST['satuan_barang'];

    if ($kode_barang && $nama_barang && $harga_barang && $status_barang !== "" && $satuan_barang) {
        $sql1 = "INSERT INTO tb_inventory 
            (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang)
            VALUES ('$kode_barang','$nama_barang','$jumlah_barang','$satuan_barang','$harga_barang','$status_barang')";
        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            $sukses = "Berhasil Memasukkan data baru";
        } else {
            $error = "Gagal Memasukkan data baru";
        }

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .mx-auto { width: 800px;}
        .card { margin-top: 15px;}
    </style>
</head>
<body>


    <div class="mx-aucontainer mt-4">
    <h3 class="text-center mb-4">Data Base Inventory</h3></div>
        <!-- Form Tambah Data -->
        <div class="card">
            <div class="card-header">Tambah Data Barang</div>
            <div class="card-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php endif; ?>

                <?php if ($sukses): ?>
                    <div class="alert alert-success" role="alert"><?= $sukses ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= htmlspecialchars($kode_barang) ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($nama_barang) ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= htmlspecialchars($jumlah_barang) ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="satuan_barang" class="col-sm-2 col-form-label">Satuan Barang</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="satuan_barang" name="satuan_barang">
                                <option value="">- Pilih Satuan -</option>
                                <option value="Pcs" <?= $satuan_barang == "Pcs" ? "selected" : "" ?>>Pcs</option>
                                <option value="Unit" <?= $satuan_barang == "Unit" ? "selected" : "" ?>>Unit</option>
                                <option value="Meter" <?= $satuan_barang == "Meter" ? "selected" : "" ?>>Meter</option>
                                <option value="Rim" <?= $satuan_barang == "Rim" ? "selected" : "" ?>>Rim</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                        <div class="col-sm-10">
                            <input name="harga_beli" type="number" step="0.01" class="form-control" placeholder="Harga Beli" required value="<?= htmlspecialchars($harga_barang) ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Status Barang</label>
                        <div class="col-sm-10">
                            <label class="form-check-label me-3">
                                <input type="radio" name="status_barang" value="1" <?= $status_barang == "1" ? "checked" : "" ?>> Available
                            </label>
                            <label class="form-check-label">
                                <input type="radio" name="status_barang" value="0" <?= $status_barang == "0" ? "checked" : "" ?>> Not-Available
                            </label>
                        </div>
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!--  Menampilkan Data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">Data Barang</div>
            <div class="card-body">
                 <div class="card-body">
                    <table class="table table=bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql2 ="SELECT * FROM tb_inventory ORDER BY id_barang DESC";
                            $q2 = mysqli_query($koneksi, $sql2);
                            while ($row = mysqli_fetch_assoc($q2)){
                                ?>
                                <tr>
                                    <td><?= $row['id_barang']?></td>
                                    <td><?=htmlspecialchars($row['kode_barang'])?></td>
                                    <td><?=htmlspecialchars($row['nama_barang'])?></td>
                                    <td><?= $row['jumlah_barang'] ?></td>
                                    <td><?= $row['satuan_barang'] ?></td>
                                    <td>Rp <?= number_format($row['harga_beli'], 2, ',' , ',')?></td>
                                    <td>
                                        <!--Menambahkan button-->
                                        <a href="edit.php?id=<?=$row['id_barang']?>"class="btn btn-sm btn-info">Edit</a>
                                        <a href="hapus.php?id=<?=$row['id_barang']?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                                        <a href="pakai.php?id=<?=$row['id_barang']?>" class="btn btn-sm btn-warning">Pakai</a>
                                        <a href="tambah_stok.php?id=<?=$row['id_barang']?>"class="btn btn-sm btn-success">+ Stok</a>
                                        <!--####-->>

                                        <span class="badge <?= $row['status_barang'] ? 'bg-success' : 'bg-danger' ?>">
                                            <?= $row['status_barang'] ? 'Available' : 'Not-Available' ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php
                            }?>
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</body>
</html>
