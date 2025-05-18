<?php
//UTS Pemrograman WEB II
// Nama : Ayu Kamillah
// NIM : 230401020015
// Kelas : IF401
// Pemrograman Web II

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_inventory";

$koneksi= mysqli_connect($host, $user, $pass, $db);
if (! $koneksi) {
    die("Koneksi gagal: ". mysqli_connect_error());
}
$kode_barang   ="";
$nama_barang   = "";
$jumlah_barang  = "";
$satuan_barang  = "";
$harga_barang   = "";
$status_barang = "";
$sukses ="";
$error ="";
?>

