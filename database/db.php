<?php

define('HOST', 'localhost');
define('SIBEUX', '-');
define('pass', '-');
define('DB', '-');
$db = new mysqli(HOST, SIBEUX, pass, DB);

if($db->connect_errno){
    die('Tidak dapat terhubung ke database');
}