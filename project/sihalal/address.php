<?php

include './database/db.php';

$method = '';
$data = [];
$id_user = '';
$sql = '';

$id_address = '';
$id_primary = '';
$id_store = '';
$reset_primary = 'false';
$reset_store = 'false';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data JSON dari body request
    $input = file_get_contents('php://input');

    // Mengubah JSON menjadi array PHP
    $data = json_decode($input, true);

    // Cek apakah data berhasil di-decode
    if ($data === null) {
        // Jika gagal decode JSON, tangani error
        http_response_code(400); // Bad Request
        echo json_encode(['message' => 'Invalid JSON data']);
        exit;
    }

    $method = $data['method'] ?? '';
    $id_address = $data['id_address'] ?? '';
    $id_primary = $data['id_primary'] ?? '';
    $id_store = $data['id_store'] ?? '';
    $reset_primary = $data['reset_primary'] ?? 'false';
    $reset_store = $data['reset_store'] ?? 'false';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $method = $_GET['method'] ?? '';
    $id_user = $_GET['id_user'] ?? '';
} else {
    echo "Metode tidak dikenal.";
}

function sendUserAddress($db, $data)
{
    $address = $data['address'] ?? [];
    global $id_primary;
    global $id_store;
    global $reset_primary;
    global $reset_store;

    if ($id_primary != '' && $reset_primary == 'true') {
        if ($stmt = $db->prepare('UPDATE alamat SET is_utama = "false" WHERE id_alamat = ?;')) {
            $stmt->bind_param('s', $id_primary);
            $stmt->execute();
        }
    }

    if ($id_store != '' && $reset_store == 'true') {
        if ($stmt = $db->prepare('UPDATE alamat SET is_toko = "false" WHERE id_alamat = ?;')) {
            $stmt->bind_param('s', $id_store);
            $stmt->execute();
        }
    }

    if (
        $stmt = $db->prepare('INSERT INTO alamat (id_alamat, id_user, nama_penerima, 
    nomor_penerima, label_alamat, provinsi, id_provinsi, kota, id_kota, kode_pos, 
    detail_alamat, jalan_alamat, pinpoint_alamat, is_utama, is_toko) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);')
    ) {
        // Mengakses data yang dikirim
        $id_user = $address['id_user'] ?? '';
        $receipt_name = $address['receipt_name'] ?? '';
        $receipt_phone = $address['receipt_phone'] ?? '';
        $label_address = $address['label_address'] ?? '';
        $province = $address['province'] ?? '';
        $id_province = $address['id_province'] ?? '';
        $city = $address['city'] ?? '';
        $id_city = $address['id_city'] ?? '';
        $postal_code = $address['postal_code'] ?? '';
        $detail_address = $address['detail_address'] ?? '';
        $street_address = $address['street_address'] ?? '';
        $pin_point = $address['pin_point'] ?? '';
        $is_primary_address = $address['is_primary_address'] ?? '';
        $is_store_address = $address['is_store_address'] ?? '';

        // hati-hati sama koma di bind_param terakhir, njir.
        $stmt->bind_param(
            'ssssssssssssss',
            $id_user,
            $receipt_name,
            $receipt_phone,
            $label_address,
            $province,
            $id_province,
            $city,
            $id_city,
            $postal_code,
            $detail_address,
            $street_address,
            $pin_point,
            $is_primary_address,
            $is_store_address
        );

        $stmt->execute();

        // registration successful
        $response = ["status" => "success"];
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
    }
}

function updateUserAddress($db, $data)
{
    $address = $data['address'] ?? [];
    global $id_address;
    global $id_primary;
    global $id_store;
    global $reset_primary;
    global $reset_store;

    if ($id_primary != '' && $reset_primary == 'true') {
        if ($stmt = $db->prepare('UPDATE alamat SET is_utama = "false" WHERE id_alamat = ?;')) {
            $stmt->bind_param('s', $id_primary);
            $stmt->execute();
        }
    }

    if ($id_store != '' && $reset_store == 'true') {
        if ($stmt = $db->prepare('UPDATE alamat SET is_toko = "false" WHERE id_alamat = ?;')) {
            $stmt->bind_param('s', $id_store);
            $stmt->execute();
        }
    }

    if (
        $stmt = $db->prepare('UPDATE alamat 
    SET nama_penerima = ?, 
        nomor_penerima = ?, 
        label_alamat = ?, 
        provinsi = ?, 
        id_provinsi = ?, 
        kota = ?, 
        id_kota = ?, 
        kode_pos = ?, 
        detail_alamat = ?, 
        jalan_alamat = ?, 
        pinpoint_alamat = ?, 
        is_utama = ?, 
        is_toko = ?
    WHERE id_alamat = ?;
')
    ) {
        // Mengakses data yang dikirim
        $receipt_name = $address['receipt_name'] ?? '';
        $receipt_phone = $address['receipt_phone'] ?? '';
        $label_address = $address['label_address'] ?? '';
        $province = $address['province'] ?? '';
        $id_province = $address['id_province'] ?? '';
        $city = $address['city'] ?? '';
        $id_city = $address['id_city'] ?? '';
        $postal_code = $address['postal_code'] ?? '';
        $detail_address = $address['detail_address'] ?? '';
        $street_address = $address['street_address'] ?? '';
        $pin_point = $address['pin_point'] ?? '';
        $is_primary_address = $address['is_primary_address'] ?? '';
        $is_store_address = $address['is_store_address'] ?? '';

        // hati-hati sama koma di bind_param terakhir, njir.
        $stmt->bind_param(
            'ssssssssssssss',
            $receipt_name,
            $receipt_phone,
            $label_address,
            $province,
            $id_province,
            $city,
            $id_city,
            $postal_code,
            $detail_address,
            $street_address,
            $pin_point,
            $is_primary_address,
            $is_store_address,
            $id_address
        );

        $stmt->execute();

        // registration successful
        $response = ["status" => "success"];
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
    }
}

function deleteUserAddress($db, $data)
{
    global $id_address;

    if (
        $stmt = $db->prepare('DELETE FROM alamat WHERE id_alamat = ?;')
    ) {
        // hati-hati sama koma di bind_param terakhir, njir.
        $stmt->bind_param(
            's',
            $id_address
        );

        $stmt->execute();

        // registration successful
        $response = ["status" => "success"];
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
    }
}

function getUserAddress($id_user)
{
    global $sql;

    $sql = "SELECT * FROM alamat WHERE id_user = $id_user";
}

switch ($method) {
    case 'send_user_address':
        sendUserAddress($db, $data);
        break;
    case 'update_user_address':
        updateUserAddress($db, $data);
        break;
    case 'delete_user_address':
        deleteUserAddress($db, $data);
        break;
    case 'get_user_address':
        getUserAddress($id_user);
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