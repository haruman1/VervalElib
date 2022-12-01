</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->



<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.slim.min.js?v=3.2.1"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/popper/popper.min.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/is/is.min.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/fontawesome/all.min.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/lodash/lodash.min.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/gsap/gsap.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>vendor/gsap/customEase.js"></script>
<script src="<?php echo $_ENV['LINK_WEB'] ?>assets/js/theme.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<?php echo FilePenting::render_with_swal(); ?>
</body>