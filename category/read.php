<?php
include_once __DIR__ . '/../template/header/header_book.php';
require_once __DIR__ . '/../functions/penting.php';
?>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="bg-100">
    <div class="container">

        <?php
        $id_buku = $_GET['id_buku'];
        $sql = mysqli_query($con, "SELECT * FROM hlmnbuku WHERE id_buku = '$id_buku'");
        $data = mysqli_fetch_array($sql);
        ?>
        <div class="container bg-400">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="<?= $_ENV['LINK_WEB'] ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="<?= $_ENV['LINK_WEB'] ?>category/mybook.php">My Book</a></li>
                <li class="breadcrumb-item active" aria-current="page">Read</li>
            </ol>
        </div>
        <div class="text-center" data-zanim-xs='{"delay":0}'>
            <h2 data-zanim-xs='{"delay":0.1}'><?= $data['judulbuku'] ?></h2>
            <p data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
        </div>
        <iframe data-zanim-xs='{"delay":0.1}' src="../assets/pdf/<?= $data['file_buku'] ?>" width="1100" height="1000"></iframe>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<?php
include_once __DIR__ . '/../template/footer/footer_book.php';
?>