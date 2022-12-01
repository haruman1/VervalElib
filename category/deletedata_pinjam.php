<?php
require_once __DIR__ . '/../functions/penting.php';
?>

<?php
if (isset($_GET['id_buku'])) {
    $sql_cek = "select * from mybook where id_buku='" . $_GET['id_buku'] . "'";
    $query_cek = mysqli_query($con, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
} else {
    $file_penting->add_with_swal("error", "Error", "Data yang anda cari tidak ada", "category/mybook.php");
}
?>
<?php
$sql_hapus = "DELETE FROM mybook WHERE id_buku='" . $_GET['id_buku'] . "'";
$query_hapus = mysqli_query($con, $sql_hapus);
if ($query_hapus) {
    $file_penting->add_with_swal("success", "Success", "Delete Success", "category/mybook.php");
} else {
    $file_penting->add_with_swal("error", "Error", "Delete Failed", "category/mybook.php");
}

?>
