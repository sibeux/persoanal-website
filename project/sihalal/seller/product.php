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
            $berat_produk,
            $stok_produk
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

function updateProduct($db)
{
    if (
        $stmt = $db->prepare('UPDATE produk 
        SET id_shhalal = ?, 
            foto_produk_1 = ?, 
            foto_produk_2 = ?, 
            foto_produk_3 = ?, 
            nama_produk = ?, 
            deskripsi_produk = ?, 
            harga_produk = ?, 
            berat_produk = ?, 
            stok_produk = ?
        WHERE id_produk = ?;')
    ) {
        $id_produk = $_POST['id_produk'];
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
            'isssssiiii',
            $id_shhalal,
            $foto_produk_1,
            $foto_produk_2,
            $foto_produk_3,
            $nama_produk,
            $deskripsi_produk,
            $harga_produk,
            $berat_produk,
            $stok_produk,
            $id_produk
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

function deleteProduct($db)
{
    if (
        $stmt = $db->prepare('DELETE FROM produk WHERE id_produk = ?;')
    ) {
        $stmt->bind_param(
            's',
            $_POST['id_produk']
        );

        $stmt->execute();

        $response = ["status" => "success"];
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
    }
}

function changeViewProduct($db)
{
    if (
        $stmt = $db->prepare('UPDATE produk SET is_ditampilkan = ? WHERE id_produk = ?;')
    ) {
        $stmt->bind_param(
            'ss',
            $_POST['is_ditampilkan'],
            $_POST['id_produk']
        );

        $stmt->execute();

        $response = ["status" => "success"];
        echo json_encode($response);
    } else {
        $response = ["status" => "failed"];
        echo json_encode($response);
    }
}

switch ($_POST['method']) {
    case 'new':
        addNewProduct($db);
        break;
    case 'update':
        updateProduct($db);
        break;
    case 'delete':
        deleteProduct($db);
        break;
    case 'view':
        changeViewProduct($db);
        break;
    default:
        break;
}

$db->close();