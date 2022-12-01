<?php
session_start();
require_once __DIR__ . '/../functions/Cookies.php';
require_once __DIR__ . '/../functions/penting.php';
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 1) {
        $file_penting->redirect('admin/');
    } else {
        $file_penting->redirect('');
    }
}
$cookie->cookie_out($con);
$login_pwd_msg = "";
$login_username_msg = "";
$login_username_valid = false;
$login_password_valid = false;
$regex_password = "#.*^(?=.{8,12})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login_username"])) {
        $login_username_msg = "Username is required";
    } else {
        $login_username_valid = true;
    }
    if (empty($_POST["login_password"])) {
        $login_pwd_msg = "Password is required";
    } else {
        $login_password_valid = true;
    }
    if ($login_username_valid == true and $login_password_valid == true) {
        include_once   "proses/loginact.php";
    }
}
require_once __DIR__ . '/../template/auth/header.php';

?>

<section class="text-center py-0">
    <div class="bg-holder overlay overlay-2" style="background-image:url(<?php echo $_ENV['LINK_WEB'] ?>assets/img/bg3.jpg);"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-md-8 col-lg-5 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <div class="mb-2" data-zanim-xs='{"delay":0,"duration":1}'><a href="<?php echo $_ENV['LINK_WEB'] ?>"><img src="<?php echo $_ENV['LINK_WEB'] ?>assets/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></a></div>
                <div class="card" data-zanim-xs='{"delay":0.1,"duration":1}'>
                    <div class="card-body p-md-5">
                        <h4 class="text-uppercase fs-0 fs-md-1">login with <?php echo $_ENV['NAMA_WEB'] ?></h4>
                        <form class="text-start mt-4 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" role="form">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="input-group">
                                        <div class="input-group-text bg-100"><span class="far fa-user"></span></div><input class="form-control" type="text" placeholder="Masukkan username Anda" aria-label="Text input with dropdown button" name="login_username" value="<?php if (isset($_COOKIE['login_username_cookie'])) {
                                                                                                                                                                                                                                                                                echo $_COOKIE['login_username_cookie'];
                                                                                                                                                                                                                                                                            } ?>" />

                                    </div>
                                    <small class="text-danger pl-3"><?php echo $login_username_msg ?></small>
                                </div>
                                <div class="col-12 mt-2 mt-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-text bg-100"><span class="fas fa-lock"></span></div><input class="form-control" type="Password" placeholder="Password" aria-label="Text input with dropdown button" name="login_password" value="<?php if (isset($_COOKIE['login_password_cookie'])) {
                                                                                                                                                                                                                                                                        echo $_COOKIE['login_password_cookie'];
                                                                                                                                                                                                                                                                    } ?>" />

                                    </div>
                                    <small class="text-danger pl-3"><?php echo $login_pwd_msg ?></small>
                                </div>
                            </div>
                            <div class="form-check form-switch align-items-center mt-3">
                                <input class="form-check-input" type="checkbox" name="remember[]" id="remember" <?php if (isset($_COOKIE["login_username_cookie"])) { ?> checked <?php } ?>>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <div class="col-12 mt-2 mt-sm-3"><button class="btn btn-primary w-100" type="submit" name="submit_login">Login</button></div>
                            <div class="card-footer text-center pt-2 px-lg-2 px-1">
                                <p class="mb-0 text-sm mx-auto">
                                    Don't have an account?
                                    <a href=" <?php echo $_ENV['LINK_WEB']  ?>auth/register.php" class="text-info text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div><!-- end of .container-->
</section>

<?php

require_once __DIR__ . '/../template/auth/footer.php';
?>
<script>
    $(document).ready(function() {
        $("title").html("<?php echo $_ENV['NAMA_WEB'] ?> - Log In");
    })
</script>