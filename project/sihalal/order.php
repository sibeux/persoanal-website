<?php

include './database/db.php';

$method = '';
$sql = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'] ?? '';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $method = $_GET['method'] ?? '';
}

function getOrderHistory($id_user)
{
    global $sql;

    $sql = "SELECT pesanan.*, produk.id_user as id_user_toko, user.nama_toko, produk.nama_produk, produk.foto_produk_1
            FROM `pesanan`
            join produk USING(id_produk)
            join user on user.id_user = produk.id_user
            where pesanan.id_user = $id_user 
            ORDER BY pesanan.tanggal_pesanan DESC;";
}

function createOrder($db)
{
    if (
        $stmt = $db->prepare('INSERT INTO `pesanan` (`id_pesanan`, `no_pesanan`, 
        `id_user`, `id_produk`, `jumlah`, `pengiriman`, `nama_no_penerima`, 
        `alamat_penerima`, `subtotal_harga_barang`, `subtotal_pengiriman`, 
        `total_pembayaran`, `tanggal_pesanan`, `status_pesanan`)
        VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);')
    ) {
        $no_pesanan = $_POST['no_pesanan'];
        $id_user = $_POST['id_user'];
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $pengiriman = $_POST['pengiriman'];
        $nama_no_penerima = $_POST['nama_no_penerima'];
        $alamat_penerima = $_POST['alamat_penerima'];
        $subtotal_harga_barang = $_POST['subtotal_harga_barang'];
        $subtotal_pengiriman = $_POST['subtotal_pengiriman'];
        $total_pembayaran = $_POST['total_pembayaran'];
        $tanggal_pesanan = $_POST['tanggal_pesanan'];
        $status_pesanan = $_POST['status_pesanan'];

        $stmt->bind_param(
            'siiisssiiiss',
            $no_pesanan,
            $id_user,
            $id_produk,
            $jumlah,
            $pengiriman,
            $nama_no_penerima,
            $alamat_penerima,
            $subtotal_harga_barang,
            $subtotal_pengiriman,
            $total_pembayaran,
            $tanggal_pesanan,
            $status_pesanan
        );

        // kurangi stok produk
        if ($stmt->execute()) {
            if (
                $stmt = $db->prepare('UPDATE `produk` SET `stok_produk` = `stok_produk` - ? WHERE `id_produk` = ?;')
            ) {
                $stmt->bind_param(
                    'ii',
                    $jumlah,
                    $id_produk
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
            } else {
                $response = ["status" => "failed"];
                echo json_encode($response);
                echo 'Could not prepare statement!';
            }
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

function changeOrderStatus($db)
{
    if (
        $stmt = $db->prepare('UPDATE `pesanan` SET `status_pesanan` = ? WHERE `id_pesanan` = ?;')
    ) {
        $status_pesanan = $_POST['status_pesanan'];
        $id_pesanan = $_POST['id_pesanan'];

        $stmt->bind_param(
            'si',
            $status_pesanan,
            $id_pesanan
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
    case 'get_order_history':
        getOrderHistory($_GET['id_user']);
        break;
    case 'create_order':
        createOrder($db);
        break;
    case 'change_order_status':
        changeOrderStatus($db);
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