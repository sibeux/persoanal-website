<?php

include '../database/db.php';

$method = '';
$sql = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'] ?? '';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $method = $_GET['method'] ?? '';
}

function getOrder($id_user){
    global $sql;

    $sql = "SELECT pesanan.*, produk.id_user as id_user_toko, produk.*, user.*,
    (SELECT COUNT(*) FROM favorite WHERE favorite.id_produk = pesanan.id_produk and favorite.id_user = $id_user) as is_favorite
FROM pesanan
join produk on produk.id_produk = pesanan.id_produk
JOIN user on produk.id_user = user.id_user
WHERE user.id_user = $id_user 
ORDER BY pesanan.tanggal_pesanan DESC;";
}


switch ($method) {
    case 'get_order':
        getOrder($_GET['id_user']);
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