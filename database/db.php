<?php

define('HOST', 'localhost');
define('SIBEUX', 'sibeuxm1');
define('pass', 'pMklM1W36;oI.4');
define('DB', 'sibb8757_web_porto');
$db = new mysqli(HOST, SIBEUX, pass, DB);

if($db->connect_errno){
    die('Tidak dapat terhubung ke database');
}