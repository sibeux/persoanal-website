<?php

// bikin indeks FULLTEXT pakai ini
// * ALTER TABLE produk ADD FULLTEXT(nama_produk, deskripsi_produk);

include './database/db.php';

$method = '';
$sql = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'] ?? '';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $method = $_GET['method'] ?? '';
}

function searchProduct()
{
    global $sql;
    // Ambil input kata kunci pencarian dari URL atau form
    // Contoh: gula manis
    $search_terms = isset($_GET['search']) ? $_GET['search'] : '';

    $offset = $_GET['offset'];

    // Pecah kata kunci yang dipisahkan spasi menjadi array
    $keywords = explode(" ", $search_terms);

    // Menyusun bagian MATCH dan Levenshtein secara dinamis
    $match_conditions = [];
    $levenshtein_conditions = [];

    foreach ($keywords as $keyword) {
        // Menyusun bagian MATCH
        $match_conditions[] = "MATCH(p.nama_produk, p.deskripsi_produk) AGAINST ('$keyword' IN NATURAL LANGUAGE MODE)";
        $match_conditions[] = "MATCH(s.kategori_shhalal) AGAINST ('$keyword' IN NATURAL LANGUAGE MODE)";

        // Menyusun bagian Levenshtein untuk typo distance
        $levenshtein_conditions[] = "Levenshtein('$keyword', p.nama_produk) < 5";
        $levenshtein_conditions[] = "Levenshtein('$keyword', p.deskripsi_produk) < 5";
        $levenshtein_conditions[] = "Levenshtein('$keyword', s.kategori_shhalal) < 5";
    }

    // Gabungkan kondisi MATCH dan Levenshtein
    $match_query = implode(" OR ", $match_conditions);
    $levenshtein_query = implode(" OR ", $levenshtein_conditions);

    // Bangun query SQL dinamis
    $sql = "SELECT p.*, alamat.kota, s.*,
    MATCH(p.nama_produk, p.deskripsi_produk) AGAINST ('$search_terms' IN NATURAL LANGUAGE MODE) AS relevance,
    (
        " . implode(" + ", array_map(function ($keyword) {
        return "Levenshtein('$keyword', p.nama_produk) + Levenshtein('$keyword', p.deskripsi_produk)";
    }, $keywords)) . "
    ) AS typo_distance,
    MATCH(s.kategori_shhalal) AGAINST ('$search_terms' IN NATURAL LANGUAGE MODE) AS kategori_relevance,
    (
        " . implode(" + ", array_map(function ($keyword) {
        return "Levenshtein('$keyword', s.kategori_shhalal)";
    }, $keywords)) . "
    ) AS kategori_distance,
    IFNULL(ulasan.jumlah_ulasan, 0) AS jumlah_ulasan,
    IFNULL(ulasan.jumlah_rating, 0) AS jumlah_rating,
    COALESCE(rating_avg.rating_produk, 0) AS rating_produk
FROM 
    produk p
JOIN 
    shhalal s ON p.id_shhalal = s.id_shhalal
LEFT JOIN (
    SELECT 
        r.id_produk, 
        SUM(r.pesan_rating IS NOT NULL) AS jumlah_ulasan, 
        COUNT(r.id_produk) AS jumlah_rating
    FROM 
        rating r
    GROUP BY 
        r.id_produk
) AS ulasan ON p.id_produk = ulasan.id_produk
LEFT JOIN (
    SELECT 
        r.id_produk, 
        COALESCE(AVG(r.bintang_rating), 0) AS rating_produk
    FROM 
        rating r
    GROUP BY 
        r.id_produk
) AS rating_avg ON p.id_produk = rating_avg.id_produk
JOIN alamat ON alamat.id_user = p.id_user
WHERE 
    (
        $match_query
        OR $levenshtein_query
    )
    AND (alamat.is_toko = 'true' AND p.is_ditampilkan = 'true' AND p.stok_produk != 0)
ORDER BY 
    kategori_relevance DESC, 
    relevance DESC, 
    kategori_distance,
    typo_distance
LIMIT 10 OFFSET $offset;";
}

function sortCategoryProduct(){
    global $sql;
    $offset = $_GET['offset'];
    $kategori = $_GET['kategori'];
    
    $sql = "SELECT 
    p.*,
    s.kategori_shhalal,
    IFNULL(ulasan.jumlah_ulasan, 0) AS jumlah_ulasan, 
    IFNULL(ulasan.jumlah_rating, 0) AS jumlah_rating,
    COALESCE(rating_avg.rating_produk, 0) AS rating_produk
FROM 
    produk p
JOIN 
    shhalal s ON p.id_shhalal = s.id_shhalal
LEFT JOIN (
    SELECT 
        r.id_produk, 
        SUM(r.pesan_rating IS NOT NULL) AS jumlah_ulasan, 
        COUNT(r.id_produk) AS jumlah_rating
    FROM 
        rating r
    GROUP BY 
        r.id_produk
) AS ulasan ON p.id_produk = ulasan.id_produk
LEFT JOIN (
    SELECT 
        r.id_produk, 
        COALESCE(AVG(r.bintang_rating), 0) AS rating_produk
    FROM 
        rating r
    GROUP BY 
        r.id_produk
) AS rating_avg ON p.id_produk = rating_avg.id_produk
JOIN alamat ON alamat.id_user = p.id_user
WHERE s.kategori_shhalal like %$kategori%  AND
    (alamat.is_toko = 'true' AND p.is_ditampilkan = 'true' AND p.stok_produk != 0)
ORDER BY 
    p.id_produk DESC
LIMIT 10 OFFSET $offset;";
}

switch ($method) {
    case 'search_product':
        searchProduct();
        break;
    case 'sort_category_product':
        sortCategoryProduct();
        break;
    default:
        break;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
}

$db->close();