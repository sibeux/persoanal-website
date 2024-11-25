<?php

include './database/db.php';

$sql = "";

function getProductScrollLeft($sort)
{
    global $sql;

    if ($sort == 'recent') {
        $sql = "SELECT p.*, alamat.kota, shhalal.*,
        COALESCE(AVG(r.bintang_rating), 0) as rating_produk, 
        SUM(r.pesan_rating is NOT NULL) as jumlah_ulasan, 
        count(r.id_produk) as jumlah_rating
	FROM produk p 
    join shhalal USING(id_shhalal)
	LEFT JOIN rating r 
	ON p.id_produk = r.id_produk 
    join alamat 
    on alamat.id_user = p.id_user
    WHERE alamat.is_toko = 'true' AND p.is_ditampilkan = 'true'
	GROUP BY p.id_produk 
	ORDER BY p.id_produk DESC 
	LIMIT 10;";
    }
}

function getUlasanProduct($id_produk)
{
    global $sql;

    $sql = "SELECT r.*, user.nama_user, user.foto_user
    FROM rating r 
    left join user on r.id_user = user.id_user
    where r.id_produk = $id_produk AND pesan_rating is NOT NULL 
    ORDER BY r.tanggal_rating DESC;";
}

function getProductDetail($id_produk)
{
    global $sql;

    $sql = "SELECT p.*, alamat.kota, shhalal.*,
        COALESCE(AVG(r.bintang_rating), 0) as rating_produk, 
        (SELECT count(*) from rating r WHERE r.id_produk = $id_produk and r.pesan_rating != '') as jumlah_ulasan, 
        (SELECT count(*) from rating r WHERE r.id_produk = $id_produk) as jumlah_rating
	FROM produk p 
    join shhalal USING(id_shhalal)
	LEFT JOIN rating r 
	ON p.id_produk = r.id_produk 
    join alamat 
    on alamat.id_user = p.id_user
    WHERE p.id_produk = $id_produk;";
}

function getShopInfo($id_produk)
{
    global $sql;

    $sql = "SELECT 
    user.*, 
    alamat.kota, 
    alamat.provinsi,
    -- Menghitung total produk milik user
    (SELECT COUNT(*) FROM produk WHERE produk.id_user = user.id_user AND is_ditampilkan = 'true') AS total_produk,
    -- Menghitung rata-rata rating hanya untuk semua produk milik user
    (SELECT AVG(rating.bintang_rating) 
    FROM rating 
    JOIN produk ON rating.id_produk = produk.id_produk 
    WHERE produk.id_user = user.id_user) AS rata_rata_rating
FROM 
    produk 
JOIN 
    user ON produk.id_user = user.id_user
JOIN 
    alamat ON alamat.id_user = user.id_user
WHERE 
    produk.id_produk = $id_produk
    AND alamat.is_toko = 'true';";
}

function getUserProduct($email)
{
    global $sql;

    $sql = "SELECT produk.*, shhalal.*,
COUNT(DISTINCT CASE WHEN r.pesan_rating is not null and r.pesan_rating != '' THEN r.id_rating ELSE NULL END) as jumlah_ulasan,
COUNT(DISTINCT CASE WHEN pesanan.status_pesanan = 'ulas' THEN pesanan.id_pesanan ELSE NULL END) AS jumlah_terjual
FROM produk
-- USING biar tidak ada duplikasi kolom
-- tapi percuma jika diginiin = shhalal.*
JOIN shhalal USING (id_shhalal) 
LEFT JOIN rating r 
	ON produk.id_produk = r.id_produk
            JOIN user on produk.id_user = user.id_user
            left JOIN pesanan on pesanan.id_produk = produk.id_produk
            where user.email_user = $email
            GROUP BY produk.id_produk
	ORDER BY produk.id_produk DESC;";
}

function getMerkshProduct($category)
{
    global $sql;

    $sql = "SELECT * FROM shhalal WHERE kategori_shhalal = '$category' ORDER BY merek_shhalal ASC;";
}

switch ($_GET['method']) {
    case 'scroll_left':
        getProductScrollLeft($_GET['sort']);
        break;
    case 'get_ulasan':
        getUlasanProduct($_GET['id_produk']);
        break;
    case 'get_product_detail':
        getProductDetail($_GET['id_produk']);
        break;
    case 'shop_info':
        getShopInfo($_GET['id_produk']);
        break;
    case 'user_product':
        getUserProduct($_GET['email']);
        break;
    case 'merksh':
        getMerkshProduct($_GET['category']);
        break;
    default:
        break;
}

$result = $db->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . (is_object($db) ? $db->error : 'Database connection error'));
}

// Create an array to store the data
$data = array();

// Check if there is any data
if ($result->num_rows > 0) {
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        // Clean up the data to handle special characters
        array_walk_recursive($row, function (&$item) {
            if (is_string($item)) {
                $item = htmlentities($item, ENT_QUOTES, 'UTF-8');
            }
        });

        // Add each row to the data array
        $data[] = $row;
    }
}

// Convert the data array to JSON format
$json_data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// Check if JSON conversion was successful
if ($json_data === false) {
    die("JSON encoding failed");
}

// Output the JSON data
echo $json_data;

// Close the dbection
$db->close();