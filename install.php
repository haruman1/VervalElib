<?php
if (!isset($_SESSION)) session_start();
$error = "";

$message = (isset($_SESSION["msg"]) ? $_SESSION["msg"] : "");
if (!isset($_GET["step"]) || $_GET["step"] == "1" || $_GET["step"] < "1") {
    $step = "1";
} elseif ($_GET["step"] > "1" && $_GET["step"] <= "5") {
    $step = $_GET["step"];
} else {
    die("Oups. Looks like you did not follow the instructions! Please follow the instructions otherwise you will not be able to install this script.<br>  <a href='#goBack' onClick='history.go(-1); return false;' class='button'>Go back</a>");
}
switch ($step) {
    case '2':
        if (file_exists(".env"))
            //     $step_keberapa = $_GET["step"];
            // $step_sekarang = $_GET["step"] - 1;
            // $pesanError = "File '.env' sudah ada, tolong hapus file tersebut terlebih dahulu. dan masukkan file '.env.sample' yang baru. dari folder zip yang telah diunzip. Kamu tidak bsia melanjutkan menginstallnya";
            $error = 'Configuration file already exists. Please delete or rename ".env" and recopy ".env.sample" from the original zip file. You cannot continue until you do this.';
        // include_once 'inc/error_step.php';
        if (isset($_POST['step2'])) {
            if (empty($_POST['host']))
                $error .= "Host database tidak boleh kosong";
            if (empty($_POST['port']))
                $error .= "<p>Port database tidak boleh kosong</p>";
            if (empty($_POST['namadb']))
                $error .= "<p>Nama database tidak boleh kosong</p>";
            if (empty($_POST['userdb']))
                $error .= "<p>Username database tidak boleh kosong</p>";
            // if (empty($_POST['DB_PASSWORD']))
            //     $error .= "<p>Password database tidak boleh kosong</p>";
            if (empty($error)) {
                try {

                    $db = mysqli_connect($_POST['host'], $_POST['userdb'], $_POST['pwdb'], $_POST['namadb'], $_POST['port']);
                    generate_config($_POST);
                    $query = get_query();
                    foreach ($query as $q) {
                        mysqli_query($db, $q);
                    }
                    $_SESSION["msg"] = "DATABASE sudah berhasil import dan file configurasi sudah berhasil di buat";
                    header("Location: install.php?step=3");
                } catch (mysqli_sql_exception $e) {
                    $error = $e->getMessage();
                }
            }
        }
        break;
    case '3':
        // if (file_exists(".env"))
        //     $step_keberapa = $_GET["step"];
        // $step_sekarang = $_GET["step"] - 1;
        // $pesanError = "File '.env.sample' tidak ditemukan di folder zip yang telah diunzip.Tolong extract kembali file zip dan simpan pada folder 'inc'.Kamu tidak bisa melanjutkan menginstallnya jika file ini tidak ditemukan";
        // include_once 'inc/error_step.php';
        // @include("inc/env.php");
        if (!file_exists('.env'))
            $error = "<div class='error'>Configuration file not found. Please extract the zip file name `.env.sample` and save it in the 'inc' folder. Please go to Step 2. You cannot continue until you do this.</div>";

        $_SESSION["msg"] = "";
        if (isset($_POST['step3'])) {

            if (empty($_POST['nama_web']))
                $error .= "Nama Website tidak boleh kosong";
            if (empty($_POST['name_admin']))
                $error .= "<p>Nama Admin tidak boleh kosong</p>";
            if (empty($_POST['username_admin']))
                $error .= "<p>Username Admin tidak boleh kosong</p>";
            if (empty($_POST['email_admin']))
                $error .= "<p>Email Admin tidak boleh kosong</p>";
            if (empty($_POST['password']))
                $error .= "<p>Email Admin tidak boleh kosong</p>";
            if (empty($_POST['password_confirmation']))
                $error .= "<p>Password Confirmation tidak boleh kosong</p>";
            if ($_POST['password'] != $_POST['password_confirmation'])
                $error .= "<p>Password dan Password Confirmation tidak sama,Silahkan samakan password keduanya</p>";
            if (empty($_POST['check_login']))
                $error .= "<p>Maaf jangan coba coba mengubah isi yang ada di variable hidden,Silahkan ulang kembali :D</p>";

            if (empty($error)) {
                // include_once 'inc/env.php';
                // $nama_user = $_POST['name_admin'];
                // $username = $_POST['username_admin'];
                // $email = $_POST['email_admin'];
                // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE'], $_ENV['DB_PORT']);
                // $insert = mysqli_query($db, "INSERT INTO user (nama,username,email,password) VALUES ('$nama_user','$username','$email','$password') ");

                try {
                    $N4ma = generate_nama($_POST);
                    $_SESSION["msg"] = "Akun admin berhasil dibuat";
                    header("Location: install.php?step=4");
                    //masih ngaco isinya
                    throw new customException($_SESSION["msg"]);
                } catch (Exception $e) {
                    $error = $e->getMessage();
                }
            }
        }
        break;
    case '4':

        // if (isset($_POST["step4"])) {
        //     if (empty($_POST["USER_ID"])) {
        //         $error .= "<div class='error'>ID ADMIN tidak boleh kosong</div>";
        //     }
        //     if (empty($_POST["USER_USERNAME"])) {
        //         $error .= "<div class='error'>Username ADMIN tidak boleh kosong</div>";
        //     }
        //     if (empty($_POST["USER_EMAIL"])) {
        //         $error .= "<div class='error'>Email ADMIN tidak boleh kosong</div>";
        //     }
        //     if (empty($_POST["USER_PASSWORD"])) {
        //         $error .= "<div class='error'>Password ADMIN tidak boleh kosong</div>";
        //     }
        //     if (empty($_POST["USER_ROLE"])) {
        //         $error .= "<div class='error'>Role ADMIN tidak boleh kosong</div>";
        //     }
        //     if (empty($_POST["USER_ACTIVE"])) {
        //         $error .= "<div class='error'> ADMIN tidak boleh TIDAK AKTIF kosong</div>";
        //     }
        //     if (empty($_POST["USER_DATE_CREATED"])) {
        //         $error .= "<div class='error'>Tanggal admin dibuat tidak boleh kosong</div>";
        //     }
        //     if (!$error) {
        //         $db = mysqli_connect($_POST['host'], $_POST['userdb'], $_POST['pwdb'], $_POST['namadb'], $_POST['port']);

        //         $query = "INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `active`, `date_created`) VALUES
        //         ('" . $_POST["USER_ID"] . "', '" . $_POST["USER_USERNAME"] . "', '" . $_POST["USER_EMAIL"] . "', '" . $_POST["USER_PASSWORD"] . "', '" . $_POST["USER_ROLE"] . "', '" . $_POST["USER_ACTIVE"] . "', '" . $_POST["USER_DATE_CREATED"] . "');";
        //         mysqli_query($db, $query);
        //         $_SESSION["msg"] = "ADMIN berhasil ditambahkan";
        //     }
        // }

        break;
}
// function updateEnv($data = array())
// {
//     if (!count($data)) {
//         return;
//     }

//     $pattern = '/([^\=]*)\=[^\n]*/';

//     $envFile = '.env';
//     $lines = file($envFile);
//     $newLines = [];
//     foreach ($lines as $line) {
//         preg_match($pattern, $line, $matches);

//         if (!count($matches)) {
//             $newLines[] = $line;
//             continue;
//         }

//         if (!key_exists(trim($matches[1]), $data)) {
//             $newLines[] = $line;
//             continue;
//         }

//         $line = trim($matches[1]) . "={$data[trim($matches[1])]}\n";
//         $newLines[] = $line;
//     }

//     $newContent = implode('', $newLines);
//     file_put_contents($envFile, $newContent);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalasi Database Perpustakaan E-Lib</title>
    <style type="text/css">
        body {
            background: #f9f9f9;
            font-family: Helvetica, Arial;
            width: 860px;
            line-height: 25px;
            font-size: 13px;
            margin: 0 auto;
        }

        a {
            color: #009ee4;
            font-weight: 700;
            text-decoration: none;
        }

        a:hover {
            color: #000;
            text-decoration: none;
        }

        .container {
            background: #fff;
            border: 1px solid #eee;
            box-shadow: 0 0 0 3px #f7f7f7;
            border-radius: 3px;
            display: block;
            overflow: hidden;
            margin: 50px 0;
        }

        .container h1 {
            font-size: 22px;
            display: block;
            border-bottom: 1px solid #eee;
            margin: 0 !important;
            padding: 10px;
        }

        .container h2 {
            color: #999;
            font-size: 18px;
            margin: 10px;
        }

        .container h3 {
            background: #f8f8f8;
            border-bottom: 1px solid #eee;
            border-radius: 3px 0 0 0;
            text-align: center;
            margin: 0;
            padding: 10px 0;
        }

        .left {
            float: left;
            width: 258px;
        }

        .right {
            float: left;
            width: 599px;
            border-left: 1px solid #eee;
        }

        .form {
            width: 90%;
            display: block;
            padding: 10px;
        }

        .form label {
            font-size: 15px;
            font-weight: 700;
            margin: 5px 0;
        }

        .form label a {
            float: right;
            color: #009ee4;
            font: bold 12px Helvetica, Arial;
            padding-top: 5px;
        }

        .form .input {
            display: block;
            width: 98%;
            height: 15px;
            border: 1px #ccc solid;
            font: bold 15px Helvetica, Arial;
            color: #aaa;
            border-radius: 2px;
            box-shadow: inset 1px 1px 3px #ccc, 0 0 0 3px #f8f8f8;
            margin: 10px 0;
            padding: 10px;
        }

        .form .input:focus {
            border: 1px #73B9D9 solid;
            outline: none;
            color: #222;
            box-shadow: inset 1px 1px 3px #ccc, 0 0 0 3px #DEF1FA;
        }

        .form .button {
            height: 35px;
        }

        .button {
            background: #0080FF;
            height: 20px;
            width: 90%;
            display: block;
            text-decoration: none;
            text-align: center;
            border-radius: 2px;
            color: #fff;
            font: 15px Helvetica, Arial bold;
            cursor: pointer;
            border-radius: 3px;
            margin: 30px auto;
            padding: 5px 0;
            border: 0;
            width: 98%;
        }

        .button:active,
        .button:hover {
            background: #0069D2;
            color: #fff;
        }

        .content {
            color: #999;
            display: block;
            border-top: 1px solid #eee;
            margin: 10px 0;
            padding: 10px;
        }

        li {
            color: #999;
        }

        li.current {
            color: #000;
            font-weight: 700;
        }

        li span {
            float: right;
            margin-right: 10px;
            font-size: 11px;
            font-weight: 700;
            color: #00B300;
        }

        .left>p {
            border-top: 1px solid #eee;
            color: #999;
            font-size: 12px;
            margin: 0;
            padding: 10px;
        }

        .left>p>a {
            color: #777;
        }

        .content>p {
            color: #222;
            font-weight: 700;
        }

        span.ok {
            float: right;
            border-radius: 3px;
            background: #00B300;
            color: #fff;
            padding: 2px 10px;
        }

        span.fail {
            float: right;
            border-radius: 3px;
            background: #B30000;
            color: #fff;
            padding: 2px 10px;
        }

        span.warning {
            float: right;
            border-radius: 3px;
            background: #D27900;
            color: #fff;
            padding: 2px 10px;
        }

        .message {
            background: #1F800D;
            color: #fff;
            font: bold 15px Helvetica, Arial;
            border: 1px solid #000;
            padding: 10px;
        }

        .error {
            background: #980E0E;
            color: #fff;
            font: bold 15px Helvetica, Arial;
            border-bottom: 1px solid #740C0C;
            border-top: 1px solid #740C0C;
            margin: 0;
            padding: 10px;
        }

        .inner,
        .right>p {
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h3>Proses Instalasi</h3>
            <ol>
                <li<?php echo ($step == "1") ? " class='current'" : "" ?>>Requirement Check <?php echo ($step > "1") ? "<span>Completed</span>" : "" ?></li>
                    <li<?php echo ($step == "2") ? " class='current'" : "" ?>>Database Configuration<?php echo ($step > "2") ? "<span>Completed</span>" : "" ?></li>
                        <li<?php echo ($step == "3") ? " class='current'" : "" ?>>Basic Configuration<?php echo ($step > "3") ? "<span>Completed</span>" : "" ?></li>
                            <li<?php echo ($step == "4") ? " class='current'" : "" ?>>Installation Complete</li>
            </ol>
            <p>
                <a href="http://e-book.com" target="_blank">Home</a>
                <a href="http://e-book.com" target="_blank">entah 1</a>
                <a href="http://e-book.com" target="_blank">Entah 2</a>
                <a href="http://e-book.com" target="_blank">Entah 3</a>
            </p>
        </div>
        <div class="right">
            <h1>Installation of Premium Perpustakaan Online</h1>
            <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>
            <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
            <?php if ($step == "1") : ?>
                <h2>1.0 Requirement Check</h2>
                <p>
                    These are some of the important requirements for this software. "Red" means it is vital to this script, "Orange" means it is required but not vital and "Green" means it is good. If one of the checks is "Red", you will not be able to install this script because without that requirement, the script will not work.
                </p>
                <div class="content">
                    <p>
                        PHP Version (need at least version 5.3)
                        <?php echo check('version') ?>
                    </p>
                    It is very important to have at least PHP Version 5.3. It is highly recommended that you use 5.3.7 or later for better performance.
                </div>
                <div class="content">
                    <p>MYSQLI Driver must be enabled
                        <?php echo check('mysql') ?>
                    </p>
                    MYSQLI driver is very important so it must enabled. Without this, the script will not connect to the database hence it will not work at all. If this check fails, you will need to contact your web host and ask them to either enable it or configure it properly.
                </div>
                <div class="content">
                    <p><i>env_sample</i> must be accessible.
                        <?php echo check('config') ?>
                    </p>
                    This installation will open that file to put values in so it must be accessible. Make sure that file is there in the <b>inc</b> folder and is writable. if there not here please extract and copy from <b>original file zip</b>
                </div>
                <!-- <div class="content">
                    <p><i>content/</i> folder must writable.
                        
                    </p>
                    Many things will be uploaded to that folder so please make sure it has the proper permission.
                </div> -->
                <div class="content">
                    <p><i>allow_url_fopen</i> Enabled
                        <?php echo check('file') ?>
                    </p>
                    The function <strong>file_get_contents</strong> is used to validate URLs and to get the country of the user. This function is not required but some features may not work properly.
                </div>
                <div class="content">
                    <p>cURL Enabled <?php echo check('curl') ?></p>
                    cURL is mainly used to get statistics from Google Analytics, if you want to use the built-in statistics then this is not required.
                </div>
                <?php if (!$error) echo '<a href="?step=2" class="button">Requirements are met. You can now Proceed.</a>' ?>
            <?php elseif ($step == "2") : ?>
                <h2>2.0 Database Configuration</h2>
                <p>
                    Now you have to set up your database by filling the following fields. Make sure you fill them correctly.
                </p>
                <form method="post" action="?step=2" class="form">
                    <label>Database Host <a>biasanya menggunakan `localhost` tapi kamu bisa kok mengkoneksikan dengan database dari luar</a></label>
                    <input type="text" name="host" class="input" required />
                    <label>Database Port <a>biasanya menggunakan PORT `3306`</a></label>
                    <input type="text" name="port" class="input" value="3306" required />

                    <label>Database Name</label>
                    <input type="text" name="namadb" class="input" required />

                    <label>Database User </label>
                    <input type="text" name="userdb" class="input" required />

                    <label>Database Password</label>
                    <input type="password" name="pwdb" class="input" />

                    <label>Database Prefix <a>Prefix for your tables (Optional) e.g. elib_</a></label>
                    <input type="text" name="prefix" class="input" value="" />
                    <label>Server's Timezone</label><br />
                    <p>If your server's timezone is not on the list, pick the one closest to you. You can always change this later.</p>
                    <select name="tz" style="padding: 5px;width: 100%; cursor: pointer;">
                        <?php
                        $timezone_identifiers = DateTimeZone::listIdentifiers();
                        foreach ($timezone_identifiers as $tz) {
                            echo "<option value='$tz'>$tz</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" name="step2" class='button'>Create my configuration file and go to step 3</button>
                </form>
            <?php $acak_number =  rand(1, 99999);
            elseif ($step == "3") :

            ?>
                <p>
                    Now you have to create an admin account by filling the fields below. Make sure to add a valid email and a strong password. For the site URL, make sure to remove the last slash.
                </p>
                <form method="post" action="?step=3" class="form">
                    <label>Nama Website</label>
                    <input type="text" name="nama_web" class="input" required />
                    <label>Nama Admin</label>
                    <input type="text" name="name_admin" class="input" required />
                    <label>Username Admin</label>
                    <input type="username" name="username_admin" class="input" required />
                    <label>Email Admin</label>
                    <input type="email" name="email_admin" class="input" required />
                    <label>Password Admin </label>
                    <input type="password" name="password" class="input" required />
                    <label>Ulangi password Admin </label>
                    <input type="password" name="password_confirmation" class="input" required />
                    <input type="hidden" name="check_login" class="hidden" value="<?php echo $acak_number ?>" required />
                    <label>Site URL <a>Including http:// but with the ending slash "/"</a></label>
                    <input type="text" name="url" class="input" value="<?php echo get_domain() ?>" placeholder="http://" required />

                    <input type="submit" name="step3" value="Finish Up Installation" class='button' />
                </form>
            <?php elseif ($step == "4") : ?>
                <p>
                    The script has been successfully installed and your admin account has been created. Please click "Delete Install" button below to attempt to delete this file. Please make sure that it has been successfully deleted.
                </p>
                <p>
                    Once clicked, you may see a blank page otherwise you will be redirected to your main page. If you see a blank, don't worry it is normal. All you have to do is to go to your main site, login using the info below and configure your site by clicking the "Admin" menu and then "Settings". Thanks for your purchase and enjoy :)
                </p>
                <p>
                    <strong>Login URL: <a href="<?php get('site') ?>/user/login" target="_blank"><?php get('site') ?>/user/login</a></strong> <br />
                    <strong>Email: <?php get('email') ?></strong> <br />
                    <strong>Username: <?php get('username') ?></strong> <br />
                    <strong>Password: <?php get('password') ?></strong>
                </p>
                <a href="?step=5" class="button">Delete install.php</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<?php
function get_domain()
{
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/";
    $url = str_replace("/install.php?step=3", "", $url);
    return $url;
    //return "http://{$url[2]}/{$url[3]}";
}
function get($what)
{
    if (isset($_SESSION[strip_tags(trim($what))])) {
        echo $_SESSION[strip_tags(trim($what))];
    }
}
function check($what)
{
    switch ($what) {
        case 'version':
            if (PHP_VERSION >= "5.3") {
                return "<span class='ok'>You have " . PHP_VERSION . "</span>";
            } else {
                global $error;
                $error .= 1;
                return "<span class='fail'>You have " . PHP_VERSION . "</span>";
            }
            break;
        case 'config':
            if (@file_get_contents('inc/.env.sample') && is_writable('inc/.env.sample')) {
                return "<span class='ok'>Accessible</span>";
            } else {
                global $error;
                $error .= 1;
                return "<span class='fail'>Not Accessible</span>";
            }
            break;
            // case 'config':
            //     if (@file_get_contents('includes/config_sample.php') && is_writable('includes/config_sample.php')) {
            //         return "<span class='ok'>Accessible</span>";
            //     } else {
            //         global $error;
            //         $error .= 1;
            //         return "<span class='fail'>Not Accessible</span>";
            //     }
            //     break;
        case 'content':
            if (is_writable('content')) {
                return "<span class='ok'>Accessible</span>";
            } else {
                global $error;
                $error .= 1;
                return "<span class='fail'>Not Accessible</span>";
            }
            break;

        case 'mysql':
            if (function_exists('mysqli_connect')) {
                return "<span class='ok'>Enabled</span>";
            } else {
                global $error;
                $error .= 1;
                return "<span class='fail'>Disabled</span>";
            }
            break;
        case 'file':
            if (ini_get('allow_url_fopen')) {
                return "<span class='ok'>Enabled</span>";
            } else {
                return "<span class='warning'>Disabled</span>";
            }
            break;
        case 'curl':
            if (in_array('curl', get_loaded_extensions())) {
                return "<span class='ok'>Enabled</span>";
            } else {
                return "<span class='warning'>Disabled</span>";
            }
            break;
    }
}


function modifyEnv($path, $values = [])
{
    $env = [];
    foreach (parse_ini_file($path) as $k => $value) {
        if (in_array($k, array_keys($values))) {
            $env[$k] = "$k={$values[$k]}";
        }
    }
    return file_put_contents($path, implode(PHP_EOL, $env));
}

function get_query()
{

    $query[] = "CREATE TABLE IF NOT EXISTS `" . trim($_POST["prefix"]) . "bukuTersedia` (
        `id` int(10) UNSIGNED NOT NULL,
        `nama_buku` varchar(255) NOT NULL,
        `id_buku` varchar(255) NOT NULL,
        `stock` int(50) NOT NULL,
        PRIMARY KEY (`id`)
      )ENGINE=MyISAM DEFAULT CHARSET=latin1;";


    $query[] = "CREATE TABLE IF NOT EXISTS `" . trim($_POST["prefix"]) . "hlmnbuku` `id` int(10) UNSIGNED NOT NULL,
    `id_buku` varchar(255) NOT NULL,
    `judulbuku` varchar(255) NOT NULL,
    `textbuku` text NOT NULL,
    `kategoribuku` varchar(255) NOT NULL,
    `author` varchar(255) NOT NULL,
    `file_buku` varchar(200) NOT NULL,
    `stok` int(11) UNSIGNED NOT NULL,
    `cover_buku` varchar(255) NOT NULL,
    `total_pinjam` int(11) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`) USING BTREE
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    //     $query[] = "CREATE OR REPLACE TRIGGER `" . trim($_POST["prefix"]) . "hlmnbuku_insert` BEFORE INSERT ON `" . trim($_POST["prefix"]) . "hlmnbuku` FOR EACH ROW BEGIN
    //     DECLARE _id_buku VARCHAR(255);
    //     DECLARE _judulbuku VARCHAR(255);
    //     DECLARE _textbuku TEXT;
    //     DECLARE _kategoribuku VARCHAR(255);
    //     DECLARE _author VARCHAR(255);
    //     DECLARE _file_buku VARCHAR(200);
    //     DECLARE _stok INT(11);
    //     DECLARE _cover_buku VARCHAR(255);
    //     DECLARE _total_pinjam INT(11);
    //     SET _id_buku = NEW.id_buku;
    //     SET _judulbuku = NEW.judulbuku;
    //     SET _textbuku = NEW.textbuku;
    //     SET _kategoribuku = NEW.kategoribuku;
    //     SET _author = NEW.author;
    //     SET _file_buku = NEW.file_buku;
    //     SET _stok = NEW.stok;
    //     SET _cover_buku = NEW.cover_buku;
    //     SET _total_pinjam = NEW.total_pinjam;
    //     INSERT INTO `" . trim($_POST["prefix"]) . "bukuTersedia` (`id`, `nama_buku`, `id_buku`, `stock`) VALUES (NULL, _judulbuku, _id_buku, _stok);
    //   END;";
    $query[] = "CREATE OR REPLACE TRIGGER `" . trim($_POST["prefix"]) . " hapus_buku` AFTER DELETE ON `" . trim($_POST["prefix"]) . "hlmnbuku` FOR EACH ROW BEGIN
    INSERT INTO `" . trim($_POST["prefix"]) . "log_buku` (`keterangan`,`waktu_pinjam`,`judulbuku`) VALUES ('HAPUS BUKU',NOW(),OLD.judulbuku);
    END;";


    $query[] = "CREATE OR REPLACE TRIGGER `" . trim($_POST["prefix"]) . " tambah_buku` AFTER INSERT  ON `" . trim($_POST["prefix"]) . "hlmnbuku` FOR EACH ROW BEGIN
    INSERT INTO `" . trim($_POST["prefix"]) . "log_buku` (`keterangan`,`waktu_pinjam`,`judulbuku`) VALUES ('TAMBAH BUKU',NOW(),new.judulbuku);
    END;";

    $query[] = "CREATE OR REPLACE TRIGGER `" . trim($_POST["prefix"]) . "perubahan_buku ` AFTER UPDATE ON `" . trim($_POST["prefix"]) . "hlmnbuku` FOR EACH ROW BEGIN
    INSERT INTO `" . trim($_POST["prefix"]) . "log_buku` (`keterangan`,`waktu_pinjam`,`judulbuku`) VALUES ('PERUBAHAN BUKU',NOW(),OLD.judulbuku);
    END;";


    $query[] = "CREATE TABLE IF NOT EXISTS `" . trim($_POST["prefix"]) . "log_buku` ( `id` int(10) UNSIGNED NOT NULL, `keterangan` varchar(255) NOT NULL, `waktu_pinjam`  `judulbuku` varchar(255) NOT NULL,  PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";


    $query[] = "CREATE TABLE IF NOT EXISTS `" . trim($_POST["prefix"]) . "log_user` (
        `id_user` int(50) NOT NULL,
        `nama_user` varchar(255) NOT NULL,
        `email_user` varchar(255) NOT NULL,
        `waktu_terdaftar` text NOT NULL,
        `keterangan` text NOT NULL,
        PRIMARY KEY (`id_user`)
      ) ENGINE=MyISAM DEFAULT CHARSET=latin1";

    $query[] = "CREATE TABLE IF NOT EXISTS `" . trim($_POST["prefix"]) . "buku_saya`(
        `id` int(10) NOT NULL,
        `id_buku` varchar(255) NOT NULL,
        `judulbuku` varchar(255) NOT NULL,
        `file_buku` varchar(200) NOT NULL,
        `id_user` int(15) NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    $query[] = "CREATE OR REPLACE TRIGGER `" . trim($_POST["prefix"]) . "update_jumlah_pinjam` AFTER INSERT ON `" . trim($_POST["prefix"]) . "buku_saya` FOR EACH ROW BEGIN 
      UPDATE `" . trim($_POST['prefix']) . "hlmnbuku` SET total_pinjam = total_pinjam + 1 WHERE id_buku = NEW.id_buku;
      END;";
    $query[] = "CREATE TABLE IF NOT EXISTS `" . trim($_POST["prefix"]) . "`user` (
        `id_user` int(15) NOT NULL,
        `nama` varchar(100) NOT NULL,
        `username` varchar(50) NOT NULL,
        `email` varchar(100) NOT NULL,
        `password` varchar(100) NOT NULL,
        `role` int(10) NOT NULL,
        `is_active` int(10) NOT NULL,
        `date_created` int(100) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    return $query;
}
function generate_config($array)
{
    if (!empty($array)) {
        // $file = file_get_contents('inc/env_sample.php');
        // $file = str_replace('HOSTWEB', trim($array['DB_HOST']), $file);
        // $file = str_replace('PORTWEB', trim($array['DB_PORT']), $file);
        // $file = str_replace('NAMA_DATABASE', trim($array['DB_DATABASE']), $file);
        // $file = str_replace('USERNAME_DATABASE', trim($array['DB_USERNAME']), $file);
        // $file = str_replace('PASSWORD_DATABASE', trim($array['DB_PASSWORD']), $file);
        // $fh = fopen('inc/env_sample.php', 'w') or die("Can't open file env_sample.php. mohon cek file tersebut bisa di tulis ulang");
        // fwrite($fh, $file);
        // fclose($fh);
        // rename('inc/env_sample.php', '.env');
        // modifyEnv('inc/env_sample', [
        //     'HOSTWEB' => $array['DB_HOST'],
        //     'PORTWEB' => $array['DB_PORT'],
        //     'NAMA_DATABASE' => $array['DB_DATABASE'],
        //     'USERNAME_DATABASE' => $array['DB_USERNAME'],
        //     'PASSWORD_DATABASE' => $array['DB_PASSWORD'],

        // ]);
        $file = file_get_contents('inc/.env.sample');
        $file = str_replace("HOSTWEB", trim($array["host"]), $file);
        $file = str_replace("PORTWEB", trim($array["port"]), $file);
        $file = str_replace("NAMA_DATABASE", trim($array["namadb"]), $file);
        $file = str_replace("USERNAME_DATABASE", trim($array["userdb"]), $file);
        $file = str_replace("PASSWORD_DATABASE", trim($array["pwdb"]), $file);
        $file = str_replace("PREFIX_DATABASE", trim($array["prefix"]), $file);
        $file = str_replace("WAKTU_ZONA", trim($array["tz"]), $file);
        $fh = fopen('inc/.env.sample', 'w') or die("Can't open file .env.sample. mohon cek file tersebut bisa di tulis ulang");
        fwrite($fh, $file);
        fclose($fh);
        rename("inc/.env.sample", ".env");
    }
}
class customException extends Exception
{
    public function errorMessage()
    {
        //error message
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b> dikarenakan ada salah inputan';
        return $errorMsg;
    }
}

function generate_nama($array)
{
    if (!empty($array)) {
        $file = file_get_contents('.env');
        $file = str_replace("BASE_URL", trim($array["url"]), $file);
        $file = str_replace("WEB_NAME", trim($array["nama_web"]), $file);
        $file = str_replace("WEB_BUILD", trim($array["name_admin"]), $file);
        $file = str_replace("EMAIL_TRANSAKSI", trim($array["email_admin"]), $file);
        $fh = fopen('.env', 'w') or die("Can't open file .env. mohon cek file tersebut bisa di tulis ulang");
        fwrite($fh, $file);
        fclose($fh);
    }
}
?>