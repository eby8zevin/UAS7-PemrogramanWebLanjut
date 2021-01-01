<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$koneksi->query("DELETE FROM tugas_data WHERE id_data='$id'");

echo "<script>alert('Data berhasil dihapus.');</script>";
echo "<script>location='index.php?datadihapus=sukses';</script>";
?>
