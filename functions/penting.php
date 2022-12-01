<?php

use PHPMailer\PHPMailer\PHPMailer;

//JIKA SUDAH INCLUDE FILE INI MAKA TIDAK PERLU INCLUDE KONEKSI DAN ENVIROMENT TABLE
require_once __DIR__ . '/../inc/env.php'; //KONEKSI DARI .ENV ENVIROMENT TABLE
require_once __DIR__ . '/../inc/koneksi.php'; //KONEKSI DATABASE tinggal pake $con

require_once __DIR__ . '/../vendor/autoload.php'; //buat load file composer

class FilePenting
{
    public static function generateId($length = 5)
    {
        $karakter = '0123456789';
        $uid = '';
        for ($i = 0; $i < $length; $i++) {
            $uid .= $karakter[rand(0, $length - 1)];
        }
        return $uid;
    }

    public static function redirect($url)
    {

        echo '<script>location.replace("' . $_ENV['LINK_WEB'] .  '' . $url . '"); </script>';
        exit();
    }
    //buat seperti session_flashdata di codeigniter
    public static function render_with_type()
    {
        if (!isset($_SESSION['messages'])) {
            return null;
        }
        $messages = $_SESSION['messages'];
        $type = $_SESSION['type'];
        unset($_SESSION['messages']);
        unset($_SESSION['type']);
        echo '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="ni ni-like-2"></i></span>  <span class="alert-text"><strong>' . implode('<br/>', $messages) . '</strong></span> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button></div>';
    }
    public static function render_with_swal()
    {
        if (!isset($_SESSION['messages'])) {
            return null;
        }

        $messages = $_SESSION['messages'];

        if ($_COOKIE['expire_cookie_swal'] < time()) {
            unset($_SESSION['messages']);
        }
        return implode('<br/>', $messages);
    }

    //buat seperti session_flashdata di codeigniter
    public static function render()
    {
        if (!isset($_SESSION['messages'])) {
            return null;
        }
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']);
        return implode('<br/>', $messages);
    }
    public static function add_with_swal($message, $messages_title, $type, $location)
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = [];
            $_SESSION['type'] = [];
            $_SESSION['messages_title'] = [];
        }
        $_SESSION['messages_title'] = $messages_title;
        $_SESSION['type'] = $type;
        $_SESSION['messages'][] = "<script>Swal.fire({
            icon: '$type',
            title: '$messages_title',
            text: '$message',
          })
          </script>
          ";
        echo '<script>window.location.href="' . $_ENV['LINK_WEB'] . $location . '"</script>';
    }
    //buat seperti session_flashdata di codeigniter
    public static function add($message)
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = [];
        }
        $_SESSION['messages'][] = $message;
    }
    //buat seperti session_flashdata di codeigniter
    public static function add_with_type($message, $type, $location)
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = [];
            $_SESSION['type'] = [];
            $_SESSION['expire'] = time() + (1 * 10);
        }
        $_SESSION['type'] = $type;
        $_SESSION['messages'][] = "<div class='alert alert-$type'>$message</div>";
        echo '<script>window.location.href="' . $_ENV['LINK_WEB'] . $location . '"</s>';
    }
    public static function curl_get_contents($url)
    {
        // persiapkan curl
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        // set user agent
        curl_setopt(
            $ch,
            CURLOPT_USERAGENT,
            'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13'
        );

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // tutup curl
        curl_close($ch);

        // mengembalikan hasil curl
        return $output;
    }
    public static function curl_post_contents($url, $content)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    public static function kirim_email($email_user, $koneksidatabase)
    {
        $email = new PHPMailer();
        $email->isSMTP();
        $email->SMTPDebug = 0;
        $email->Host = $_ENV['MAIL_HOST'];
        $email->Port = $_ENV['MAIL_PORT'];
        $email->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
        $email->SMTPAuth = true;
        $email->Username = $_ENV['MAIL_USERNAME'];
        $email->Password = $_ENV['MAIL_PASSWORD'];
        $email->setFrom($_ENV['PENGIRIM_EMAIL'], $_ENV['NAMA_WEB']);
        $email->addAddress($email_user);
        $email->Subject = 'Verification ' . $_ENV['NAMA_WEB'];

        $email->msgHTML(file_get_contents('../template/mail/sendverif.php'), __DIR__);
        $email->send();
    }

    public static function panggil_semua_file()
    {
        $files = scandir(__DIR__ . '/../');
    }
    public static function backup_table_database($dbHost, $dbUsername, $dbPassword, $dbName, $tables = '*')
    {
        //menghubungkan & memilih database
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        //Mendapatkan semua Table dengan (*)
        if ($tables == '*') {
            $tables = array();
            $result = mysqli_query($db, "SHOW TABLES");
            while ($row = mysqli_fetch_row($result)) {
                $tables[] = $row[0];
            }
        } else {
            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }
        //Loop melalui Table
        foreach ($tables as $table) {
            $result = mysqli_query($db, "SELECT * FROM $table");
            $numColumns = $result->field_count;
            $return = "DROP TABLE $table;";
            $result2 = $db->query("SHOW CREATE TABLE $table");
            $row2 = $result2->fetch_row();
            $return .= "\n\n" . $row2[1] . ";\n\n";
            for ($i = 0; $i < $numColumns; $i++) {
                while ($row = $result->fetch_row()) {
                    $return .= "INSERT INTO $table VALUES(";
                    for ($j = 0; $j < $numColumns; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = preg_replace("\n", "\\n", $row[$j]);
                        if (isset($row[$j])) {
                            $return .= '"' . $row[$j] . '"';
                        } else {
                            $return .= '""';
                        }
                        if ($j < ($numColumns - 1)) {
                            $return .= ',';
                        }
                    }
                    $return .= ");\n";
                }
            }
            $return .= "\n\n\n";
        }
        //simpan file , alamat penyimpanan dan nama file
        $handle = fopen('backup/dumet-school.sql', 'w+');
        fwrite($handle, $return);
        fclose($handle);
    }
    public static function create_hash($masukkan_tulisan)
    {
        $awalnya = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $gantinya =   array("~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "-", "+", "=", "|", "}", "{", "[", "]", ";", ":", "?", ">", ".", "<");
        $hasilnya = str_replace($awalnya, $gantinya, $masukkan_tulisan);
        echo $hasilnya;
    }

    function decode_hash($masukkan_hash)
    {
        $kodenya =  array("~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "-", "+", "=", "|", "}", "{", "[", "]", ";", ":", "?", ">", ".", "<");
        $terjemahanya = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $hasilterjemahan = str_replace($kodenya, $terjemahanya, $masukkan_hash);
        echo $hasilterjemahan;
    }
}
//bisa digunakan secara langsung atau tidak,bebass
$file_penting = new FilePenting();
