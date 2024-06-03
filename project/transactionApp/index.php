<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>location.href = 
    './views/login.php';
    </script>";
    exit;
} else{
    echo "<script>location.href = 
    './views/home.php';
    </script>";
    exit;
}