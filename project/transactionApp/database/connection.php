<?php

define('HOST', 'localhost');
define('SIBEUX', 'sibk1922_cbux');
define('pass', '1NvgEHFnwvDN96');
define('DB', 'pbweb_cashflow');

$db = new mysqli(HOST, USER, pass, DB);

if ($db->connect_errno) {
    die('Tidak dapat terhubung ke database');
}

$db->set_charset('utf8mb4');