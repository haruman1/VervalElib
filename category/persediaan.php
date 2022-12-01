<?php
include_once __DIR__ . '/../template/header/header_book.php';
require_once __DIR__ . '/../functions/penting.php';


if (isset($_GET['id_buku'])) {
    $idBuku = $_GET['id_buku'];
    $funcSql = "SELECT stokBuku('$idBuku')";
    $funcResult = mysqli_query($con, $funcSql);
    $persediaan = mysqli_fetch_array($funcResult);
}

?>
<!-- ============================================-->
<!-- <section> begin ============================-->
<section>
    <div class="bg-holder overlay" style="background-image:url(../assets/img/background-2.jpg);background-position:center bottom;"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row pt-6" data-inertia='{"weight":1.5}'>
            <div class="col-md-8 text-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <div class="overflow-hidden">
                    <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'>Cek Stok Buku</h1>
                    <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
                        <ol class="breadcrumb fs-1 ps-0 fw-bold">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cek Stok Buku</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="bg-100">
    <div class="container">
        <div class="row g-0 mb-5">
            <?php
            $sql = "SELECT * FROM hlmnbuku WHERE judulbuku= '" . $_GET['judulbuku'] . "'";
            $result = mysqli_query($con, $sql);
            $queryResults = mysqli_num_rows($result);
            if ($queryResults > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-lg-2 px-3 py-3 my-lg-2 bg-white position-relative">
                        <a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
                            <img class="card-img mb-2" src="<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
                        </a>
                    </div>
                    <div class="col-lg-4 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
                        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
                                <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
                            </a>
                            <div class="overflow-hidden">
                                <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
                            </div>
                            <div class="overflow-hidden">
                                <?php
                                $str = $data['textbuku'];
                                if (strlen($str) > 10)
                                    $str = substr($str, 0, 100) . '...';
                                ?>
                                <p class="mt-3" data-zanim-xs='{"delay":0.2}'><?= $str ?></p>
                            </div>
                            <p class="btn-outline-info btn" href=""><?php echo $persediaan[0] ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<?php
include_once __DIR__ . '/../template/footer/footer_book.php';
?>