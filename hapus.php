<?php
include 'koneksi.php';

$id = $_GET['id'];
if ($id) {
    // Eksekusi penghapusan
    $query = mysqli_query($koneksi, "DELETE FROM tb_inventory WHERE id_barang = $id");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='index.php';</script>";
}
