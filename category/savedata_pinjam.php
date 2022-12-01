<?php
require_once __DIR__ . '/../functions/penting.php';

$id_buku = htmlspecialchars($_POST['id_buku']);
$judulbuku = htmlspecialchars($_POST['judulbuku']);
$file_buku = htmlspecialchars($_POST['file_buku']);
$tanggal_peminjaman = htmlspecialchars($_POST['tanggal_peminjaman']);
$tanggal_pengembalian = htmlspecialchars($_POST['tanggal_pengembalian']);


$sql = mysqli_query($con, "INSERT INTO transaksiBuku (id, id_buku, judulbuku, file_buku, tanggal_peminjaman, tanggal_pengembalian) VALUES(null, '$id_buku', '$judulbuku', '$file_buku', '$tanggal_peminjaman', '$tanggal_pengembalian')");

if ($sql) {
    $file_penting->add_with_swal('success', 'Berhasil Meminjam Buku', 'success', 'category/mybook.php');
} else {
    $file_penting->add_with_swal('success', 'Data Gagal ditambah', 'Success', 'category/borrow.php');
}
