<?php

session_start();
session_destroy();

setcookie('username', $_COOKIE['username'], time() - 86400);
setcookie('nama', $_COOKIE['nama'], time() - 86400);

header('Location: login.php');
exit;
