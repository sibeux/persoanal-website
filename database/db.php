<?php

define('HOST', 'localhost');
define('SIBEUX', 'sibb8757');
define('pass', 'M41hpwg4TZTi82');
define('DB', 'sibb8757_web_porto');
$db = new mysqli(HOST, SIBEUX, pass, DB);

if($db->connect_errno){
    die('Tidak dapat terhubung ke database');
}