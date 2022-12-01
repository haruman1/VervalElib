<?php
require_once __DIR__ . '/../../functions/penting.php';
?>
<footer class="footer bg-primary text-center py-4">
    <div class="container">
        <div class="row align-items-center opacity-85 text-white">
            <div class="col-sm-3 text-sm-start"><a href="../index-2.html"><img src="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/128x128/Logo.png" alt="logo" /></a></div>
            <div class="col-sm-6 mt-3 mt-sm-0">
                <p class="lh-lg mb-0 fw-semi-bold">&copy; Copyright <?php echo '© ' . date('Y') . ' ' . $_ENV['NAMA_PEMBUAT']  ?>. All rights reserved</p>
            </div>
            <div class="col text-sm-end mt-3 mt-sm-0"><span class="fw-semi-bold">Designed by </span><a class="text-white" href="https://themewagon.com/" target="_blank">Themewagon</a></div>
        </div>
    </div>
</footer>

<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/popper/popper.min.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/bootstrap/bootstrap.min.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/is/is.min.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/bigpicture/BigPicture.js?e-lib=1.0.0"> </script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/countup/countUp.umd.js?e-lib=1.0.0"> </script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/swiper/swiper-bundle.min.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/fontawesome/all.min.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/lodash/lodash.min.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/imagesloaded/imagesloaded.pkgd.min.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/gsap/gsap.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/gsap/customEase.js?e-lib=1.0.0"></script>
<script src="<?php echo $_ENV['LINK_WEB']  ?>assets/js/theme.js?e-lib=1.0.0"></script>
</body>



</html>