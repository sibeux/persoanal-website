<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Periksa jika file sudah ada
    if (file_exists($target_file)) {
        echo json_encode(["status" => "error", "message" => "File already exists."]);
        exit();
    }

    // Periksa ukuran file
    if ($_FILES["file"]["size"] > 5000000) { // Maksimal 5MB
        echo json_encode(["status" => "error", "message" => "File is too large."]);
        exit();
    }

    // Hanya izinkan jenis file tertentu
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo json_encode(["status" => "error", "message" => "Only JPG, JPEG, PNG files are allowed."]);
        exit();
    }

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo json_encode(["status" => "success", "message" => "File uploaded successfully.", "url" => $target_file]);
    } else {
        echo json_encode(["status" => "error", "message" => "There was an error uploading the file."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}