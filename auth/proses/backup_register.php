<?php
require_once __DIR__ . '/../../functions/penting.php';
$verify_akun = new FilePenting();
$username = htmlspecialchars($_POST['regist_username']);
$email = htmlspecialchars($_POST['regist_email']);
$check_u_e = mysqli_query($con, "SELECT email,username FROM user WHERE username = '$username' OR email = '$email'");
$check_user_email = mysqli_num_rows($check_u_e);
if ($check_user_email > 0) {
    $verify_akun->add_with_swal('Username atau email sudah terdaftar', 'Registrasi Gagal', 'error', 'auth/register.php');
} else {
    $id_user = $verify_akun->generateId();
    $password = password_hash($_POST['regist_password'], PASSWORD_DEFAULT);
    $daftar_nama = htmlspecialchars($_POST['nama_anda']);
    $daftar_active = 0;
    $daftar_role = 2; //otomatis menjadi user dulu
    $daftar_token = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
    $daftar_create = time();
    $create_token = mysqli_query($con, "CALL insertToken('$id_user','$email','$daftar_token',$daftar_create') ");
    if (!isset($create_token)) {
        $create_user = mysqli_query($con, "CALL CreateUser('$id_user','$daftar_nama','$username','$email','$password','$daftar_role','$daftar_active','$daftar_create')");
        $data_pendaftar = array(
            'nama' => $daftar_nama,
            'email' => $email,
            'token' => $daftar_token,
        );
        $data_pendaftaran = json_encode($data_pendaftar);
        $verify_akun->curl_post_contents($_ENV['LINK_WEB'] . 'mail/sendverif.php', $data_pendaftaran);
        $verify_akun->add_with_swal('Pendaftaran Berhasil, Silahkan Cek Email Anda', 'Registrasi Berhasil', 'success', 'auth/login.php');
    } else {
        $verify_akun->add_with_swal('Terjadi kesalahan saat registrasi,Silahkan daftar Lagi', 'Registrasi Gagal', 'error', 'auth/register.php');
        $delete_user_token = mysqli_query($con, "DELETE FROM user_token WHERE email = '$email'");
        $delete_akun = mysqli_query($con, "DELETE FROM user WHERE email = '$email'");
    }
}
