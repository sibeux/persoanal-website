<?php

// define('HOST', 'localhost');
// define('SIBEUX', 'root');
// define('pass', '');
// define('DB', 'web_porto');

define('HOST', 'localhost');
define('SIBEUX', 'sibe5579_cbux');
define('pass', '1NvgEHFnwvDN96');
define('DB', 'sibe5579_cloud_music');

$db = new mysqli(HOST, SIBEUX, pass, DB);

if($db->connect_errno){
    die('Tidak dapat terhubung ke database');
}