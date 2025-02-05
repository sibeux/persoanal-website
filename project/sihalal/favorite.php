<?php

include './database/db.php';

$method = '';
$sql = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'] ?? '';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $method = $_GET['method'] ?? '';
}

function addFavorite($db)
{
    if (
        $stmt = $db->prepare('INSERT INTO `favorite` (`id_favorite`, `id_produk`, `id_user`) VALUES (NULL, ?, ?);')
    ) {
        $id_produk = $_POST['id_produk'];
        $id_user = $_POST['id_user'];

        $stmt->bind_param(
            'ii',
            $id_produk,
            $id_user
        );

        if ($stmt->execute()) {
            $response = ["status" => "success"];
        } else {
            $response = [
                "status" => "error",
                "message" => "Failed to execute the query.",
                "error" => $stmt->error // Pesan error untuk debugging
            ];
        }

        $stmt->close();
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
        echo 'Could not prepare statement!';
    }
}

function deleteFavorite($db)
{
    if (
        $stmt = $db->prepare('DELETE FROM `favorite` WHERE `id_produk` = ? AND `id_user` = ?;')
    ) {
        $id_produk = $_POST['id_produk'];
        $id_user = $_POST['id_user'];

        $stmt->bind_param(
            'ii',
            $id_produk,
            $id_user
        );

        if ($stmt->execute()) {
            $response = ["status" => "success"];
        } else {
            $response = [
                "status" => "error",
                "message" => "Failed to execute the query.",
                "error" => $stmt->error // Pesan error untuk debugging
            ];
        }

        $stmt->close();
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
        echo 'Could not prepare statement!';
    }
}

function readFavorite()
{
    global $sql;
    $id_user = $_GET['id_user'];

    $sql = "SELECT p.*, alamat.kota, shhalal.*,
        COALESCE(AVG(r.bintang_rating), 0) as rating_produk, 
        SUM(r.pesan_rating is NOT NULL) as jumlah_ulasan, 
        count(r.id_produk) as jumlah_rating,
        (SELECT COUNT(*) 
        FROM pesanan 
        WHERE pesanan.id_produk = p.id_produk
        AND (pesanan.status_pesanan = 'selesai' OR pesanan.status_pesanan = 'ulas')
        ) AS jumlah_terjual
	FROM favorite
    JOIN produk p ON p.id_produk = favorite.id_produk
    join shhalal USING(id_shhalal)
	LEFT JOIN rating r 
	ON p.id_produk = r.id_produk
    join alamat 
    on alamat.id_user = p.id_user
    WHERE favorite.id_user = $id_user
	GROUP BY p.id_produk 
ORDER BY favorite.id_favorite DESC;";
}

switch ($method) {
    case 'add':
        addFavorite($db);
        break;
    case 'delete':
        deleteFavorite($db);
        break;
    case 'read':
        readFavorite();
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