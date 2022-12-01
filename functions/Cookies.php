<?php
require_once __DIR__ . '/../inc/env.php'; //KONEKSI DARI .ENV ENVIROMENT TABLE
class CookieDoang
{
    public static function cookie_in($koneksi_db)
    {
        if (isset($_COOKIE['username']) && isset($_COOKIE['nama'])) {

            $check_username = $_COOKIE['username'];
            $check_nama = $_COOKIE['nama'];

            $cookie_query = mysqli_query($koneksi_db, "SELECT * FROM 
            user WHERE username = '$check_username' AND nama = '$check_nama'");

            $cookie_assoc = mysqli_fetch_assoc($cookie_query);

            $cookie_row = mysqli_num_rows($cookie_query);

            if ($cookie_row > 0) {

                if ($check_username == $cookie_assoc['username'] && $check_nama == $cookie_assoc['nama']) {
                    $_SESSION['id_user'] = $cookie_assoc['id_user'];
                } else {
                    header('location:' . $_ENV['LINKWEB'] . 'auth/logout.php');
                }
            } else {

                header('location:' . $_ENV['LINKWEB'] . 'auth/logout.php');
            }
        }
    }
    public static function cookie_out($koneksidatabase)
    {
        if (isset($_COOKIE['username']) && isset($_COOKIE['nama'])) {


            $check_username = $_COOKIE['username'];
            $check_nama = $_COOKIE['nama'];

            $cookie_query = mysqli_query($koneksidatabase, "SELECT * FROM 
            user WHERE username='$check_username' AND nama = '$check_nama'");

            $cookie_assoc = mysqli_fetch_assoc($cookie_query);

            $cookie_row = mysqli_num_rows($cookie_query);

            if ($cookie_row > 0) {

                if ($check_username == $cookie_assoc['username'] && $check_nama == $cookie_assoc['nama']) {

                    $_SESSION['id_user'] = $cookie_assoc['id_user'];
                }
            }
        }
    }
}
$cookie = new CookieDoang();
