<?php

require_once 'config.php';

$conn = mysqli_connect($config['db']['server'], $config['db']['user'], $config['db']['password'], $config['db']['database']);

if (!$conn) {
    echo 'Can`t connect to database.';
    exit();
}