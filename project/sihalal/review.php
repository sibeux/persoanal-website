<?php

include './database/db.php';

$method = '';
$sql = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'] ?? '';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $method = $_GET['method'] ?? '';
}

function createReview($db)
{
    if (
        $stmt = $db->prepare('INSERT INTO `rating` (`id_rating`, `id_produk`, 
        `id_user`, `id_pesanan`, `bintang_rating`, `pesan_rating`, `tanggal_rating`)
        VALUES(NULL, ?, ?, ?, ?, ?, NOW());')
    ) {
        $id_produk = $_POST['id_produk'];
        $id_user = $_POST['id_user'];
        $id_pesanan = $_POST['id_pesanan'];
        $bintang_rating = $_POST['bintang_rating'];
        $pesan_rating = $_POST['pesan_rating'];

        $stmt->bind_param(
            'iiiis',
            $id_produk,
            $id_user,
            $id_pesanan,
            $bintang_rating,
            $pesan_rating
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

switch ($method) {
    case 'create_review':
        createReview($db);
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