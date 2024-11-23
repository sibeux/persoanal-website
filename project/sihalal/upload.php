<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    $uploaded_files = [];
    $errors = [];

    foreach ($_FILES['file']['name'] as $key => $name) {
        $target_file = $target_dir . basename($name);
        $file_size = $_FILES['file']['size'][$key];
        $file_tmp = $_FILES['file']['tmp_name'][$key];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $errors[] = ["status" => "error", "message" => "File '$name' already exists."];
            continue;
        }

        if ($file_size > 2000000) { // Maksimal 2MB
            $errors[] = ["status" => "error", "message" => "File '$name' is too large."];
            continue;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
            $errors[] = ["status" => "error", "message" => "File '$name' is not a valid image format."];
            continue;
        }

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($file_tmp, $target_file)) {
            $uploaded_files[] = ["status" => "success", "message" => "File '$name' uploaded successfully.", "url" => $target_file];
        } else {
            $errors[] = ["status" => "error", "message" => "There was an error uploading file '$name'."];
        }
    }

    echo json_encode(["uploaded_files" => $uploaded_files, "errors" => $errors]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}