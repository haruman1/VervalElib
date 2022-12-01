<?php
require_once __DIR__ . '/../../functions/penting.php';
require_once __DIR__ . '/../../functions/Cookies.php';

$penting = new FilePenting();
$cookie = new CookieDoang();
$cookie->cookie_out($con);
if (!empty($_POST['login_username'] && $_POST['login_password'])) {
    if (isset($_POST['remember'])) {
        setcookie('login_username_cookie', htmlspecialchars($_POST['login_username']), time() + (10 * 60));
        setcookie('login_password_cookie', $_POST['login_password'], time() + (10 * 60));
    }
    $username = htmlspecialchars($_POST['login_username']);
    $password = $_POST['login_password'];
    $query_LOGIN = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
    $log_row = mysqli_num_rows($query_LOGIN);
    $fetch_data = mysqli_fetch_array($query_LOGIN);
    if (password_verify($password, $fetch_data['password'])) {
        $cookie->cookie_in($con);
        if ($log_row > 0) {
            session_start();
            $_SESSION['mulai_login'] =  time();
            $_SESSION['username'] = $fetch_data['username'];
            $_SESSION['id_user'] = $fetch_data['id_user'];
            $_SESSION['email'] = $fetch_data['email'];
            $_SESSION['nama'] = $fetch_data['nama'];
            $_SESSION['role'] = $fetch_data['role'];
            $_SESSION['login_time'] = $_SESSION['mulai_login'] + (30 * 60);
            if ($_SESSION['role'] == 1) {
                $penting->redirect('admin/');
            } else {
                $penting->redirect('');
                setcookie('expire_login_dashboard', time() + (30 * 60));
            }
        } else {
            $penting->add_with_swal('Username atau password salah', 'Login Gagal', 'error', 'auth/login.php');

            setcookie('expire_cookie_swal', time() + (1 * 60));
        }
    } else {
        $penting->add_with_swal('Username atau password salah', 'Login Gagal', 'error', 'auth/login.php');
        setcookie('expire_cookie_swal', time() + (1 * 60));
    }
} else {
    $penting->add_with_swal('Username atau password salah', 'Login Gagal', 'error', 'auth/login.php');
    setcookie('expire_cookie_swal', time() + (1 * 60));
}
