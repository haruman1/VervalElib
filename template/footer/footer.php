<?php
require_once __DIR__ . '/../../functions/penting.php';
?>
<!-- ============================================-->
<!-- <section> begin ============================-->
<section style="background-color: #3D4C6F">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-2">
        <a href="<?php echo $_ENV['LINK_WEB'] ?>index.php"><img src="<?php echo $_ENV['LINK_WEB'] ?>assets/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></a>
      </div>
      <div class="col-lg-3 mt-4 mt-lg-0">
        <h4>Alamat</h4>
        <p class="text-white">Jalan Raya Cibiru Km 15 40294 Cinunuk Jawa Barat</p>
      </div>
      <div class="col-lg-7 mt-4 mt-lg-0">
        <h4>Website</h4>
        <p class="text-white">Merupakan website perpustakaan penyedia buku bacaan. Website ini sama halnya seperti perpustakaan pada umumnya karena pembaca diberi batasan waktu untuk dapat meminjam buku untuk dibaca</p>
      </div>
    </div>
  </div>
  </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

<footer class="footer bg-primary text-center py-4">
  <div class="container">
    <div class="row align-items-center opacity-85 text-white">
      <div class="col-sm-12 mt-3 mt-sm-0">
        <p class="lh-lg mb-0 fw-semi-bold">&copy; Copyright <?php echo '© ' . date('Y') . ' ' . $_ENV['NAMA_PEMBUAT']  ?>. All rights reserved</p>
      </div>
    </div>
  </div>
</footer>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Hallo <?php if (isset($_SESSION['nama'])) {
                                                              echo $_SESSION['nama'];
                                                            } else {
                                                              echo 'Guest';
                                                            } ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <? php ?>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin Keluar dari akun anda?
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Tidak jadi</button>
        <a href="<?php echo $_ENV['LINK_WEB'] ?>auth/logout.php" class="btn btn-primary">Keluar</a>

      </div>
    </div>
  </div>
</div>
<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/is/is.min.js?v=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/prism/prism.js?v=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/fontawesome/all.min.js?v=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/lodash/lodash.min.js?v=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/imagesloaded/imagesloaded.pkgd.min.js?v=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/gsap/gsap.js?v=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/gsap/customEase.js?v=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>assets/js/theme.js?v=1.0.0"></script>
</body>


<!-- Mirrored from prium.github.io/elixir/v3.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jun 2022 14:28:48 GMT -->

</html>