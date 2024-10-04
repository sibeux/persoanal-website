<?php

include './database/db.php';

// Mendapatkan data JSON dari body request
$input = file_get_contents('php://input');

// Mengubah JSON menjadi array PHP
$data = json_decode($input, true);

$method = $data['method'] ?? '';

// Cek apakah data berhasil di-decode
if ($data === null) {
    // Jika gagal decode JSON, tangani error
    http_response_code(400); // Bad Request
    echo json_encode(['message' => 'Invalid JSON data']);
    exit;
}

function sendUserAddress($db)
{
    $address = $data['address'] ?? [];

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

switch ($method) {
    case 'send_user_address':
        sendUserAddress($db);
        break;
    default:
        break;
}

$db->close();