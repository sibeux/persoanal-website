<?php

include '../database/db.php';

function addNewProduct($db)
{
    if (
        $stmt = $db->prepare('INSERT INTO `produk` (`id_produk`, `id_user`, `id_shhalal`, `foto_produk_1`, `foto_produk_2`, `foto_produk_3`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `berat_produk`, `stok_produk`, `is_ditampilkan`)
        VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, "false");')
    ) {
        $id_user = $_POST['id_user'];
        $id_shhalal = $_POST['id_shhalal'];
        $foto_produk_1 = $_POST['foto_produk_1'];
        $foto_produk_2 = $_POST['foto_produk_2'];
        $foto_produk_3 = $_POST['foto_produk_3'];
        $nama_produk = $_POST['nama_produk'];
        $deskripsi_produk = $_POST['deskripsi_produk'];
        $harga_produk = $_POST['harga_produk'];
        $stok_produk = $_POST['stok_produk'];
        $berat_produk = $_POST['berat_produk'];

        // hati-hati sama koma di bind_param terakhir.
        $stmt->bind_param(
            'iisssssiii',
            $id_user,
            $id_shhalal,
            $foto_produk_1,
            $foto_produk_2,
            $foto_produk_3,
            $nama_produk,
            $deskripsi_produk,
            $harga_produk,
            $stok_produk,
            $berat_produk
        );
        $stmt->execute();

        $response = ["status" => "success"];
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
        echo 'Could not prepare statement!';
    }
}

switch ($_POST['method']) {
    case 'new':
        addNewProduct($db);
        break;
    default:
        break;
}

$db->close();