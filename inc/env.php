<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';
// $dotenv = Dotenv::createImmutable(__DIR__ . './../');
// $dotenv->load();
// if (!file_exists(__DIR__ . '.env.sample')) {
//     copy(__DIR__ . '.env.sample', __DIR__ . '.env');
// }
// if (is_readable('.env')) {
//     $dotenv = Dotenv::createImmutable(__DIR__ . '../../');
//     $dotenv->load();
// }
$dotenv = Dotenv::createImmutable(__DIR__ . './../');
$dotenv->load();
