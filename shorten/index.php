<?php

include '../database/db.php';

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fungsi untuk menghasilkan kode pendek
function generateShortCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $shortCode = '';
    for ($i = 0; $i < $length; $i++) {
        $shortCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $shortCode;
}

// Proses pemendekan URL
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $longUrl = $_POST['long_url'];
    $shortCode = generateShortCode();

    // Menyimpan ke database
    $stmt = $db->prepare("INSERT INTO urls (long_url, short_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $longUrl, $shortCode);
    $stmt->execute();

    echo "Shortened URL: <a href='https://sibeux.my.id/shorten/$shortCode'>https://sibeux.my.id/shorten/$shortCode</a>";
    $stmt->close();
}

// Mendapatkan kode dari URL
$requestUri = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($requestUri, '/'));
$shortCode = end($parts); // Ambil bagian terakhir dari URL

// Redirect jika short code ada di URL
if (!empty($shortCode) && strlen($shortCode) === 6) {
    $stmt = $db->prepare("SELECT long_url FROM shorten_urls WHERE short_code = ?");
    $stmt->bind_param("s", $shortCode);
    $stmt->execute();
    $stmt->bind_result($longUrl);

    if ($stmt->fetch()) {
        header("Location: $longUrl");
        exit();
    } else {
        echo "URL not found";
    }
    $stmt->close();
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>

<body>
    <h1>URL Shortener</h1>
    <form method="POST" action="">
        <input type="text" name="long_url" placeholder="Enter URL" required>
        <button type="submit">Shorten</button>
    </form>
</body>

</html>