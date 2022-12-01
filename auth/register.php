<?php
session_start();

require_once __DIR__ . '/../template/auth/header.php';
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 1) {
        $file_penting->redirect('../admin/index.php', true);
    } else {
        $file_penting->redirect('../user/index.php', true);
    }
}
$regis_username_msg = "";

$regis_nama_msg = "";
$regis_email_msg = "";
$regis_pwd_msg = "";
$regis_confirm_pwd_msg = "";
$regis_username_valid = false;
$regis_email_valid = false;
$regis_pwd_valid = false;
$regis_confirm_pwd_valid = false;
$regex_password = "#.*^(?=.{8,12})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#";
$regex_username = "#.*^(?=.{8,12})(?=.*[a-z])(?=.*[0-9]).*$#";
$regex_name = "/^([a-zA-Z'\- ]+)$/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nama_anda"])) {
        $regis_nama_msg = "Name is required";
    } else if (!preg_match($regex_name, $_POST["nama_anda"])) {
        $regis_nama_msg = "Name must be letters, spaces, or dashes only";
    } else {
        $regis_nama_valid = true;
    }
    if (empty($_POST["regist_username"])) {
        $regis_username_msg = "Username is required";
    } else if (!preg_match($regex_username, $_POST["regist_username"])) {
        $regis_username_msg = "Username must be 8-12 characters long and contain at least one number and one uppercase and lowercase letter";
    } else {
        $regis_username_valid = true;
    }
    if (empty($_POST["regist_email"])) {
        $regis_email_msg = "Email is required";
    } else if (!filter_var($_POST["regist_email"], FILTER_VALIDATE_EMAIL)) {
        $regis_email_msg = "Email is invalid";
    } else {
        $regis_email_valid = true;
    }
    if (empty($_POST["regist_password"])) {
        $regis_pwd_msg = "Password is required";
    } else if (!preg_match($regex_password, $_POST["regist_password"])) {
        $regis_pwd_msg = "Password must be 8-12 characters and must contain at least one lowercase letter, one uppercase letter, and one numeric digit";
    } else {
        $regis_pwd_valid = true;
    }
    if (empty($_POST["confirm-password"])) {
        $regis_confirm_pwd_msg = "Confirm Password is required";
    } else if ($_POST["regist_password"] != $_POST["confirm-password"]) {
        $regis_confirm_pwd_msg = "Confirm Password must match Password";
    } else {
        $regis_confirm_pwd_valid = true;
    }
    if ($regis_username_valid == true && $regis_email_valid == true && $regis_pwd_valid == true && $regis_confirm_pwd_valid == true) {
        include "proses/register_now.php";
    }
} ?>
<section class="text-center py-0">
    <div class="bg-holder overlay overlay-1" style="background-image:url(<?php echo $_ENV['LINK_WEB'] ?>assets/img/bg4.jpg);"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-md-9 col-lg-6 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <div class="mb-0" data-zanim-xs='{"delay":0,"duration":1}'><a href="<?php echo $_ENV['LINK_WEB'] ?>"><img src="<?php echo $_ENV['LINK_WEB'] ?>assets/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></a></div>
                <div class="card" data-zanim-xs='{"delay":0.1,"duration":1}'>
                    <div class="card-body p-md-5">
                        <h4 class="text-uppercase fs-0 fs-md-1">create your <?php echo $_ENV['NAMA_WEB'] ?> account</h4>
                        <form class="text-start mt-4 needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            <div class=" row align-items-center g-4">
                                <div class="col-12"> <input class="form-control" type="text" placeholder="Masukkan Nama Full Anda" aria-label="Fullname" name="nama_anda" id="nama_anda" />
                                    <small class="text-danger pl-3">
                                        <?php echo $regis_nama_msg ?>
                                    </small>
                                </div>

                                <div class="col-12"><input class="form-control" type="email" placeholder="Email Address" aria-label="Email Address" name="regist_email" id="regist_email" />
                                    <small class="text-danger pl-3">
                                        <?php echo  $regis_email_msg ?>
                                    </small>
                                </div>
                                <div class="col-12"><input class="form-control" type="username" placeholder="Masukkan Username Anda" aria-label="Username" name="regist_username" />
                                    <small class="text-danger pl-3">
                                        <?php echo  $regis_username_msg ?>
                                    </small>
                                </div>
                                <div class="col-12"><input class="form-control" type="Password" placeholder="Password" aria-label="Password" name="regist_password" />
                                    <small class="text-danger pl-3">
                                        <?php echo  $regis_pwd_msg ?>
                                    </small>
                                </div>
                                <div class="col-12"><input class="form-control" type="Password" placeholder="Confirm Password" aria-label="Confirm Password" name="confirm-password" />
                                    <small class="text-danger pl-3">
                                        <?php echo  $regis_confirm_pwd_msg ?>
                                    </small>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-12 mt-2 mt-sm-3"><button class="btn btn-primary w-100" type="submit">Create Account</button></div>
                                <div class="col-12 mt-2 mt-sm-3">
                                    <p class="mb-0 text-sm mx-auto">
                                        Already have account?
                                        <a href=" <?php echo $_ENV['LINK_WEB']  ?>auth/login.php" class="text-info text-gradient font-weight-bold">Log in</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
    </div>
    </div>
    </div>
    </div>
    </div><!-- end of .container-->
</section>
<?php require_once __DIR__ . '/../template/auth/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('title').html("Register - <?php echo $_ENV['NAMA_WEB'];  ?>");
    });
</script>